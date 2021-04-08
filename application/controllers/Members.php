<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {



    public function __construct() {

        parent::__construct();

		

		//$this->output->enable_profiler(TRUE);
			
			// Load form helper library
		$this->load->helper('form');
			
			// Load form validation library
		$this->load->library('form_validation');
			// Load session library
		$this->load->library('session');
			
			// Load database
		$this->load->model('Member_model');

		$this->load->library('facebook'); 
	  

    }





    public function index()

    {
		include_once  "/home/assig598/staging.assignmentdoctor.com/application/libraries/vendor/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId('779754695121-js8vvaani2993p2up5lv6tep9bcqpifs.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('Cpv_oFW5cD7fHpS0SIxSHsk-'); //Define your Client Secret Key 
		$google_client->setRedirectUri('http://staging.assignmentdoctor.com/members'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');

		$this->load->library('facebook'); 


        // $this->load->helper('url');
		if(isset($this->session->userdata['logged_in'])){
			redirect('/members/dashboard');
		}

		

        $data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'authURL' =>  $this->facebook->login_url(),

			'google_client' => $google_client

        );

		$data['message'] = $this->input->get('status');

        $this->load->view('members/members.php',$data);

		


    }

	public function download($filename = null) {
		
		$this->load->helper('download');

		if($filename) {
			$file = realpath("uploads/output") . "//" . $filename;
			if(file_exists($file)) {
				$data = file_get_contents($file);
				force_download ($filename, $data);
			} else {
				echo "File does not exist ...";
			}
		}
	}
	/*

	public function download2($filepath = "") {
		
		$this->load->helper('download');

		$data['download_file'] = $filepath;

		$this->load->view('members/download_view',$data);
		redirect(currenct_url(), "refresh");
	}
	*/


	public function signup()
	{

		$this->load->library('facebook'); 
		include_once APPPATH . "libraries/vendor/autoload.php";

		$google_client = new Google_Client();
		$google_client->setClientId('779754695121-js8vvaani2993p2up5lv6tep9bcqpifs.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('Cpv_oFW5cD7fHpS0SIxSHsk-'); //Define your Client Secret Key 
		$google_client->setRedirectUri('http://localhost/assignmentdoctor/members'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');

		$message= "";

		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confrim password', 'trim|required|min_length[5]');

		
		if($this->form_validation->run()==true) {

			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);

			$member_exist = $this->Member_model->member_exist($data['username']);

		   if($member_exist) {

				$message= "Username is taken.";


		   } else {

		   $result = $this->Member_model->register_member($data);

		   $emaildet = array(
			'email' => $data['email'],
			'subject' => 'Welcome to Assignment Doctor',
			'hash' => md5($data['email'])
			);

			$this->emailnotify($emaildet);

		   if($result) {
			   
				redirect(base_url() . "members/");
		   }
		  }

		}

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'authURL' =>  $this->facebook->login_url(),

			'google_client' => $google_client,

			'message' => $message
        );
		


		$this->load->view('members/signup.php',$data);
	
	
			
	
	}


	public function testemail() {
		/*

		$this->load->library('email');

		$config['mailtype'] = 'html';

		$this->email->

		$this->email->from('email@example.com', 'Identification');
		$this->email->to('tester@localhost.com');
		$this->email->subject('Send Email Codeigniter');
		$this->email->message('The email send using codeigniter library');

		$this->email->send();
		*/

		$emaildet = array(
			'email' => 'tester@localhost.com',
			'subject' => 'this is a test'
		);

		$this->emailnotify($emaildet);

	}


	public function dashboard()
	{

		if(!isset($this->session->userdata['logged_in'])) {
			redirect('/members/');
		}

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$creds = $this->session->userdata('logged_in');

		$query = $this->Member_model->get_orders($creds['id']);
		$data['username'] = $creds['username'];
		$data['query'] = $query;

		$this->load->view('members/dashboard.php',$data);


	}

	public function check_progress()
	{

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$creds = $this->session->userdata('logged_in');

		$query = $this->Member_model->get_orders_status($creds['id']);
		$data['username'] = $creds['username'];
		$data['query'] = $query;
		

		$this->load->view('members/check_progress.php',$data);


	}

	public function order_revisions()
	{

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$creds = $this->session->userdata('logged_in');

		$query = $this->Member_model->get_orders_status($creds['id']);
		$data['username'] = $creds['username'];
		$data['query'] = $query;
		

		$this->load->view('members/order_revisions.php',$data);

	}


	public function request_revision()
	{

		$order_no = $this->input->get('oid');

		

		if($_POST) {

			$det = array(
				'order_id' => $this->input->post('order_no'),
				'notes' => $this->input->post('notes')
			);

			$this->Member_model->save_revision($det);
		}

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$data['oid'] = $order_no;

		$this->load->view('members/add_revision.php',$data);

	}

	public function revision_history()
	{

		$order_no = $this->input->get('oid');


		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$data['order_no'] = $order_no;


		$data['query'] = $this->Member_model->get_revisions($order_no);

		$this->load->view('members/revisions_history.php',$data);

	}

	public function update_member()
	{

		$data = array(

            'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

			'members_menu' =>$this->load->view('members/members_menu.php',array(),TRUE),

        );

		$creds = $this->session->userdata('logged_in');

		if($_POST) {
			$m_details = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city'  => $this->input->post('city'),
				'country'  => $this->input->post('country'),
				'phone_no'  => $this->input->post('phone_no'),
			);

			$this->Member_model->update_member_details($m_details,$creds['id']);
		
		}

		$creds = $this->session->userdata('logged_in');

		$query = $this->Member_model->get_member_details($creds['id']);
		$data['username'] = $creds['username'];
		$data['member_details'] = $query->result();

		$this->load->view('members/update_member.php',$data);


	}

	public function register_member()
	{

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

	public function activate_account() {
		
		$hash = $this->input->get('h');

		$is_registered = $this->Member_model->check_member_hash($hash);

		print_r($is_registered);

		if($is_registered) {
			$this->session->flashData('messsage',"Your account is active. please Sign In.");
			redirect('members/');
		} else {
			echo "This email is not registered";
		}
	}

	public function google_login() {

	}

	public function fb_login() {

		$this->load->library('facebook'); 


		if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fb_user = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 

            
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fb_user['id'])?$fb_user['id']:'';; 
            $userData['first_name']    = !empty($fb_user['first_name'])?$fb_user['first_name']:''; 
            $userData['last_name']    = !empty($fb_user['last_name'])?$fb_user['last_name']:''; 
            $userData['email']        = !empty($fb_user['email'])?$fb_user['email']:''; 
            $userData['gender']        = !empty($fb_user['gender'])?$fb_user['gender']:''; 
            $userData['picture']    = !empty($fb_user['picture']['data']['url'])?$fb_user['picture']['data']['url']:''; 
            $userData['link']        = !empty($fb_user['link'])?$fb_user['link']:'https://www.facebook.com/'; 
            
           
            // Insert or update user data to the database 
            //$userID = $this->user->checkUser($userData); 
             
            // Check user data insert or update status 
            if(!empty($userData['email'])){ 
                $this->Member_model->login_email($userData['email']); 
				redirect('members/dashboard'); 
            }else{ 
               $data['userData'] = array();
			   redirect('members'); 
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        // Load login/profile view 
        $this->load->view('user_authentication/index',$data); 
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

	private function emailnotify($emaildet)
	{
     
        $this->load->library('email');
		/*
         $config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                   );
		*/
		 $config = array(	
				'mailtype' => 'html',
				);
		
        $this->email->initialize($config);

    	$this->email->set_newline("\r\n");
    
        $this->email->from('info@assignmentdoctor.com', 'Assignment Doctor');

        $this->email->to($emaildet['email']);  // replace it with receiver mail id
    	$this->email->subject($emaildet['subject']); // replace it with relevant subject 
    
		$data = array('hash' => $emaildet['hash']);
        $body = $this->load->view('emails/registration',$data,TRUE);
    	$this->email->message($body);   

        return $this->email->send();
    }
	

}

