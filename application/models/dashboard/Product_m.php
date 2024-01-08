<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_m extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}

    function simpan($value){
    	$this->db->set('uuid', 'UUID()', FALSE);	
    	$this->db->insert('product', $value);
	}

	function ubah($id, $value){
		$this->db->update('product', $value, array('id' => $id));
	}

   	function query_data()
   	{
   		return $this->db->get_where('product', array('status' => 'publish'))->result();
   	}

   	function query_data_row($uuid)
   	{
   		return $this->db->get_where('product', array('uuid' => $uuid))->row_array();
   	}

}