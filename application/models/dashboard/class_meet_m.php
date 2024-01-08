<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_meet_m extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}

    function simpan($value){
    	$this->db->set('uuid', 'UUID()', FALSE);
    	$this->db->insert('classmeet', $value);
	}

	function ubah($id, $data){
		$this->db->set('uuid', 'UUID()', FALSE);
		$this->db->update('classmeet', $data, array('id' => $id));
	}

	function soft_delete($id, $value){
		$this->db->update('classmeet', $value, array('id' => $id));
	}

	function restore_data($id){
		$this->db->update('classmeet', array('status' => 'restore'), array('id' => $id));
	}

	function hard_delete($id){
		$this->db->delete('classmeet', array('id' => $id));
	}

    function view_class_meet(){
	    return $this->db->get_where('classmeet', array('status' => 'publish'))->result();
	}

	function view_class_meet_row($uuid){
	    return $this->db->get_where('classmeet', array('uuid' => $uuid))->row_array();
	}

	function view_class_meet_id_row($id){
	    return $this->db->get_where('classmeet', array('id' => $id))->row_array();
	}

	function get_author_row($id)
	{
		return $this->db->get_where('author', array('id' => $id))->row_array();
	}

	// SKILL
	function get_skill_by_class($id_class)
	{
		return $this->db->get_where('classmeet_skill', array('id_class' => $id_class))->result();
	}

	function insert_skill($value){
		$this->db->insert('classmeet_skill', $value);
	}

	function delete_skill($id_class){
		$this->db->delete('classmeet_skill', array('id_class' => $id_class));
	}
	// END SKILL

	// FAQ
	function get_faq_by_class($id_class)
	{
		return $this->db->get_where('classmeet_faq', array('id_class' => $id_class))->result();
	}

	function insert_faq($value){
		$this->db->insert('classmeet_faq', $value);
	}

	function delete_faq($id_class){
		$this->db->delete('classmeet_faq', array('id_class' => $id_class));
	}
	// END FAQ

	// MYTH FACT
	function get_myth_fact_by_class($id_class)
	{
		return $this->db->get_where('classmeet_myth_fact', array('id_class' => $id_class))->result();
	}

	function insert_classmeet_myth_fact($value){
		$this->db->insert('classmeet_myth_fact', $value);
	}

	function delete_classmeet_myth_fact($id_class){
		$this->db->delete('classmeet_myth_fact', array('id_class' => $id_class));
	}
	// END MYTH FACT

	// AUTHOR
	function get_author_by_class($id_class)
	{
		$column = "author_class.id,author_class.id_author,author.author_name, author.title, author.photo";

		$this->db->select ($column); 
        $this->db->from ( 'author_class' );
        $this->db->join ( 'author', 'author.id = author_class.id_author' , 'left' );
        $query = $this->db->where(array('author_class.id_class' => $id_class));

		return $query->get()->result();
	}

	function insert_author_class($value)
	{
		$this->db->insert('author_class', $value);
	}

	function delete_author_class($id_class){
		$this->db->delete('author_class', array('id_class' => $id_class));
	}
	// END AUTHOR

}