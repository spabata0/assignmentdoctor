<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('products_model');
        $this->load->model('categories_model');
        $this->load->model('subcategory_model');
        $this->load->model('settings_model');

        $this->products = new Products_Model();
        $this->categories = new Categories_Model();
        $this->subcategories = new Subcategory_Model();
        $this->settings = new Settings_Model();

        $this->company_info = array(
            'logo'=> $this->settings->displayList(array('item'=>'company_logo')),
            'company_name' => $this->settings->displayList(array('item'=>'company_name')),
            'company_address' => $this->settings->displayList(array('item'=>'company_address')),
        );
        $this->footer_data =  array(
            'category'=>$this->categories->displayList(),
            'logo'=> $this->settings->displayList(array('item'=>'company_logo')),
            'company_name' => $this->settings->displayList(array('item'=>'company_name')),
            'company_address' => $this->settings->displayList(array('item'=>'company_address')),
        );
        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        // print '<pre>'.print_r($this->products->displayList(),1).'</pre>';exit;
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'products' => $this->products->displayList(array('u.is_deleted'=>0))
        );

        $this->load->view('products/index',$data);

    }

    public function add(){
       
        self::_validate();
        $data = array(
            'categories' => $this->categories->displayList(),
            'subcategories'=> $this->subcategories->displayList(array('category_id'=>1)),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('products/add',$data);
    }

    public function edit(){
        $products = $this->products->displayList(array('id_products'=>$this->id));
        // print '<pre>'.print_r($products,1).'</pre>';exit;
        self::_validate();
        $data = array(
            'products' => $products,
            'categories' => $this->categories->displayList(),
            'subcategories'=> $this->subcategories->displayList(array('category_id'=>1)),
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('products/edit',$data);
    }

    public function delete() {
         $this->db->where('id_products', $this->id);
            $this->db->update('products', array("is_deleted"=>1));
            redirect('products');
    }

    private function _validate() {
        $this->form_validation->set_rules('title','title','required|trim');
        // $this->form_validation->set_rules('password','password','required|trim');

        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {
        $arData = "";
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 200;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_url')){
            
            $arData = $this->upload->data('file_name');
                // $this->load->view('upload_success', $data);
        }

        if ($this->upload->do_upload('featured_image_url')){
            $featureImg = $this->upload->data('file_name');
        }
    
        if ($this->form_validation->run() == TRUE) {
            $subname = "";
            $url = $this->input->post('slug');
           
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $url,
                'category' => $this->input->post('category'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'video_url'=>$this->input->post('video_url'),
                'meta_desc'=>$this->input->post('news_short_desc'),
                'long_desc'=>$this->input->post('description'),
                'is_publish'=>$this->input->post('is_active'),
                'is_hf'=>$this->input->post('is_hf'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );

            if(!empty($arData)){
                $data['image'] = $arData;
            }

            if(!empty($featureImg)){
                $data['featured_image_url'] = $featureImg;
            }

            $this->db->insert('products',$data);
            redirect('products');
        }

    }

    private function _editInfo() {
        $arData ="";
        $featureImg = "";
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 200;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_url')){
            $arData = $this->upload->data('file_name');
                // $this->load->view('upload_success', $data);
        }

        if ($this->upload->do_upload('featured_image_url')){
            $featureImg = $this->upload->data('file_name');
        }
     
        if ($this->form_validation->run() == TRUE) {
            $subname = "";
            $url = $this->input->post('slug');
           

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $url,
                'category' => $this->input->post('category'),
                'subcategory_id' => $this->input->post('subcategory_id'),
                'video_url'=>$this->input->post('video_url'),
                'meta_desc'=>$this->input->post('news_short_desc'),
                'long_desc'=>$this->input->post('description'),
                'is_publish'=>$this->input->post('is_active'),
                'is_hf'=>($this->input->post('is_hf') == 'on') ? 1:0,
                'updated_by'=>1,
                'updated_at'=>date("Y-m-d H:i:s"),
            );

            if(!empty($arData)){
                $data['image'] = $arData;
            }
            if(!empty($featureImg)){
                $data['featured_image_url'] = $featureImg;
            }

                $this->db->where('id_products', $this->id);
                $this->db->update('products', $data);
                redirect('products');

        }
    }


    public function preview(){
        $pData = array();
        $previewData[] = (object) $this->input->post();
        $previewData[0]->long_desc = $this->input->post('description');

        $category = $this->categories->displayList(array('id_categories'=>$previewData[0]->category));

        $pData = array(
            'page' => $previewData,
            'header' =>$this->load->view('frontend/header1',array('title'=>!empty($category) ?  $category[0]->category.' - '.$previewData[0]->title : '','company_info'=>$this->company_info,'product_hardware' => $this->products->getProductCategory(),'product_software' => $this->products->displayList(array('c.id_categories'=> 2,'u.is_publish'=>1,'u.is_deleted'=>0)),'product_solutions' => $this->products->displayList(array('c.id_categories'=> 3,'u.is_publish'=>1,'u.is_deleted'=>0)),'subcategory'=> $this->subcategories->displayList()),TRUE),
            'footer' => $this->load->view('frontend/footer',$this->footer_data,TRUE),
        );

        // print_r($pData);exit;

        $this->load->view('frontend/product_preview',$pData);
    }

 
}
