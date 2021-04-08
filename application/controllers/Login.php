<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
			
        // Load form validation library
        $this->load->library('form_validation');
        // Load session library
        $this->load->library('session');

        $this->load->model('login_model');

        $this->login = new Login_Model();

    }





    public function index()

    {

        
        $data = array(

            'header' =>$this->load->view('template/header',array(),TRUE),

            'footer' => $this->load->view('template/footer',array(),TRUE),

        );

        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == TRUE) {

            $cred = array(
                'username'=>$this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'is_active'=>1
            );



            // $this->load->helper('url');
        

            $x = $this->login->displayList($cred);

            print_r($x->result());


            if ($x->num_rows() > 0) {

                $newdata = array(
                    'id' => $x->id_accounts,
                    'username'  => $x->username,
                    'fullname' => $x->firstname.' '.$x->lastname,
                    'is_login' => true
                );

                $this->session->set_userdata($newdata);
                redirect('dashboard');

            } 
        }

        $this->load->view('login/index',$data);
    }



    private function validate() {

        //$this->form_validation->set_rules('username','Username','trim|required');
        //$this->form_validation->set_rules('password','Password','required');



        // if ($this->form_validation->run() == TRUE) {

        //     redirect('dashboard');

        // }

        $this->login();

        //print("validate");

    }




    public function logout() {

        $this->session->sess_destroy();

        redirect(base_url()."cms");

    }

}

