<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard/Category
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

class Category extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
		$this->load->model('dashboard/category_model','model');

		$session = $this->session->userdata('transisi');
    $id = $session['id'];
    if(empty($id)){
      redirect('dashboard/login');
    }
  }

  public function index()
  {
    $data = array(
			'page'		=> 'dashboard/category_v',
			'title'    	=> 'Kategori',
			'menu' 	   	=> 'post',
			'submenu' => 'category',
			'breadcumb' => 'Kategori',
			'url_add' => '',
      'datas' => $this->model->get_data()
		);

		$this->load->view('dashboard/index_home_v',$data);
  }

  function get_detail() {
    $slug = $this->input->get('slug');
    $data = $this->model->get_row($slug);
    echo json_encode($data);
  }

  function submit() {
    $id_edit = $this->input->post('id_edit'); // isinya slug
    $category = $this->input->post('category');
    $slug = $this->master_m->check_slug('categories', $category);
    $session = $this->session->userdata('transisi');
    $created_by = $session['id'];

    if(empty($id_edit)){
      $param = array(
        'category' => $category,
        'slug' => $slug,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $created_by
      );
      $this->model->create($param);
  
      $this->master_m->insert_log('create', 'category');

      $this->session->set_flashdata('200','1');
    }else{
      $tempData = $this->model->get_row($id_edit);

      if(empty($tempData)){
        $this->session->set_flashdata('404','1');
      }else{
        $param = array(
          'category' => $category,
          'slug' => $slug,
          'updated_at' => date('Y-m-d H:i:s'),
          'updated_by' => $created_by
        );
        $this->model->update($id_edit, $param);

        $this->master_m->insert_log('edit', 'category');

        $this->session->set_flashdata('200','1');
      }
      
      // $category_id = $tempData['id'];
      // $tempCategoriesArticle = $this->model->get_categories_article($category_id);

      // if(!empty($tempCategoriesArticle)){
      //   $this->session->set_flashdata('400','1');
      // }
    }

		redirect('dashboard/category');
  }

  function delete() {
    
  }

}


/* End of file Dashboard/Category.php */
/* Location: ./application/controllers/Dashboard/Category.php */