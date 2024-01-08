<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->model('dashboard/author_m','model');
		$this->load->model('dashboard/master_model_m');
		$session = $this->session->userdata('masuk_app');
        $id = $session['id'];
        if($id == "" || $id == null){
        	redirect('dashboard/login');
        }
	}

	public function index()
	{
		$data = array(
			'page'		=> 'dashboard/author_v',
			'title'    	=> 'Author',
			'menu' 	   	=> 'author',
			'breadcumb' => 'Author',
			'data_sp'   => $this->model->view_specialist(),
			'data'      => $this->model->view_author()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	function view_author(){
	    return $this->db->get('author');
	}

	function get_data_author($keyword){
		$where = "1 = 1";
		if($keyword != ""){
			$where = $where." AND author LIKE '%$keyword%'";
		}
        $sql = "SELECT * FROM author WHERE $where ORDER BY id ASC";
        return $this->db->query($sql)->result();
	}

	function get_data_author_id($id){
		$sql = "SELECT * FROM author WHERE id = '$id'";
        return $this->db->query($sql)->row();
	}

	function get_data_nya(){
		$id_nya = $this->input->post('id_au');
		$sql = "SELECT * FROM author WHERE id = '$id_nya'";
		$dt_author = $this->db->query($sql)->row();

		echo json_encode($dt_author);
	}

	private function set_upload_options(){   
		//upload an image options
		$config = array();
		$config['upload_path'] = './assets/dashboard/img/author/';
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
    	$session 	    = $this->session->userdata('masuk_app');
        $id_user 	    = $session['id'];
		$author_name 	= $this->input->post('author_name');
		$title 			= $this->input->post('title');
		$slug 		    = $this->master_model_m->check_slug('author', $author_name);
		$photo 	        = "";
		$phone 	        = $this->input->post('phone');
		$email 		    = $this->input->post('email');
		$specialist 	= $this->input->post('specialist');
		$description 	= $this->input->post('description');

		//Log History
		$menu = "Author";
		$aksi = "add";

		if(!empty($_FILES['photo']['name'])){
			$photo = str_replace(' ', '_', $_FILES['photo']['name']);
			$this->upload('photo');
		}

		$array_val = array(
			'author_name' 	=> $author_name,
			'title' 		=> $title,
			'slug' 			=> $slug,
			'photo' 		=> $photo,
			'phone' 		=> $phone,
			'email' 		=> $email,
			'specialist' 	=> $specialist,
			'description' 	=> $description,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'created_by' 	=> $id_user
		);

		$this->model->simpan($array_val);

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);
		$this->model->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('200','1');
		redirect('dashboard/author');
	}

	function ubah(){
		$session 	    = $this->session->userdata('masuk_app');
        $id_user 	    = $session['id'];
		$id_au 		    = $this->input->post('id_edit');
		$author_name 	= $this->input->post('author_name_e');
		$title 			= $this->input->post('title_e');
		$slug 		    = $this->master_model_m->check_slug('author', $author_name);
		$photo 	        = "";
        $photo_old      = $this->input->post('photo_edit');
		$phone 	        = $this->input->post('phone_e');
		$email 		    = $this->input->post('email_e');
		$specialist 	= $this->input->post('specialist_e');
		$description 	= $this->input->post('description_e');

		//Log History
		$menu = "Author";
		$aksi = "edit";

		if(!empty($_FILES['photo_e']['name'])){
			// $path = './assets/dashboard/img/class/'.$baner_old;
        	// unlink($path);

			$photo = str_replace(' ', '_', $_FILES['photo_e']['name']);
			$this->upload('photo_e');
		}else{
			$photo = $photo_old;
		}

		$data = array(
			'author_name' 	=> $author_name,
			'title' 		=> $title,
			'slug' 			=> $slug,
			'photo' 		=> $photo,
			'phone' 		=> $phone,
			'email' 		=> $email,
			'specialist' 	=> $specialist,
			'description' 	=> $description,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $id_user
		);

		$where = array(
			'id' => $id_au
		);

		$this->model->ubah($where,$data,'author');

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);
		$this->model->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('200','1');
		redirect('dashboard/author');
	}

	function hapus(){
		$session 	    = $this->session->userdata('masuk_app');
        $id_user 	    = $session['id'];
		$id_au = $this->input->post('id_delete');
		$old = $this->input->post('img_delete');

		//Log History
		$menu = "Author";
		$aksi = "delete";

		// $path = './assets/dashboard/img/class/'.$old;
        // unlink($path);

		$sql = "DELETE FROM author WHERE id = '$id_au'";
		$this->db->query($sql);

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);
		$this->model->log_history($log_array);
		//End Log History
		
		$this->session->set_flashdata('hapus','1');
		redirect('dashboard/author');
	}

	function hapus_semua(){
		$sql = "TRUNCATE TABLE author";
		$this->db->query($sql);
		redirect('dashboard/author');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
