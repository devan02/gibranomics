<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard/News
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class News extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard/news_model', 'model');

    $session = $this->session->userdata('transisi');
    $id = $session['id'];
    if(empty($id)){
      redirect('dashboard/login');
    }
  }

  public function index()
  {
    $data = array(
			'page'		=> 'dashboard/news_v',
			'title'    	=> 'Artikel',
			'menu' 	   	=> 'post',
			'submenu' 	=> 'article',
			'breadcumb' => 'Artikel',
      'url_add' => base_url().'dashboard/news/create',
      'status' => '',
      'data' => $this->model->get_all_data(),
      'trash' => $this->model->get_trash_data()['count']
		);

		$this->load->view('dashboard/index_home_v',$data);
  }

  public function create()
  {
    $data = array(
			'page'		=> 'dashboard/news_add_v',
			'title'    	=> 'Tambah Artikel',
			'menu' 	   	=> 'post',
			'submenu' 	=> 'article',
			'breadcumb' => 'Tambah Artikel',
      'url_add' => '',
      'categories' => $this->model->get_categories()
		);

		$this->load->view('dashboard/index_home_v',$data);
  }

  public function detail($uuid)
  {
    $row = $this->model->get_data_uuid($uuid);
    $article_id = $row['id'];

    $data = array(
			'page'		=> 'dashboard/news_detail_v',
			'title'    	=> 'Detail Artikel',
			'menu' 	   	=> 'post',
			'submenu' 	=> 'article',
			'breadcumb' => 'Detail Artikel',
      'url_add' => '',
      'id' => $uuid,
      'article_id' => $article_id,
      'data' => $row,
      'categories' => $this->model->get_categories()
		);

		$this->load->view('dashboard/index_home_v',$data);
  }

  function trash() {
    $data = array(
			'page'		=> 'dashboard/news_v',
			'title'    	=> 'Sampah Artikel',
			'menu' 	   	=> 'post',
			'submenu' 	=> 'article',
			'breadcumb' => 'Sampah Artikel',
      'url_add' => base_url().'dashboard/news/create',
      'status' => 'trash',
      'data' => $this->model->get_trash_data()['data'],
      'trash' => $this->model->get_trash_data()['count']
		);

		$this->load->view('dashboard/index_home_v',$data);
  }

  function get_data(){
    $uuid = $this->input->post('id');
    $data = $this->model->get_data_uuid($uuid);
    echo json_encode($data);
  }

  function post_data(){
    $title = $this->input->post('title');
    $slug = $this->master_m->check_slug('categories', $title);
    $abstract = $this->input->post('abstract');
    $content = $this->input->post('content');
    $published_at = $this->input->post('published_at');
    $status = $this->input->post('status');

    $category = $this->input->post('category');
    $make_primary_category = $this->input->post('make_primary');

    $session = $this->session->userdata('transisi');
    $created_by = $session['id'];
    $thumbnail = "";

    if(!empty($_FILES['thumbnail']['name'])){
			$thumbnail = $this->master_m->upload('thumbnail');
		}

    $param_article = array(
      'title' => $title,
      'slug' => $slug,
      'thumbnail' => $thumbnail,
      'abstract' => $abstract,
      'content' => $content,
      'published_at' => ($status == 'draft') ? $published_at : date('Y-m-d H:i:s'),
      'status' => $status,
      'category_primary' => (!empty($make_primary_category)) ? $this->model->get_category($make_primary_category)['slug'] : null,
      'created_at' => date('Y-m-d H:i:s'),
      'created_by' => $created_by
    );

    $this->model->post($param_article);
    $article_id = $this->db->insert_id();

    foreach ($category as $key => $value) {
      $category_primary = ($value == $make_primary_category) ? 'true' : 'false';

      $param_categories_article = array(
        'article_id' => $article_id,
        'category_id' => $value,
        'category_primary' => $category_primary
      );

      $this->model->post_categories_article($param_categories_article);
    }

    $this->master_m->insert_log('add', 'article');

    $this->session->set_flashdata('200','1');
    redirect('dashboard/news');
  }

  function edit_data() {
    $uuid = $this->input->post('id');
    $row = $this->model->get_data_uuid($uuid);
    
    if(!empty($row)){
      $article_id = $row['id'];
      $title = $this->input->post('title');
      $slug = $this->master_m->check_slug('categories', $title);
      $abstract = $this->input->post('abstract');
      $content = $this->input->post('content');
      $published_at = $this->input->post('published_at');
      $status = $this->input->post('status');
  
      $category = $this->input->post('category');
      $make_primary_category = $this->input->post('make_primary');
  
      $session = $this->session->userdata('transisi');
      $updated_by = $session['id'];
      $thumbnail = "";
  
      if(!empty($_FILES['thumbnail']['name'])){
        $thumbnail = $this->master_m->upload('thumbnail');
      }else{
        $thumbnail = $this->input->post('old_thumbnail');
      }

      $param_article = array(
        'title' => $title,
        'slug' => $slug,
        'thumbnail' => $thumbnail,
        'abstract' => $abstract,
        'content' => $content,
        'published_at' => ($status == 'draft') ? $published_at : date('Y-m-d H:i:s'),
        'status' => $status,
        'category_primary' => (!empty($make_primary_category)) ? $this->model->get_category($make_primary_category)['slug'] : null,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $updated_by
      );

      $this->model->put($article_id, $param_article);

      $this->model->delete_categories_article($article_id);
      
      foreach ($category as $key => $value) {
        $category_primary = ($value == $make_primary_category) ? 'true' : 'false';
  
        $param_categories_article = array(
          'article_id' => $article_id,
          'category_id' => $value,
          'category_primary' => $category_primary
        );
  
        $this->model->post_categories_article($param_categories_article);
      }
  
      $this->master_m->insert_log('edit', 'article');

      $this->session->set_flashdata('200','1');
    }else{
      $this->session->set_flashdata('404','1');
    }

    redirect('dashboard/news');
  }

  function delete_data($status = '') {
    $uuid = $this->input->post('id_modal');
    $data = $this->model->get_data_uuid($uuid);
    $session = $this->session->userdata('transisi');
    $deleted_by = $session['id'];

    if(!empty($data)){
      if($status == 'trash'){ //permanent delete
        $id = $data['id'];

        $this->model->delete_categories_article($id);
        $this->model->hard_delete($id);

        $this->master_m->insert_log('delete', 'article');
      }else{
        $id = $data['id'];

        $value = array(
          'status' => 'soft_delete',
          'deleted_at' => date('Y-m-d H:i:s'),
          'deleted_by' => $deleted_by
        );
  
        $this->model->put($id, $value);
  
        $this->master_m->insert_log('soft_delete', 'article');
      }
    }

    $this->session->set_flashdata('200','1');
    redirect('dashboard/news');
  }

  function restore_data() {
    $uuid = $this->input->post('id_modal');
    $data = $this->model->get_data_uuid($uuid);
    $session = $this->session->userdata('transisi');
    $deleted_by = $session['id'];

    if(!empty($data)){
      $id = $data['id'];
      $value = array('status' => 'draft');

      $this->model->put($id, $value);

      $this->master_m->insert_log('restore', 'article');
    }

    $this->session->set_flashdata('200','1');
    redirect('dashboard/news');
  }

}


/* End of file Dashboard/News.php */
/* Location: ./application/controllers/Dashboard/News.php */