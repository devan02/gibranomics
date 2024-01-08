<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/master_model_m');
		$this->load->model('dashboard/product_m','model');

		$session = $this->session->userdata('masuk_app');
        $id = $session['id'];
        
        if($id == "" || $id == null){
        	redirect('dashboard/login');
        }
	}

	public function index()
	{
		$data = array(
			'page'		=> 'dashboard/product_v',
			'title'    	=> 'Product Value',
			'menu' 	   	=> 'product',
			'breadcumb' => 'Product Value',
			'data'      => $this->model->query_data()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	public function detail($uuid)
	{
		$data = array(
			'page'		=> 'dashboard/product_detail_V',
			'title'    	=> 'Detail Product Value',
			'menu' 	   	=> 'product',
			'breadcumb' => 'Detail Product Value',
			'data'      => $this->model->query_data_row($uuid)
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	private function set_upload_options(){   
		//upload an image options
		$config = array();
		$config['upload_path'] = './assets/dashboard/img/product/';
		$config['allowed_types'] = '*';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}

	function upload($file){
		$this->load->library('upload');
		$files = $_FILES;
		if(isset($_FILES[$file])){
		   $_FILES[$file]['name'] = str_replace(' ', '_', $files[$file]['name']);
		   $_FILES[$file]['type'] = $files[$file]['type'];
		   $_FILES[$file]['tmp_name'] = $files[$file]['tmp_name'];
		   $_FILES[$file]['error'] = $files[$file]['error'];
		   $_FILES[$file]['size'] = $files[$file]['size'];    

		   $this->upload->initialize($this->set_upload_options()); //memanggil fungsi untuk upload path
		   $this->upload->do_upload($file);
		}
	}

    function simpan(){
    	$session 	= $this->session->userdata('masuk_app');
        $id_user 	= $session['id'];
		$name 	= $this->input->post('name');
		$description 	= $this->input->post('description');
		$banner = "";

		if(!empty($_FILES['banner']['name'])){
			$banner = str_replace(' ', '_', $_FILES['banner']['name']);
			$this->upload('banner');
		}
		
		//Log History
		$menu = "Product Value";
		$aksi = "add";

		$array_val = array(
			'name' => $name,
			'description' => $description,
			'banner' => $banner,
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => $id_user,
			'status' => 'publish'
		);

		$this->model->simpan($array_val);

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);

		$this->master_model_m->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('simpan','1');
		redirect('dashboard/product');
	}

	function ubah(){
		$session 	= $this->session->userdata('masuk_app');
        $id_user 	= $session['id'];
		$uuid 	= $this->input->post('id');
		$name 	= $this->input->post('name');
		$description 	= $this->input->post('description');
		$banner = "";

		if(!empty($_FILES['banner']['name'])){
			$banner = str_replace(' ', '_', $_FILES['banner']['name']);
			$this->upload('banner');
		}else{
			$banner = $this->input->post('old_banner');
		}

		$data = $this->model->query_data_row($uuid);

		if(!empty($data)){
			$array_val = array(
				'name' => $name,
				'description' => $description,
				'banner' => $banner,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $id_user
			);

			$this->model->ubah($data['id'], $array_val);

			//Log History
			$menu = "Product Value";
			$aksi = "edit";

			$log_array = array (
				'menu'			=> $menu,
				'action'		=> $aksi,
				'created_at' 	=> date('Y-m-d H:i:s'),
				'id_user' 		=> $id_user
			);

			$this->master_model_m->log_history($log_array);
			//End Log History

			$this->session->set_flashdata('ubah','1');
		}
		
		redirect('dashboard/product');
	}

	function hapus(){
		$session    = $this->session->userdata('masuk_app');
        $id_user    = $session['id'];
		$id      = $this->input->post('id_delete');

		//Log History
		$menu = "Product Value";
		$aksi = "delete";

		// $path = './assets/dashboard/img/class/'.$old;
        // unlink($path);

		$value = array('status' => 'soft_delete');

		$this->model->ubah($id, $value);

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);

		$this->master_model_m->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('hapus','1');
		redirect('dashboard/product');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */