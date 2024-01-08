<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loghistory extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/loghistory_m','model');
		$session = $this->session->userdata('masuk_app');
        $id = $session['id'];
        if($id == "" || $id == null){
        	redirect('dashboard/login');
        }
	}

	public function index()
	{
		$data = array(
			'page'		=> 'dashboard/loghistory_v',
			'title'    	=> 'Kelas',
			'menu' 	   	=> 'log_history',
			'breadcumb' => 'Kelas',
			'data' => $this->model->view_loghistory()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	function view_log_history(){
	    return $this->db->get('log_history');
	}

	function get_data_log_history($keyword){
		$where = "1 = 1";
		if($keyword != ""){
			$where = $where." AND created_at LIKE '%$keyword%'";
		}
        // $sql = "SELECT * FROM log_history WHERE $where ORDER BY id ASC";
        $sql = "SELECT *, log_history.id AS id_log, user.id AS id_us
                FROM log_history LEFT JOIN user ON log_history.id_user = user.id
                WHERE $where ORDER BY created_at DESC";
        return $this->db->query($sql)->result();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */