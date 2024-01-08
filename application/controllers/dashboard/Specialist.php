<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specialist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/specialist_m','model');
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
			'page'		=> 'dashboard/specialist_v',
			'title'    	=> 'Specialist',
			'menu' 	   	=> 'specialist',
			'breadcumb' => 'Specialist',
			'data' => $this->model->view_specialist()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	function view_specialist(){
	    return $this->db->get('specialist');
	}

	function get_data_specialist($keyword){
		$where = "1 = 1";
		if($keyword != ""){
			$where = $where." AND specialist LIKE '%$keyword%'";
		}
        $sql = "SELECT * FROM specialist WHERE $where ORDER BY specialist ASC";
        return $this->db->query($sql)->result();
	}

	function get_data_specialist_id($id){
		$sql = "SELECT * FROM specialist WHERE id = '$id'";
        return $this->db->query($sql)->row();
	}

	function get_data_nya(){
		$id_nya = $this->input->post('id_sp');
		$sql = "SELECT * FROM specialist WHERE id = '$id_nya'";
		$dt_specialist = $this->db->query($sql)->row();

		echo json_encode($dt_specialist);
	}

    function simpan(){
    	$session 	    = $this->session->userdata('masuk_app');
        $id_user 	    = $session['id'];
		$specialist 	= $this->input->post('specialist');
        $slug 		= $this->master_model_m->check_slug('specialist', $specialist);

		//Log History
		$menu = "Spesialis";
		$aksi = "add";

		$array_val = array(
			'specialist' 	=> $specialist,
            'slug' 			=> $slug,
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

		$this->session->set_flashdata('simpan','1');
		redirect('dashboard/specialist');
	}

	function ubah(){
		$session 	= $this->session->userdata('masuk_app');
        $id_user 	= $session['id'];
		$id_sp 		= $this->input->post('id_specialist');
		$specialist = $this->input->post('specialist_e');
        $slug 		= $this->master_model_m->check_slug('specialist', $specialist);

		//Log History
		$menu = "Spesialis";
		$aksi = "edit";

		$data = array(
			'specialist' 	=> $specialist,
            'slug' 			=> $slug,
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $id_user
		);

		$where = array(
			'id' => $id_sp
		);

		$this->model->ubah($where,$data,'specialist');

		//Log History
		$log_array = array (
			'menu'			=> $menu,
			'action'		=> $aksi,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);
		$this->model->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('ubah','1');
		redirect('dashboard/specialist');
	}

	function hapus(){
		$session 	    = $this->session->userdata('masuk_app');
        $id_user 	    = $session['id'];
		$id_sp = $this->input->post('id_delete');

		//Log History
		$menu = "Spesialis";
		$aksi = "delete";

		$sql = "DELETE FROM specialist WHERE id = '$id_sp'";
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
		redirect('dashboard/specialist');
	}

	function hapus_semua(){
		$sql = "TRUNCATE TABLE specialist";
		$this->db->query($sql);
		redirect('dashboard/specialist');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
