<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classmeet extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/class_meet_m','model');
		$this->load->model('dashboard/author_m');
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
			'page'		=> 'dashboard/class_meet_v',
			'title'    	=> 'Kelas',
			'menu' 	   	=> 'classmeet',
			'breadcumb' => 'Kelas',
			'data' => $this->model->view_class_meet()
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	public function add()
	{
		$data = array(
			'page'		=> 'dashboard/class_meet_add_v',
			'title'    	=> 'Tambah Kelas',
			'menu' 	   	=> 'classmeet',
			'breadcumb' => 'Tambah Kelas',
			'dt_author' => $this->author_m->view_author(),
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	public function detail($id)
	{
		$row_class = $this->model->view_class_meet_row($id);

		$data = array(
			'page'		=> 'dashboard/class_meet_detail_v',
			'title'    	=> 'Detail Kelas',
			'menu' 	   	=> 'classmeet',
			'title_breadcumb' => $row_class['title'],
			'breadcumb' => 'Detail Kelas',
			'dt_author' => $this->author_m->view_author(),
			'data' 		=> $row_class,
			'duration' => explode(':', $row_class['duration']),
			'skill'	=> $this->model->get_skill_by_class($row_class['id']),
			'faq'	=> $this->model->get_faq_by_class($row_class['id']),
			'myth_fact'	=> $this->model->get_myth_fact_by_class($row_class['id']),
			'author'	=> $this->model->get_author_by_class($row_class['id']),
		);

		$this->load->view('dashboard/index_home_v',$data);
	}

	function view_classmeet(){
	    return $this->db->get('classmeet');
	}

	function get_data_classmeet($keyword){
		$where = "1 = 1";
		if($keyword != ""){
			$where = $where." AND title LIKE '%$keyword%'";
		}
        $sql = "SELECT * FROM classmeet WHERE $where ORDER BY id ASC";
        return $this->db->query($sql)->result();
	}

	function get_data_classmeet_id($id){
		$sql = "SELECT * FROM classmeet WHERE id = '$id'";
        return $this->db->query($sql)->row();
	}

	function get_data_nya(){
		$id_nya = $this->input->post('id_cm');
		$sql = "SELECT * FROM classmeet WHERE id = '$id_nya'";
		$dt_classmeet = $this->db->query($sql)->row();

		echo json_encode($dt_classmeet);
	}

	private function set_upload_options(){   
		//upload an image options
		$config = array();
		$config['upload_path'] = './assets/dashboard/img/class/';
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

	function author_row()
	{
		$id = $this->input->get('id');
		$data = $this->model->get_author_row($id);
		echo json_encode($data);
	}

    function simpan(){
    	$session 		= $this->session->userdata('masuk_app');
        $id_user 		= $session['id'];
		$title 			= $this->input->post('title');
		$slug 			= $this->master_model_m->check_slug('classmeet', $title);
		$materi 		= $this->input->post('materi');
		$description 	= $this->input->post('description');
		$baner_old 		= $this->input->post('banner_old');
		$banner 		= "";
		$duration 		= $this->input->post('hours').':'.$this->input->post('minutes').':00';
		$type 			= $this->input->post('type');
		$price 			= str_replace(',', '', $this->input->post('price'));
		$overview 		= $this->input->post('overview');
		$program 		= $this->input->post('program');
		$start_date 	= $this->input->post('start_date');
		$end_date 		= $this->input->post('end_date');

		if(!empty($_FILES['banner']['name'])){
			$banner = str_replace(' ', '_', $_FILES['banner']['name']);
			$this->upload('banner');
		}

		$this->db->trans_begin();

		$array_val = array(			
			'title' 		=> $title,
			'slug' 			=> $slug,
			'materi'		=> $materi,
			'description'	=> $description,
			'banner' 		=> $banner,
			'duration' 		=> $duration,
			'type' 			=> $type,
			'price' 		=> $price,
			'overview' 		=> $overview,
			'program' 		=> $program,
			'start_date' 	=> date('Y-m-d', strtotime(str_replace('/', '-', $start_date))),
			'end_date' 		=> date('Y-m-d', strtotime(str_replace('/', '-', $end_date))),
			'created_at' 	=> date('Y-m-d H:i:s'),
			'created_by' 	=> $id_user,
			'status' => 'publish'
		);

		$this->model->simpan($array_val);
		$id_cm = $this->db->insert_id();

		//insert skill
		$skill = $this->input->post('skill');

		if(!empty($skill)){
			$this->model->delete_skill($id_cm);

			foreach ($skill as $key => $value) {
				$value_skill = array(
					'id_class' => $id_cm, 
					'skill' => $value,
					'slug' => $this->master_model_m->check_slug('classmeet_skill', $value),
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_skill($value_skill);
			}
		}

		//insert faq
		$question = $this->input->post('question');
		$answer = $this->input->post('answer');

		if( (!empty($question)) && (!empty($answer)) ){
			$this->model->delete_faq($id_cm);

			foreach ($question as $key => $value) {
				$value_faq = array(
					'id_class' => $id_cm, 
					'question' => $value,
					'answer' => $answer[$key],
					'slug' => $this->master_model_m->check_slug('classmeet_faq', $value),
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_faq($value_faq);
			}
		}

		//insert myth fact
		$myth = $this->input->post('myth');
		$fact = $this->input->post('fact');

		if( (!empty($myth)) && (!empty($fact)) ){
			$this->model->delete_classmeet_myth_fact($id_cm);

			foreach ($myth as $key => $value) {
				$value_mf = array(
					'id_class' => $id_cm,
					'myth' => $value,
					'fact' => $fact[$key],
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_classmeet_myth_fact($value_mf);
			}
		}

		//insert author
		$author = $this->input->post('author');

		if(!empty($author)){
			$this->model->delete_author_class($id_cm);
			
			foreach ($author as $key => $value) {
				$value_author = array(
					'id_class' => $id_cm, 
					'id_author' => $value, 
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => $id_user
				);

				$this->model->insert_author_class($value_author);
			}
		}

		//Log History
		$log_array = array (
			'menu'			=> 'Kelas',
			'action'		=> 'add',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);

		$this->master_model_m->log_history($log_array);
		//End Log History

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
		    # Something went wrong.
		    $this->db->trans_rollback();
		    return FALSE;
		} 
		else {
		    # Everything is Perfect. 
		    # Committing data to the database.
		    $this->db->trans_commit();
		    $this->session->set_flashdata('200','1');

			redirect('dashboard/classmeet');
		    return TRUE;
		}
	}

	function ubah(){
		$session 		= $this->session->userdata('masuk_app');
        $id_user 		= $session['id'];
		$id_cm 			= $this->input->post('id_class_meet');
		$title 			= $this->input->post('title');
		$slug 			= $this->input->post('slug');
		$materi 		= $this->input->post('materi');
		$description 	= $this->input->post('description');
		$baner_old 		= $this->input->post('banner_old');
		$banner 		= "";
		$duration 		= $this->input->post('hours').':'.$this->input->post('minutes').':00';
		$type 			= $this->input->post('type');
		$price 			= str_replace(',', '', $this->input->post('price'));
		$overview 		= $this->input->post('overview');
		$program 		= $this->input->post('program');	
		$start_date 	= $this->input->post('start_date');
		$end_date 		= $this->input->post('end_date');	

		if(!empty($_FILES['banner']['name'])){
			// $path = './assets/dashboard/img/class/'.$baner_old;
        	// unlink($path);

			$banner = str_replace(' ', '_', $_FILES['banner']['name']);
			$this->upload('banner');
		}else{
			$banner = $baner_old;
		}

		$this->db->trans_begin();

		$data = array(			
			'title' 		=> $title,
			'slug' 			=> $slug,
			'materi'		=> $materi,
			'description'	=> $description,
			'banner' 		=> $banner,
			'duration' 		=> $duration,
			'type' 			=> $type,
			'price' 		=> $price,
			'overview' 		=> $overview,
			'program' 		=> $program,
			'start_date' 	=> date('Y-m-d', strtotime(str_replace('/', '-', $start_date))),
			'end_date' 		=> date('Y-m-d', strtotime(str_replace('/', '-', $end_date))),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'updated_by' 	=> $id_user
		);

		$this->model->ubah($id_cm, $data);

		//insert skill
		$skill = $this->input->post('skill');

		if(!empty($skill)){
			$this->model->delete_skill($id_cm);

			foreach ($skill as $key => $value) {
				$value_skill = array(
					'id_class' => $id_cm, 
					'skill' => $value,
					'slug' => $this->master_model_m->check_slug('classmeet_skill', $value),
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_skill($value_skill);
			}
		}

		//insert faq
		$question = $this->input->post('question');
		$answer = $this->input->post('answer');

		if( (!empty($question)) && (!empty($answer)) ){
			$this->model->delete_faq($id_cm);

			foreach ($question as $key => $value) {
				$value_faq = array(
					'id_class' => $id_cm, 
					'question' => $value,
					'answer' => $answer[$key],
					'slug' => $this->master_model_m->check_slug('classmeet_faq', $value),
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_faq($value_faq);
			}
		}

		//insert myth fact
		$myth = $this->input->post('myth');
		$fact = $this->input->post('fact');

		if( (!empty($myth)) && (!empty($fact)) ){
			$this->model->delete_classmeet_myth_fact($id_cm);

			foreach ($myth as $key => $value) {
				$value_mf = array(
					'id_class' => $id_cm,
					'myth' => $value,
					'fact' => $fact[$key],
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->model->insert_classmeet_myth_fact($value_mf);
			}
		}

		//insert author
		$author = $this->input->post('author');

		if(!empty($author)){
			$this->model->delete_author_class($id_cm);
			
			foreach ($author as $key => $value) {
				$value_author = array(
					'id_class' => $id_cm, 
					'id_author' => $value, 
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => $id_user
				);

				$this->model->insert_author_class($value_author);
			}
		}

		//Log History
		$log_array = array (
			'menu'			=> 'Kelas',
			'action'		=> 'edit',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);

		$this->master_model_m->log_history($log_array);
		//End Log History

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
		    # Something went wrong.
		    $this->db->trans_rollback();
		    return FALSE;
		} 
		else {
		    # Everything is Perfect. 
		    # Committing data to the database.
		    $this->db->trans_commit();
		    $this->session->set_flashdata('200','1');

		    $row_data = $this->model->view_class_meet_id_row($id_cm);

			redirect('dashboard/classmeet/detail/'.$row_data['uuid']);
		    return TRUE;
		}		
	}

	function hapus(){
		$session = $this->session->userdata('masuk_app');
        $id_user = $session['id'];
		$id = $this->input->post('id_delete');

		$value = array(
			'status' => 'soft_delete',
			'deleted_at' => date('Y-m-d H:i:s'),
			'deleted_by' => $id_user
		);
		
		$this->model->soft_delete($id, $value);

		//Log History
		$log_array = array (
			'menu'			=> 'Kelas',
			'action'		=> 'delete',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'id_user' 		=> $id_user
		);
		$this->master_model_m->log_history($log_array);
		//End Log History

		$this->session->set_flashdata('200','1');
		redirect('dashboard/classmeet');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
