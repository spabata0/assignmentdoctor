<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('user_model');
        $this->users = new User_Model();
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'users' => $this->users->displayList()
        );
        $this->load->view('users/index',$data);

    }

    public function add(){
        self::_validate();
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('users/add',$data);
    }

    public function edit(){

        self::_validate();
        $data = array(
            'users' => $this->users->displayList(array('id_accounts'=>$this->id)),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('users/edit',$data);
    }

    public function delete() {
         $this->db->where('id_accounts', $this->id);
            $this->db->update('accounts', array("is_deleted"=>1));
            redirect('users');
    }

    private function _validate() {
        $this->form_validation->set_rules('username','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');

        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {


        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'firstname' => $this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'email'=>$this->input->post('email'),
                'mobile_no'=>$this->input->post('mobile_no'),
                'role_id'=>$this->input->post('role_id'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );

            $this->db->insert('accounts',$data);
            redirect('users');
        }

    }

    private function _editInfo() {

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'firstname' => $this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'email'=>$this->input->post('email'),
                'mobile_no'=>$this->input->post('mobile_no'),
                'role_id'=>$this->input->post('role_id'),
                'is_active'=>$this->input->post('is_active'),
                'modified_by'=>1,
                'date_modified'=>date("Y-m-d H:i:s"),
            );


            $this->db->where('id_accounts', $this->id);
            $this->db->update('accounts', $data);
            redirect('users');
        }
    }
}
