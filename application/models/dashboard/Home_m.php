<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_m extends CI_Model
{
	function __construct() {
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Jakarta');
	}

	function get_count_article($type) {
		$where = array();

		if($type == 'today'){
			$where = array('status' => 'publish', 'DATE(published_at)' => date('Y-m-d'));
		}

		if($type == 'month'){
			$where = array('status' => 'publish', 'MONTH(published_at)' => date('n'));
		}

		if($type == 'year'){
			$where = array('status' => 'publish', 'YEAR(published_at)' => date('Y'));
		}

		$query = $this->db->get_where('articles', $where)->result();

		return $query;
	}

}