<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loghistory_m extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}

    function view_loghistory(){
	    // return $this->db->get('log_history')->result();
        $this->db->select ('*, log_history.id AS id_log, user.id AS id_us'); 
        $this->db->from ( 'log_history' );
        $this->db->join ( 'user', 'log_history.id_user = user.id' , 'left' );
        $this->db->order_by("created_at", "desc");
        $query = $this->db->get ();
        return $query->result ();
	}

}