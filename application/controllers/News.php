<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller News
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
    $this->load->model('news_model', 'model');
  }

  public function index()
  {
    $data = array(
			'title' => 'Indonesia Energy Transition Think Tank',
			'desc' => 'Lembaga Riset Keuangan untuk Transisi Energi di Indonesia',
      'image' => base_url().'assets/img/Logo_TB.png',
      'breadcumb' => 'News',
			'page' => 'news_v',
			'view' => 'news',
      'articles' => $this->model->get_articles(),
      'categories' => $this->model->get_categories()
		);

		$this->load->view('index_v', $data);
  }

  public function detail($slug)
  {
    $article = $this->model->get_article($slug);

    $data = array(
			'title' => (!empty($article)) ? $article['title'] : 'Detail Artikel',
			'desc' => (!empty($article)) ? $article['abstract'] : 'Detail Artikel',
      'image' => (!empty($article)) ? $this->master_m->parseImg($article['thumbnail']) : base_url().'assets/img/Logo_TB.png',
      'breadcumb' => '',
			'page' => 'articles_detail_v',
			'view' => 'news',
      'data' => $article
		);

		$this->load->view('index_v', $data);
  }

}


/* End of file News.php */
/* Location: ./application/controllers/News.php */