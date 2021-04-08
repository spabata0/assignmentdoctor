<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributors extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('login_model');
        $this->load->model('distributors_model');
        $this->login = new Login_Model();
        $this->distributors = new Distributors_Model();
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'distributors' => $this->distributors->displayList(array('is_deleted'=>0))
        );
        $this->load->view('distributors/index',$data);

    }

    public function add(){
        self::_validate();
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('distributors/add',$data);
    }

    public function edit(){

        self::_validate();
        $data = array(
            'distributors' => $this->distributors->displayList(array('id_distributors'=>$this->id)),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('distributors/edit',$data);
    }

    public function delete() {
        $this->db->where('id_distributors', $this->id);
            $this->db->update('distributors', array("is_deleted"=>1));
            redirect('distributors');
    }

    private function _validate() {
        $this->form_validation->set_rules('name','url','required|trim');
       
        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {
        // $data = array();
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'longitude' => $this->input->post('longitude'),
                'latitude'=>$this->input->post('latitude'),
                'company_website'=>$this->input->post('company_website'),
                'email_address'=>$this->input->post('email_address'),
                'contact_number'=>$this->input->post('contact_number'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );


            $this->db->insert('distributors',$data);
            redirect('distributors');
        }

    }

    private function _editInfo() {

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'longitude' => $this->input->post('longitude'),
                'latitude'=>$this->input->post('latitude'),
                'company_website'=>$this->input->post('company_website'),
                'email_address'=>$this->input->post('email_address'),
                'contact_number'=>$this->input->post('contact_number'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );

            $this->db->where('id_distributors', $this->id);
            $this->db->update('distributors', $data);
            redirect('distributors');
        }
    }
}
