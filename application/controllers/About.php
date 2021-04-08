<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
        
        $this->pages = new Pages_Model();
	}
	public function index()
	{
	
		$data = array(
			'pages'=>$this->pages->displayList(array("url"=>"about")),
            'header' =>$this->load->view('templates/header',array(),TRUE),
            'footer' => $this->load->view('templates/footer',array(),TRUE),
            
        );
		
        $this->load->view('hue_are_we/index',$data);
	}
}
