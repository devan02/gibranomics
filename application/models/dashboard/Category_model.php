<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Dashboard/Category_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Category_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // ------------------------------------------------------------------------
  function create($value){
    $this->db->insert('categories', $value);
  }

  function update($slug, $value){
    $this->db->update('categories', $value, array('slug' => $slug));
  }

   function get_data()
   {
     return $this->db->get_where('categories')->result();
   }

   function get_row($slug)
   {
     return $this->db->get_where('categories', array('slug' => $slug))->row_array();
   }

   function get_categories_article($category_id)
   {
     return $this->db->get_where('categories_article', array('category_id' => $category_id))->row_array();
   }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

}

/* End of file Dashboard/Category_model.php */
/* Location: ./application/models/Dashboard/Category_model.php */