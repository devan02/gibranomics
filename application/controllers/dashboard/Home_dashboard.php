<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/home_m', 'model');

		$session = $this->session->userdata('transisi');
        $id = $session['id'];
        if(empty($id)){
        	redirect('dashboard/login');
        }
	}

	public function index()
	{
		$data = array(
			'page'		=> 'dashboard/dashboard_v',
			'title'    	=> 'Home',
			'menu' 	   	=> 'home',
			'submenu' => 'home',
			'breadcumb' => 'Dashboard',
			'url_add' => '',
			'logs' => $this->master_m->get_logs()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */