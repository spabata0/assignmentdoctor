<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('login_model');
        $this->load->model('categories_model');
        $this->login = new Login_Model();
        $this->categories = new Categories_Model();
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'categories' => $this->categories->displayList()
        );
        $this->load->view('categories/index',$data);

    }

    public function add(){
        self::_validate();
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('categories/add',$data);
    }

    public function edit(){

        self::_validate();
        $data = array(
            'news' => $this->news->displayList(array('id_news'=>$this->id)),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('categories/edit',$data);
    }

    public function delete() {
        $this->db->where('id_categories', $this->id);
            $this->db->update('categories', array("is_deleted"=>1));
            redirect('categories');
    }

    private function _validate() {
        $this->form_validation->set_rules('category','category','required|trim');
        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {
        
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'category' => $this->input->post('category'),
                'description'=>$this->input->post('description'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
            );


            $this->db->insert('categories',$data);
         
            redirect('categories');
        }

    }

    private function _editInfo() {

        if ($this->form_validation->run() == TRUE) {
            
            $data = array(
                'category' => $this->input->post('news_url'),
                'description'=>$this->input->post('description'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
            );


            $this->db->where('id_categories', $this->id);
            $this->db->update('categories', $data);
            redirect('categories');
        }
    }
}
