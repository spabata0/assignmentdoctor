<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {



	public function __construct() {

        parent::__construct();

        $this->output->delete_cache();

		$this->load->model('products_model');

		$this->load->model('pages_model');

		$this->load->model('news_model');

		$this->load->model('distributors_model');

		$this->load->model('subcategory_model');

		$this->load->model('categories_model');

		$this->load->model('settings_model');

		$this->load->model('banners_model');

		$this->load->model('image_model');

		$this->load->model('welcome_model');



		$this->products = new Products_Model();

		$this->pages =  new Pages_Model();

		$this->news = new News_Model();

		$this->distributors = new Distributors_Model();

		$this->categories = new Categories_Model();

		$this->subcategory = new Subcategory_Model();

		$this->settings = new Settings_Model();

		$this->banners = new Banners_Model();

		$this->img = new Image_Model();


		$this->id = $this->uri->segment(1);

		

		$this->company_info = array(

			'logo'=> $this->settings->displayList(array('item'=>'company_logo')),

			'company_name' => $this->settings->displayList(array('item'=>'company_name')),

			'company_address' => $this->settings->displayList(array('item'=>'company_address')),

			'company_lat'=> $this->settings->displayList(array('item'=>'lat')),

			'company_long'=> $this->settings->displayList(array('item'=>'long')),

			'email_address' => $this->settings->displayList(array('item'=>'email_address')),

			'contact_num' => $this->settings->displayList(array('item'=>'contact_number')),

			'facebook'=> $this->settings->displayList(array('item'=>'facebook_link')),

			'youtube'=> $this->settings->displayList(array('item'=>'youtube_link')),



		);

		$this->footer_data =  array(

			'category'=>$this->categories->displayList(),

			'logo'=> $this->settings->displayList(array('item'=>'company_logo')),

			'company_name' => $this->settings->displayList(array('item'=>'company_name')),

			'company_address' => $this->settings->displayList(array('item'=>'company_address')),



		);

		$phData = array();

		
        $this->load->model('Welcome_model');
		$this->load->model('Member_model');




    }

	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function index()

	{	

		// print '<pre>'.print_r($this->banners->getLatestBanner(),1).'</pre>';exit;

		$data = array(

			'header' =>$this->load->view('frontend/header',array(), TRUE),
            'footer' => $this->load->view('frontend/footer',array(),TRUE),

		);

		$this->load->view('frontend/index',$data);

	}

	public function order()

	{	

		
		if($_POST) {

		$order_det = array(
			'academic_level' => $this->input->post('academic_level'),	
			'order_name' => $this->input->post('order_name'),
			'no_of_pages' => $this->input->post('pagetxt'),
			'price' => '',
			'urgency_level' => $this->input->post('urgency_level'),
			'formatting' => '',
			'language' => '',
			'reference' => '',
			'reffile' => '',
			 'comments' => '',
			 'pay_option' => '',
			 'message' => ''
		   );

		}

		
			if(isset($this->session->userdata['has_order'])) {
				$order_det = $this->session->userdata['has_order'];
			}


		
		$data = array(


			'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),


		);
		if(isset($order_det)) {
			$data['order_det'] = $order_det;
		} else {
			$data['order_det'] = array(
			'member_id' => '',
			'order_name' => '',
			'no_of_pages' => '',
			'price' => '',
			'academic_level' => '',
			'no_of_days' => '',
			'urgency_level' => '',
			'formatting' => '',
			'reffile' => '',
			'language' => '',
			'reference' => '',
			'comments' => '',
			'pay_option' => '',
			'message' => ''
		);
		}

		$this->load->view('frontend/order_now',$data);
		
	}

	public function process_order() {

		$data = array(
		 'academic_level' => $this->input->post('academic_level'),	
		 'order_name' => $this->input->post('doctype'),
		 'no_of_pages' => $this->input->post('qty'),
		 'price' => $this->input->post('d'),
		 'urgency_level' => $this->input->post('urgency_level'),
		 'formatting' => $this->input->post('formatting'),
		 'language' => $this->input->post('language'),
		 'reference' => $this->input->post('reference'),
		 'reffile'=> $_FILES['reffile']['name'],
		  'comments' => $this->input->post('notes')
		);

		
		if($this->session->userdata('logged_in') !== null) {

			$x = $this->session->userdata('logged_in');

			$data['member_id'] = $x['id'];

			if(!$this->session->userdata['has_order']['is_save'] == true) {
				$result = $this->Welcome_model->process_order($data);
				$this->uploadFile();
			}

			$this->session->userdata['has_order'] = $data;
			$this->session->userdata['has_order']['trans_id'] = $result['trans_id'];
			$this->session->userdata['has_order']['is_save'] = true;
			redirect("review_order/");

		} else {
			if(!isset($this->session->userdata['logged_in'])){
				$data['message'] =  "You need to <a href=\"" . base_url() .  "members\">login</a> or <a href=\"" . base_url() . "members/signup\">sign-up</a> before you can place an order." . $data['reffile'];
				$this->session->userdata['has_order'] = $data;
			} else {
				$data['message'] =  "You have a pending order on your cart.";
				$this->session->userdata['has_order'] = $data;
			}
			$this->session->set_flashdata('post',$_FILES);
			redirect("order/");
		}
		

	}


	public function review_order() {


		
		$data = array(


			'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),


		);

		
		$data['order_det'] = $this->session->userdata('has_order');

		
		$data['academic_level'] = $this->getAcademicLevel($data['order_det']['academic_level']);
		$data['order_name'] = $this->getProduct($data['order_det']['order_name']);
		$data['urgency_level'] = $this->getUrgencyLevel($data['order_det']['urgency_level']);
		$data['formatting'] = $this->getFormatting($data['order_det']['formatting']);
		$data['language'] = $this->getLanguage($data['order_det']['language']);
	

		$this->load->view('frontend/review_order',$data);
		
		//if($result)
		//	 echo "inserted";
		//
		// redirect("order/");

	}

	public function success_order() {

		
		$data = array(


			'header' =>$this->load->view('frontend/header_inner',array(),TRUE),

            'footer' => $this->load->view('frontend/footer_inner',array(),TRUE),

		);

		$this->session->unset_userdata('has_order');

		$sid = $this->input->get('sid');
	
		$item = $this->Member_model->get_paid_order($sid);

		$data['pay_details'] = $item;

		$this->load->view('frontend/success_order',$data);
		

	}

	public function clear_order() {

		$this->session->unset_userdata('has_order');
        //$this->session->sess_destroy();

        //redirect("members/");

    }

	public function paypal() {

		$data = array();

		$this->load->view('frontend/paypal',$data);
	}

	private function getAcademicLevel($type) {

		$data = array (
					'hs' => "High School",
					'col' => "College/University",
					'mba' => "Masters/MBA",
					'doc' => "Doctorate"
				);

		return $data[$type];
	}

	private function uploadFile() {

		$this->load->library('upload');

		$config = array (
			'upload_path' => './uploads/',
			'allowed_types' => 'doc|docx|pdf',
			'max_size' => '1000'
		);

		$this->upload->initialize($config);

		if($this->upload->do_upload('reffile')){
			$file_det = $this->upload->data();
		}

		return $file_det;
	}

	private function getProduct($type) {

		$data = array (
			'1' => 'Essay',
			'2' => 'Narrative Essay',
			'3' => 'Descriptive Essay',
			'4' => 'Argumentative Essay Term Paper',
			'5' => 'Research Paper',
			'6' => 'Draft',
			'7' => 'Abstract',
			'8' => 'Literature Review'
		);

		return $data[$type];
	}

	private function getUrgencyLevel($type) {

		$data = array (
			'1' => '1 Day',
			'2' => '2 Days',
			'3' => '3-4 Days',
			'4' => '5-7 Days',
			'5' => '7-9 Days',
			'6' => '10 Days',
		);

		return $data[$type];
	}

	private function getFormatting($type) {

		$data = array (
			'1' => 'APA',
			'2' => 'MLA',
			'3' => 'Harvard',
			'4' => 'Chicago',
			'5' => 'Others',
		);

		return $data[$type];
	}

	private function getLanguage($type) {

		$data = array (
			'1' => 'British',
			'2' => 'American',
			'3' => 'Australian',
		);

		return $data[$type];
	}

	
	public function trialpage() {
		$this->load->view('frontend/trialpage',$data);
	}

	public function news(){



	}



	public function get_news(){

		$newsID = $this->uri->segment(2);

	

		$newsImgData = array();

		$news =  $this->news->displayList(array('slug' => $newsID));

		

		$newsImg = $this->img->displayList(array('post_id'=>$news[0]->id_news));

		// echo '<pre>';

		// print_r($newsImg);exit;

		foreach($newsImg as $objNews){

			$newsImgData[] = array(

				'img' => $objNews->filename

			);

		}

		// print_r($newsImgData);exit;

		$data = array(

			'page' => $this->news->displayList(array('slug' => $this->uri->segment(2))),

			'image' => $newsImgData,

			'header' =>$this->load->view('frontend/header1',array('title'=>'News - '.$news[0]->title,'company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);

		

		// print '<pre>'.print_r($news,1).'</pre>';exit;

		$this->load->view('frontend/news_inner',$data);

	}



	public function get_page(){

		$page = $this->pages->displayList(array('url' => $this->id));

		$data = array(

			'page' => $this->pages->displayList(array('url' => $this->id)),

			'header' =>$this->load->view('frontend/header_inner',array('title'=>'Digimarine - '.$page[0]->page_title,'company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);


		$this->load->view('frontend/inner_page',$data);

	}



	public function get_products(){

		// echo $this->uri->segment(3);exit;

		$slug = $this->uri->segment(3);

		if(!empty($this->uri->segment(4))){

			$slug = $this->uri->segment(4);

		}else{

			$slug = $this->uri->segment(3);

		}



		$product = $this->products->displayList(array('slug' =>$slug));

	

		$data = array(

			'page' => $product,

			'header' =>$this->load->view('frontend/header1',array('title'=>!empty($product) ?  $product[0]->category.' - '.$product[0]->title : '','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		if(empty($product)){

			$this->getProductHardware($this->uri->segment(2),$this->uri->segment(3));

		}else{

			$this->load->view('frontend/products_inner',$data);

		}

	}



	public function product_catalog(){

		// echo "fck";exit;

		$category = $this->categories->displayList(array('category'=>$this->uri->segment(2)));

		$sc = $this->subcategory->displayList(array('slug_name'=>$this->uri->segment(3)));

		$product = $this->products->displayList(array('u.is_publish'=>1,'u.category' =>$category[0]->id_categories,'u.is_deleted'=>0));

		if(!empty($category) && !empty($sc)){

			

				$product = $this->products->displayList(array('u.is_publish'=>1,'u.subcategory_id'=>$sc[0]->id_subcategories,'u.category'=>$category[0]->id_categories,'u.is_deleted'=>0));

		}

		$headerData = array(

			'title'=>'Digimarine -'.$category[0]->category,'company_info'=>$this->company_info,

			'product_hardware' => $this->products->getProductCategory(),

			'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),

			'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),

			'subcategory'=> !empty($sc)  ? $this->subcategory->displayList(array('id_subcategories'=>$sc[0]->id_subcategories)) : array()

		);

		

		$data = array(

			'products' => $product,

			'header' =>$this->load->view('frontend/header1',$headerData,TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		$this->load->view('frontend/product_list',$data);

	}



	public function distributors(){

		$this->load->library('googlemaps');

		$config['apiKey'] = "AIzaSyBl_Samz_aD6AfLYODq8b9EVfdyEQrP_gE";

		$config['zoom'] = "auto";

		$this->googlemaps->initialize($config);

		

		$distrbutor = $this->distributors->displayList();

		// print '<pre>'.print_r($distrbutor,1).'</pre>';exit;

		foreach($distrbutor as $objDistributor){

			$marker = array();

			$info = "<div><h2><strong>".$objDistributor->name."</strong></h2></div><div><strong>Address</strong></b>:".$objDistributor->address."</div><div><strong>Company Website</strong>:".$objDistributor->company_website."</div><div><strong>Email:</strong>".$objDistributor->email_address."</div><div><strong>Contact Number:</strong>".$objDistributor->contact_number."</div>";

			$marker['position'] = $objDistributor->latitude.','.$objDistributor->longitude;

			$marker['infowindow_content'] = $info;

			$this->googlemaps->add_marker($marker);

		}

		

		



		$data = array(

			'map' => $this->googlemaps->create_map(),

			'header' =>$this->load->view('frontend/header1',array('title'=>'Digimarine - Distributors','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);

		$this->load->view('frontend/distributors',$data);

	}



	public function news_updates(){

		$product = $this->news->displayList(array('is_active' =>1),array('date_created' => 'DESC'));

		

		$data = array(

			'page' => $product,

			'header' =>$this->load->view('frontend/header1',array('title'=>'Digimarine - News','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);

		$this->load->view('frontend/news',$data);

	}



	public function search(){

		$data = array();

		$search_data = array();

		$search = $this->input->post('search');

		$product_query = "select u.*,c.* from products u left join categories c on c.id_categories=u.category where u.is_publish = 1 and (u.title like '%".$search."%' or u.long_desc like '%".$search."%')";

		$pquery = $this->db->query($product_query)->result();

		foreach($pquery as $objProducts){

			$search_data[] = $objProducts;

		}

		$news_query = "select u.* from news u where u.is_active = 1 and (u.title like '%".$search."%' or u.description like '%".$search."%')";

		$nquery = $this->db->query($news_query)->result();

		foreach($nquery as $objNews){

			$search_data[] = $objNews;

		}

	

		$data = array(

			'search_key' => $search,

			'search_result' => $search_data,

			'header' =>$this->load->view('frontend/header1',array('title'=>'Search','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		$this->load->view('frontend/search',$data);

		

	}



	public function contactUs(){

		// print '<pre>'.print_r($this->company_info ,1).'</pre>';exit;

		$company_info = $this->company_info;

		$this->load->library('googlemaps');

		$config['apiKey'] = "AIzaSyBl_Samz_aD6AfLYODq8b9EVfdyEQrP_gE";

		$config['zoom'] = "auto";

		$this->googlemaps->initialize($config);

		$marker = array();

		// $marker['position'] = "22.5554167,113.9137945";

		if(empty($company_info['company_lat'][0]->value) && empty($company_info['company_long'][0]->value) || !empty($company_info['company_lat'][0]->value) && empty($company_info['company_long'][0]->value) || empty($company_info['company_lat'][0]->value) && !empty($company_info['company_long'][0]->value)){

		  

		  $marker['position'] = $company_info['company_address'][0]->value;

		}else{

			$marker['position'] = $company_info['company_lat'][0]->value.','.$company_info['company_long'][0]->value;	

		}

		

		$this->googlemaps->sensor= false;

		$this->googlemaps->add_marker($marker);



		$data = array(

			'map' => $this->googlemaps->create_map(),

			'company_info'=>$company_info,

			'header' =>$this->load->view('frontend/header1',array('title'=>'Contact Us','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList(),),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		$this->load->view('frontend/contactus',$data);

	}



	public function subscribe(){

		$config['api_key']      = '5e9ee6510f77a711e007fcef31595b14-us10';

		$config['api_endpoint'] = 'https://<dc>.api.mailchimp.com/3.0/';

		$this->load->library('Mailchimp',$config);

		// $campaigns 	= $this->mailchimp->call('GET', 'campaigns', array('count' => 5, 'status' => 'sent'));94bd044360

		$result = $this->mailchimp->call('POST','lists/94bd044360/members', array(

			'email_address'             => $this->input->post('email_address'),

			'merge_fields'        => array('FNAME'=>'Davy', 'LNAME'=>'Jones'),

			'double_optin'      => false,

			'update_existing'   => true,

			'replace_interests' => false,

			'send_welcome'      => false,

			'status' => 'subscribed'

		));

		

		if(!empty($result['errors'])){

			echo json_encode(array('message'=>false));

		}else{

			echo json_encode(array('message'=>true));

		}

	}



	public function inquiry(){

        // Load PHPMailer library

        $this->load->library('phpmailer_library');



        // PHPMailer object

        $mail = $this->phpmailer_library->load();

		$name = $this->input->post('name');

		$email = $this->input->post('email');

		$subject = $this->input->post('subject');

		$message = $this->input->post('message');

        // SMTP configuration

        $mail->isSMTP();

        $mail->Host     = 'localhost';



        $mail->Port     = 25 ;



        $mail->setFrom('noreply@digimarinetec.com', 'Digimarine Admin');

        // $mail->addReplyTo('info@example.com', 'CodexWorld');



        // Add a recipient

        $mail->addAddress('info@digimarine.com');

     

        // Add cc or bcc 

        $mail->addCC('sales@digimarine.com');

        // $mail->addBCC('bcc@example.com');



        // Email subject

        $mail->Subject = $subject;



        // Set email format to HTML

        $mail->isHTML(true);



        // Email body content

        $mailContent = "<h1>Inquiry for Digimarinetec</h1>

            <p> Name:".$name."<br>Email:".$email."<br> Message:".$message."</p>";

        $mail->Body = $mailContent;



        // Send email

        if(!$mail->send()){

            $this->session->set_flashdata('error','Message could not be sent.');

            // echo 'Mailer Error: ' . $mail->ErrorInfo;

        }else{

			$this->session->set_flashdata('success','Message has been sent.');

		}

		

		return redirect('contact-us');

	}

	

	private function getProductHardware($category_name,$subcategory_name){

		

		$subcategory = $this->subcategory->displayList(array('slug_name'=>$subcategory_name));

		$products = $this->products->displayList(array('u.subcategory_id'=>$subcategory[0]->id_subcategories,'c.category'=>$category_name));

		// print '<pre>'.print_r($products,1).'</pre>';exit;

		$data = array(

			'page' => $products,

			'subcategory'=>$subcategory,

			'header' =>$this->load->view('frontend/header1',array('title'=> $products[0]->category.'-'.$subcategory_name,'company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		$this->load->view('frontend/products_inner',$data);

	}



	private function getNoSubcategory(){

	

		$product = $this->products->displayList(array('slug' =>$this->uri->segment(3)));

	

		$data = array(

			'page' => $product,

			'header' =>$this->load->view('frontend/header1',array('title'=>!empty($product) ?  $product[0]->category.' - '.$product[0]->title : '','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategory->displayList()),TRUE),

            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),

		);



		if(empty($product)){

			$this->getProductHardware($this->uri->segment(2),$this->uri->segment(3));

		}else{

			$this->load->view('frontend/products_inner',$data);

		}



		



	}



	public function preview(){

		$dataProducts = ['title' => 'test'];

		$data=$this->load->view('frontend/test',$dataProducts,TRUE);

		

		echo $data;

    }

}

