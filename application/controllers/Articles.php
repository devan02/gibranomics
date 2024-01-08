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

class Articles extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = array(
			'title' => 'Indonesia Energy Transition Think Tank',
			'desc' => 'Lembaga Riset Keuangan untuk Transisi Energi di Indonesia',
            'breadcumb' => 'Articles',
			'page' => 'articles_v',
			'view' => 'articles'
		);

		$this->load->view('index_v', $data);
  }

}


/* End of file News.php */
/* Location: ./application/controllers/News.php */