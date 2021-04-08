<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pages extends CI_Controller {



    public function __construct() {

        parent::__construct();



        if (!isset($this->session->is_login) == TRUE) {

            redirect(base_url());

        }



        $this->load->model('login_model');

        $this->load->model('pages_model');

        $this->login = new Login_Model();

        $this->pages = new Pages_Model();

        $this->id = $this->uri->segment(3);





    }



    public function index()

    {
        $cond = array (
                'is_deleted' => 0
        );

        $data = array(

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

            'pages' => $this->pages->displayList($cond)

        );

        $this->load->view('pages/index',$data);



    }



    public function add(){

        self::_validate();

        $data = array(

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

        );

        $this->load->view('pages/add',$data);

    }



    public function edit(){



        self::_validate();

        $data = array(

            'pages' => $this->pages->displayList(array('id_pages'=>$this->id)),

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

        );

        $this->load->view('pages/edit',$data);

    }



    public function delete() {

        $this->db->where('id_pages', $this->id);
            $this->db->update('pages', array('is_deleted'=>1));

            //print_r($this->db->last_query());

            redirect('pages');

    }



    private function _validate() {

        $this->form_validation->set_rules('url','url','required|trim');

        $this->form_validation->set_rules('page_title','page_title','required|trim');

        // $this->form_validation->set_rules('description','description','required|trim');

        if ($this->uri->segment(2) == 'add') {

            self::_addInfo();

        } else {

            self::_editInfo();



        }

    }



    private function _addInfo() {





        if ($this->form_validation->run() == TRUE) {

             $config['upload_path']          = './assets/uploads/';

            $config['allowed_types']        = 'gif|jpg|png';

            $config['max_size']             = 200;

            $config['max_width']            = 1024;

            $config['max_height']           = 768;



            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('image_url')){

                $arData='';

            }else{

                $arData = $this->upload->data('file_name');

                    // $this->load->view('upload_success', $data);

            }

             $data = array(

                'url' => $this->input->post('url'),

                'page_title' => $this->input->post('page_title'),

                'page_content' => $this->input->post('page_content'),

                'is_active'=>$this->input->post('is_active'),

                'created_by'=>1,

                'date_created'=>date("Y-m-d H:i:s"),

            );



            $this->db->insert('pages',$data);

            redirect('pages');

        }



    }



    private function _editInfo() {



        if ($this->form_validation->run() == TRUE) {

            $config['upload_path']          = './assets/uploads/';

            $config['allowed_types']        = 'gif|jpg|png';

            $config['max_size']             = 200;

            $config['max_width']            = 1024;

            $config['max_height']           = 768;



            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('image_url')){

                $arData='';

            }else{

                $arData = $this->upload->data('file_name');

                    // $this->load->view('upload_success', $data);

            }



            if (!empty($arData)) {

                $data['image_url'] = $arData;

            }

             $data = array(

                'url' => $this->input->post('url'),

                'page_title' => $this->input->post('page_title'),

                'page_content' => $this->input->post('page_content'),

                'is_active'=>$this->input->post('is_active'),

                'created_by'=>1,

                'date_created'=>date("Y-m-d H:i:s"),

            );





            $this->db->where('id_pages', $this->id);

            $this->db->update('pages', $data);

            redirect('pages');

        }

    }

}

