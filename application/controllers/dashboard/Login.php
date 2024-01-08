<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard/login_m', 'model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data = array(
			'title'	 => 'Login',
			'url' 	 => base_url().'dashboard/login_c/login',
		);

		$this->load->view('dashboard/login_v',$data);
	}

	function proses_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data_row = $this->model->check_user($username);

		if (!empty($data_row)) {
			if(password_verify($password, $data_row->password)){
				$session = array(
				   'id' => $data_row->id,
				   'user_id' => $data_row->user_id
				);
	
				$this->session->set_userdata('transisi',$session);
				$session_data = $this->session->userdata('transisi');
	
				redirect('dashboard/home_dashboard');
			}else{
				$this->session->set_flashdata('wrong_password','1');
				redirect('dashboard/login');
			}
		
		}else{
			$this->session->set_flashdata('gagal','1');
			redirect('dashboard/login');
		}
	}

	function logout(){
		$session = $this->session->userdata('transisi');
		$id = $session['id'];

		$this->model->update_user_log($id);

		$this->session->unset_userdata('transisi');
		$this->session->sess_destroy();
		redirect('dashboard/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */