<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Banners extends CI_Controller {



    
    public function __construct() {

        parent::__construct();



        if (!isset($this->session->is_login) == TRUE) {

            redirect(base_url());

        }

        $this->load->model('login_model');

        $this->load->model('banners_model');

        $this->load->model('categories_model');

        $this->load->model('bManagement_model');

        $this->login = new Login_Model();

        $this->categories = new Categories_Model();

        $this->banners = new Banners_Model();

        $this->bm = new BManagement_Model();

        $this->id = $this->uri->segment(3);





    }



    public function index()

    {

        $data = array(

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

            'banners' => $this->bm->displayList(array('is_deleted'=>0))

      

        );

        $this->load->view('banner_management/index',$data);



    }



    public function add(){

        self::_validate();

        $data = array(

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

        );

        $this->load->view('banner_management/add',$data);

    }



    public function edit(){

        $banner_info = $this->banners->displayList(array('id_banners'=>$this->id));

        // print '<pre>'.print_R($banner_info,1).'</pre>';exit;

    

        self::_validate();

        $data = array(

            'banners' => $banner_info,

            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),

            'footer' => $this->load->view('template/footer_inner',array(),TRUE),

        );

        $this->load->view('banner_management/edit',$data);

    }



    public function delete() {

        $this->db->where('id_banners', $this->id);

        $this->db->update('banners', array("is_deleted"=>1));

        redirect('banners');

    }



    private function _validate() {

        $this->form_validation->set_rules('title','title','required|trim');

      

        if ($this->uri->segment(2) == 'add') {

            self::_addInfo();

        } else {

            self::_editInfo();



        }

    }



    private function _addInfo() {

        // $fcker = $this->input->post();

        // print '<pre>'.print_r($_FILES,1).'</pre>';

        // print '<pre>'.print_r($fcker,1).'</pre>';

        // exit;

        $arNewsImages = array();

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path']          = './assets/uploads/';

            $config['allowed_types']        = 'gif|jpg|png';

            // $config['max_size']             = 200;

            // $config['max_width']            = 1024;

            // $config['max_height']           = 768;



            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            $count = count($_FILES['banner_file']['name']);

    

            

            $data = array(

                'title' => $this->input->post('title'),

                'description'=>$this->input->post('description'),

                'is_show'=>$this->input->post('is_active'),

                'created_by'=>1,

                'created_at'=>date("Y-m-d H:i:s"),

                'updated_at'=>date("Y-m-d H:i:s"),

            );





            $this->db->insert('banners',$data);

            // insert banner

            $insert_id = $this->db->insert_id();

            for($i=0;$i<$count;$i++){   

                if(!empty($_FILES['banner_file']['name'][$i])){

                    $_FILES['file']['name'] = $_FILES['banner_file']['name'][$i];

                    $_FILES['file']['type'] = $_FILES['banner_file']['type'][$i];

                    $_FILES['file']['tmp_name'] = $_FILES['banner_file']['tmp_name'][$i];

                    $_FILES['file']['error'] = $_FILES['banner_file']['error'][$i];

                    $_FILES['file']['size'] = $_FILES['banner_file']['size'][$i];

        

                    $config['file_name'] = $_FILES['banner_file']['name'][$i];

                    $this->load->library('upload',$config); 

                    if($this->upload->do_upload('file')){

                        $uploadData = $this->upload->data();

                        $filename = $uploadData['file_name'];

                        $banner_title = $this->input->post('image_title');

                        $banner_description = $this->input->post('image_title');

                        $banner_link = $this->input->post('image_link');



                        $arNewsImages[] = array(

                            'banner_id' => $insert_id,

                            'image_name' => $filename,

                            'image_title' => $banner_title[$i],

                            'image_description' => $banner_description[$i],

                            'image_description' => $banner_link[$i],

                            'path'=> 'assets/uploads/'.$filename

                        );

                    }

                }

            }

            $this->db->insert_batch('banner_images',$arNewsImages);

            redirect('banners');

        }



    }



    private function _editInfo() {

        $existingImages = $this->banners->displayList(array('id_banners'=>$this->id));

        $arNewsImages = array();

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path']          = './assets/uploads/';

            $config['allowed_types']        = 'gif|jpg|png';

            // $config['max_size']             = 200;

            // $config['max_width']            = 1024;

            // $config['max_height']           = 768;



            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            $count = count($_FILES['banner_file']['name']);

    

            

            $data = array(

                'title' => $this->input->post('title'),

                'description'=>$this->input->post('description'),

                'is_show'=>$this->input->post('is_active'),

                'created_by'=>1,

                'created_at'=>date("Y-m-d H:i:s"),

                'updated_at'=>date("Y-m-d H:i:s"),

            );



            $this->db->where('id_banners', $this->id);

            $this->db->update('banners',$data);



            $t = $this->input->post('banner_image_id');

            $ctr = 0;

            if(isset($t) && count($t) > 0){

                $banner_title = $this->input->post('image_title');

                $banner_description = $this->input->post('image_description');

                $banner_link = $this->input->post('image_link');

                foreach($existingImages as $objExisting){

                    $arNewsImages[] = array(

                        'banner_id'=>$this->id,

                        'image_name' => $objExisting->image_name,

                        'image_title' => !empty($banner_title[$ctr]) ? $banner_title[$ctr] : $objExisting->image_title,

                        'image_description' => !empty($banner_description[$ctr]) ? $banner_description[$ctr]:$objExisting->image_description,

                        'image_link' => !empty($banner_link[$ctr]) ? $banner_link[$ctr]:$objExisting->image_link,

                        'path'=> $objExisting->path

                    );

                    // get ids 

                    $tt[] = $objExisting->id_banner_images;

                    $ctr++;

                }

                $result=array_diff($tt,$t);

                foreach($result as $key=>$val){

                    unset($arNewsImages[$key]);

                }

            }

           

            // insert banner

            for($i=0;$i<$count;$i++){   

                if(!empty($_FILES['banner_file']['name'][$i])){

                    $_FILES['file']['name'] = $_FILES['banner_file']['name'][$i];

                    $_FILES['file']['type'] = $_FILES['banner_file']['type'][$i];

                    $_FILES['file']['tmp_name'] = $_FILES['banner_file']['tmp_name'][$i];

                    $_FILES['file']['error'] = $_FILES['banner_file']['error'][$i];

                    $_FILES['file']['size'] = $_FILES['banner_file']['size'][$i];

        

                    $config['file_name'] = $_FILES['banner_file']['name'][$i];

                    $this->load->library('upload',$config); 

                    if($this->upload->do_upload('file')){

                        $uploadData = $this->upload->data();

                        $filename = $uploadData['file_name'];

                        $banner_title = $this->input->post('image_title');

                        $banner_description = $this->input->post('image_description');

                        $banner_link = $this->input->post('image_link');

                        $arNewsImages[] = array(

                            'banner_id' => $this->id,

                            'image_name' => $filename,

                            'image_title' => $banner_title[$i],

                            'image_description' => $banner_description[$i],

                            'image_link' => $banner_link[$i],

                            'path'=> 'assets/uploads/'.$filename

                        );

                    }

                }

            }



            // print '<pre>'.print_r($arNewsImages,1).'</pre>';exit;

            $this->db->where('banner_id',$this->id);

            $this->db->delete('banner_images');



            $this->db->insert_batch('banner_images',$arNewsImages);

            redirect('banners');

        }

    }

}

