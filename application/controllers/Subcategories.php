<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('login_model');
        $this->load->model('categories_model');
        $this->load->model('subcategory_model');

        $this->login = new Login_Model();
        $this->categories = new Categories_Model();
        $this->subcategories = new Subcategory_Model();
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'subcategories' => $this->subcategories->displayList(),
            
        );
        $this->load->view('subcategories/index',$data);

    }

    public function add(){
        self::_validate();
        $data = array(
            'category'=> $this->categories->displayList(),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('subcategories/add',$data);
    }

    public function edit(){

        self::_validate();
        $data = array(
            'subcategory' => $this->subcategories->displayList(array('id_subcategories'=>$this->id)),
            'category'=> $this->categories->displayList(),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('subcategories/edit',$data);
    }

    public function delete() {
        $this->db->where('id_subcategories', $this->id);
            $this->db->update('subcategories', array("is_deleted"=>1));
            redirect('subcategories');
    }

    private function _validate() {
        $this->form_validation->set_rules('subcategory_name','subcategory_name','required|trim');
        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {
        
        if ($this->form_validation->run() == TRUE) {
            $lowername = strtolower($this->input->post('subcategory_name'));
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_name' => $this->input->post('subcategory_name'),
                'description'=>$this->input->post('description'),
                'slug_name' => str_replace(' ','-',$lowername),
                // 'is_active'=>$this->input->post('is_active'),
                // 'created_by'=>1,
                // 'created_at'=>date("Y-m-d H:i:s"),
            );


            $this->db->insert('subcategories',$data);
         
            redirect('subcategories');
        }

    }

    private function _editInfo() {

        if ($this->form_validation->run() == TRUE) {
            $lowername = strtolower($this->input->post('subcategory_name'));
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'subcategory_name' => $this->input->post('subcategory_name'),
                'description'=>$this->input->post('description'),
                'slug_name' => str_replace(' ','-',$lowername),
                // 'is_active'=>$this->input->post('is_active'),
                // 'created_by'=>1,
                // 'created_at'=>date("Y-m-d H:i:s"),
            );


            $this->db->where('id_subcategories', $this->id);
            $this->db->update('subcategories', $data);
            redirect('subcategories');
        }
    }
}
