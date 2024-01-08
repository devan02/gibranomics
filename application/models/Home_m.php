<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}	

	function class_1desc(){
		$column = "classmeet.id, classmeet.title, classmeet.slug, classmeet.banner, 
			classmeet.materi, classmeet.description, classmeet.duration, classmeet.price,
			classmeet.type, classmeet.start_date, classmeet.end_date, author.author_name
		";

	    $this->db->select ($column); 
        $this->db->from ( 'classmeet' );
        $this->db->join ( 'author_class', 'classmeet.id = author_class.id_class' );
        $this->db->join ( 'author', 'author.id = author_class.id_author' );
		$this->db->where ( 'classmeet.type', 'individual' );
		$this->db->order_by('classmeet.id','desc');
		$this->db->limit(1);
        $query = $this->db->get ();

        return $query->row ();
	}

	function class_corporate(){
		$column = "classmeet.id, classmeet.title, classmeet.slug, classmeet.banner, 
			classmeet.materi, classmeet.description, classmeet.duration, classmeet.price,
			classmeet.type, author.author_name
		";

	    $this->db->select ($column); 
        $this->db->from ( 'classmeet' );
        $this->db->join ( 'author_class', 'classmeet.id = author_class.id_class' );
        $this->db->join ( 'author', 'author.id = author_class.id_author' );
		$this->db->where ( 'classmeet.type', 'corporate' );
		$this->db->order_by('classmeet.id','desc');
        $query = $this->db->get ();

        return $query->result ();
	}

	function query_get_product()
   	{
   		$this->db->from('product');
   		$this->db->where(array('status' => 'publish'));
   		$this->db->limit(3);

   		$query = $this->db->get();
   		return $query->result();
   	}

	
}
?>
