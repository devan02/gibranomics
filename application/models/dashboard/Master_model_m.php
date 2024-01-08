<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model_m extends CI_Model
{
	function __construct() {
	  	parent::__construct();
	  	$this->load->database();
		date_default_timezone_set('Asia/Jakarta');
	}

	function cleanStr($string){
	    // Replaces all spaces with hyphens.
	    $string = str_replace(' ', '-', $string);

	    // Removes special chars.
	    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	    // Replaces multiple hyphens with single one.
	    $string = preg_replace('/-+/', '-', $string);
	    
	    return strtolower($string);
	}

	function check_slug($table, $slug)
	{
		$query = $this->db->get_where($table, array('slug' => $this->cleanStr($slug)))->result();
		
		if(count($query) > 0){
			$slug_number = count($query) + 1;
			$slug = $slug.'-'.$slug_number;
		}

		return $this->cleanStr($slug);
	}

	function get_user($id){
		return $this->db->get_where('users', array('id' => $id))->row_array();
	}

	function get_logs()
   	{
		$this->db->select('*');
		$this->db->from('log_history');
		$this->db->limit(4);
		$this->db->order_by('id', 'desc');

    	return $this->db->get()->result();
   	}

	function insert_log($action, $menu) {
		$session = $this->session->userdata('transisi');
        $id = $session['id'];

		$value = array(
			'id_user' => $id,
			'action' => $action,
			'menu' => $menu,
			'created_at' => date('Y-m-d H:i:s'),
		);
		$this->db->set($value);
    	$this->db->insert($this->db->dbprefix . 'log_history');
	}

	private function set_upload_options(){   
	    //upload an image options
		$year = date('Y');
		$month = date('n');
		$path = "";

		if (!is_dir('uploads/'.$year.'/'.$month)) {
			mkdir('./uploads/' . $year.'/'.$month, 0777, TRUE);
			$path = './uploads/' . $year.'/'.$month;
		}else{
			$path = './uploads/' . $year.'/'.$month;
		}

	    $config = array();
	    $config['upload_path'] = $path;
	    $config['allowed_types'] = '*';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	function upload($file){   
	    $this->load->library('upload');

	    $files = $_FILES;
	    if(isset($_FILES[$file])){
			$name = strtolower(str_replace(' ', '_', $files[$file]['name']));
	        $_FILES[$file]['name'] = $name;
	        $_FILES[$file]['type'] = $files[$file]['type'];
	        $_FILES[$file]['tmp_name'] = $files[$file]['tmp_name'];
	        $_FILES[$file]['error'] = $files[$file]['error'];
	        $_FILES[$file]['size'] = $files[$file]['size'];    

			$init = $this->set_upload_options();
	        $this->upload->initialize($init);
	        $this->upload->do_upload($file);

			return $init['upload_path'].'/'.$name;
	    }
	}

	function parseStatus($status){
		return ($status == 'draft') ? '<span class="badge bg-secondary">Draft</span>' : '<span class="badge bg-success">Publish</span>';
	}

	function parseLongDateTime($date) {
		return date('d F Y H:i:s', strtotime($date));
	}

	function parseDate($date) {
		return date('d F Y', strtotime($date));
	}

	function parseShortMonth($date) {
		return date('M', strtotime($date));
	}

	function parseYear($date) {
		return date('Y', strtotime($date));
	}

	function parseImg($image){
		return base_url().str_replace('./', '', $image);
	}

	function parseLog($user_id, $action){
		$text = "";
		$tempUser = $this->get_user($user_id);

		switch ($action) {
			case 'add':
				$text = $tempUser['fullname'].' Menambahkan';
			break;

			case 'edit':
				$text = $tempUser['fullname'].' Memperbarui';
			break;

			case 'delete':
				$text = $tempUser['fullname'].' Menghapus';
			break;

			case 'soft_delete':
				$text = $tempUser['fullname'].' Menghapus tidak permanen';
			break;

			case 'restore':
				$text = $tempUser['fullname'].' Mengembalikan';
			break;
			
			default:
				return $tempUser['fullname'].' Melihat detail';
			break;
		}

		return $text;
	}

	function parseColorLog($action){
		$text = "";

		switch ($action) {
			case 'add':
				$text = 'text-success';
			break;

			case 'edit':
				$text = 'text-primary';
			break;

			case 'delete':
				$text = 'text-danger';
			break;

			case 'soft_delete':
				$text = 'text-warning';
			break;

			case 'restore':
				$text = 'text-info';
			break;
			
			default:
				return $text = 'text-muted';
			break;
		}

		return $text;
	}

	function parseTimeLog($end_date){
		$start_date = date('Y-m-d H:i:s');

		$selisihDetik = strtotime($start_date) - strtotime($end_date);
		$selisihMenit = floor($selisihDetik / 60);
		$selisihJam = floor($selisihDetik / 3600);
		$selisihHari = floor($selisihDetik / (3600 * 24));
		$selisihMinggu = floor($selisihDetik / (3600 * 24 * 7));

		if($selisihDetik < 61){
			$text = "Beberapa detik yang lalu";
			return $text;
		}
		
		if($selisihMenit > 0 && $selisihMenit < 60){
			return $selisihMenit.' menit';
		}
		
		if($selisihMenit > 60 && $selisihMenit < 1441){
			return $selisihJam.' jam';
		}

		if($selisihMenit > 1440 && $selisihMenit < 10081){
			return $selisihHari.' hari';
		}

		if($selisihMenit > 10080 ){
			return $selisihMinggu.' minggu';
		}
	}

	function parseCategory($category) {
		return str_replace('-', ' ', $category);
	}
}