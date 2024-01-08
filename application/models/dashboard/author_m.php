<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author_m extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}

    function simpan($value){
    	$this->db->set($value);
    	$this->db->insert($this->db->dbprefix . 'author');
	}

	function ubah($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function view_author(){
	    return $this->db->get('author')->result();
	}

    function view_specialist(){
	    return $this->db->get('specialist')->result();
	}

	function log_history($value) {
		$this->db->set($value);
    	$this->db->insert($this->db->dbprefix . 'log_history');
	}

}