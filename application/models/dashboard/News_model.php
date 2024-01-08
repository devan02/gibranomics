<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Dashboard/News_model
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

class News_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // ------------------------------------------------------------------------
  function post($value){
    $this->db->set('uuid', 'UUID()', FALSE);
    $this->db->insert('articles', $value);
  }

  function put($id, $value){
    $this->db->update('articles', $value, array('id' => $id));
  }

  function hard_delete($id){
    $this->db->delete('articles', array('id' => $id));
  }

  function post_categories_article($value){
    $this->db->insert('categories_article', $value);
  }

  function delete_categories_article($article_id){
    $this->db->delete('categories_article', array('article_id' => $article_id));
  }

  function get_all_data(){
    $this->db->select('articles.*, users.fullname');
    $this->db->from('articles');
    $this->db->join('users', 'users.id = articles.created_by');
    $this->db->where_not_in('articles.status', 'soft_delete');
    return $this->db->get()->result();
  }

  function get_data(){
    return $this->db->get_where('articles', array('status' => 'publish'))->result();
  }

  function get_data_uuid($uuid){
    return $this->db->get_where('articles', array('uuid' => $uuid))->row_array();
  }

  function get_data_id($id){
    return $this->db->get_where('articles', array('id' => $id))->row_array();
  }

  function get_trash_data() {
    $this->db->select('articles.*, users.fullname');
    $this->db->from('articles');
    $this->db->join('users', 'users.id = articles.created_by');
    $this->db->where_in('articles.status', 'soft_delete');

    $data['data'] = $this->db->get()->result();
    $data['count'] = count($data['data']);
    return $data;
  }
  // ------------------------------------------------------------------------
  function get_categories(){
    return $this->db->get_where('categories')->result();
  }

  function get_category($id){
    return $this->db->get_where('categories', array('id' => $id))->row_array();
  }

  function get_categories_article($article_id, $category_id){
    return $this->db->get_where('categories_article', array('article_id' => $article_id, 'category_id' => $category_id))->row_array();
  }

}

/* End of file Dashboard/News_model.php */
/* Location: ./application/models/Dashboard/News_model.php */