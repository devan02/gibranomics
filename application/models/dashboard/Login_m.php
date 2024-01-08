<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}

	function check_user($username)
	{
		$sql   = "SELECT * FROM users WHERE username = ?";
		$data  = $this->db->query($sql, array($username));
		return $data->row();
	}

	function update_user_log($id)
	{
		$tanggal = date('Y-m-d H:i:s');
		$this->db->query("UPDATE users SET date_login = '$tanggal' WHERE ID = '$id'");
	}
}