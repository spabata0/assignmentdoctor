<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }

        $this->load->model('login_model');
        $this->login = new Login_Model();

    }

    public function index()
    {

          $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('dashboard/index',$data);

    }
}
