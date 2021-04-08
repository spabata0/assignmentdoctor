<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('user_model');
        $this->load->model('settings_model');
        $this->users = new User_Model();
        $this->settings = new Settings_Model();
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $settings = $this->settings->displayList();
        
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'settings' => $settings
        );
        $this->load->view('settings/index',$data);

    }

    public function updateConfig(){
      
        $config['upload_path']  = FCPATH.'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;
       
        $this->load->library('upload', $config);
        
        if(isset($_FILES)) {
            if ($this->upload->do_upload('fileToUpload'))
            {
                $data = array('upload_data' => $this->upload->data());
              
                $this->db->where(array('item'=>'company_logo'));
                $this->db->update('settings',array('value'=>$data['upload_data']['file_name']));
            }
        }
        
       
        $this->db->where(array('item'=>'company_name'));
        $this->db->update('settings',array('value'=>$this->input->post('company_name')));
    
        $this->db->where(array('item'=>'company_address'));
        $this->db->update('settings',array('value'=>$this->input->post('company_address')));

        $this->db->where(array('item'=>'email_address'));
        $this->db->update('settings',array('value'=>$this->input->post('email_address')));

        $this->db->where(array('item'=>'contact_number'));
        $this->db->update('settings',array('value'=>$this->input->post('contact_number')));

        $this->db->where(array('item'=>'facebook_link'));
        $this->db->update('settings',array('value'=>$this->input->post('facebook_link')));

        $this->db->where(array('item'=>'youtube_link'));
        $this->db->update('settings',array('value'=>$this->input->post('youtube_link')));

        $this->db->where(array('item'=>'long'));
        $this->db->update('settings',array('value'=>$this->input->post('long')));

        $this->db->where(array('item'=>'lat'));
        $this->db->update('settings',array('value'=>$this->input->post('lat')));

        $this->session->set_flashdata('success', 'Successfully edit Configuration!');

        redirect('settings');
    }

    
}
