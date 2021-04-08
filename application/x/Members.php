<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {



    public function __construct() {

        parent::__construct();
	
			
			// Load form helper library
		$this->load->helper('form');
			
			// Load form validation library
		$this->load->library('form_validation');
			// Load session library
		$this->load->library('session');
			
			// Load database
		$this->load->model('Member_model');

    }





    public function index()

    {

        // $this->load->helper('url');
		if(isset($this->session->userdata['logged_in'])){
			redirect('/members/dashboard');
		}

		

        $data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

        );

		$data['message'] = $this->input->get('status');

        $this->load->view('members/members.php',$data);

		


    }

	public function signup()
	{

		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confrim password', 'trim|required|min_length[5]');

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

        );

		if($this->form_validation->run()==true) {
						$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);

		
		   $result = $this->Member_model->register_member($data);

		   if($result)
				redirect("members/");
		} else {
			$this->load->view('members/signup.php',$data);
		}
	
			
	
	}


	public function dashboard()
	{

		if(!isset($this->session->userdata['logged_in'])) {
			redirect('/members/');
		}

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

        );

		$creds = $this->session->userdata('logged_in');

		$query = $this->Member_model->get_member_orders($creds['id']);
		$data['username'] = $creds['username'];
		$data['query'] = $query;

		$this->load->view('members/dashboard.php',$data);


	}

	public function register_member()
	{
		// Check validation for user input in SignUp form
		/*
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('members/signup.php');
			} else {	

				$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);

				$result = $this->member_model->registration_insert($data);

				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successfully !';
					$this->load->view('login_form', $data);
				} else {
					$data['message_display'] = 'Username already exist!';
					$this->load->view('registration_form', $data);
				}
			}
			*/

			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);

		
		   $result = $this->Member_model->register_member($data);

		   if($result)
				redirect("members/");

	}

	public function login_member()
	{

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

		$result = $this->Member_model->login($data);


		
		if($result['status'] == true) {
			if(isset($this->session->userdata['has_order'])) {
				$url = base_url() . "order"; 	
				redirect($url);
			}
		}

		if($result['status'] == true){
			redirect("members/dashboard");
		} else {
			redirect("members/?status=" . $result['message']);
		}
		
	}

    public function logout() {

		$sess_array = array(
			'id' => '',
			'username' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);
        $this->session->sess_destroy();

        redirect("members/");

    }

}

