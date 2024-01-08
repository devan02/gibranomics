<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model News_model
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
  }

  // ------------------------------------------------------------------------
  public function get_articles()
  {
    $this->db->select('*');
		$this->db->from('articles');
    $this->db->where('status', 'publish');
		$this->db->order_by('id', 'desc');

    return $this->db->get()->result();
  }

  public function get_article($slug)
  {
    $this->db->select('articles.*');
		$this->db->from('articles');
    $this->db->where('articles.slug', $slug);

    return $this->db->get()->row_array();
  }
  // ------------------------------------------------------------------------
  function get_categories_article($article_id){
    $this->db->select('categories_article.*, categories.category, categories.slug');
		$this->db->from('categories_article');
    $this->db->join('categories', 'categories.id = categories_article.category_id');
    $this->db->where_in('categories_article.article_id', $article_id);

    return $this->db->get()->result();
  }
  // ------------------------------------------------------------------------
  function get_categories() {
    return $this->db->get_where('categories')->result();
  }

  function get_category($slug) {
    return $this->db->get_where('categories', array('slug' => $slug))->row_array();
  }

}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */