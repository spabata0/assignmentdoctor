<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($this->session->is_login) == TRUE) {
            redirect(base_url());
        }
        $this->load->model('login_model');
        $this->load->model('news_model');
        $this->load->model('image_model');
        $this->login = new Login_Model();
        $this->news = new News_Model();
        $this->img = new Image_Model();

        $this->id = $this->uri->segment(3);


    }

    public function index()
    {
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
            'news' => $this->news->displayList()
        );
        $this->load->view('news/index',$data);

    }

    public function add(){
        self::_validate();
        $data = array(
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );
        $this->load->view('news/add',$data);
    }

    public function edit(){

        self::_validate();
        $newsImg = $this->img->displayList(array('post_id'=>$this->id));
        $data = array(
            'news' => $this->news->displayList(array('id_news'=>$this->id)),
            'news_image' => $newsImg,
            'header' =>$this->load->view('template/header_inner',array('username' => $this->session->userdata('fullname'),"id"=>$this->session->userdata('id'),),TRUE),
            'footer' => $this->load->view('template/footer_inner',array(),TRUE),
        );

        
        $this->load->view('news/edit',$data);
    }

    public function delete() {
        $this->db->where('id_news', $this->id);
            $this->db->update('news', array("is_deleted"=>1));
            redirect('news');
    }

    private function _validate() {
        $this->form_validation->set_rules('slug','url','required|trim');
        $this->form_validation->set_rules('news_title','title','required|trim');
        $this->form_validation->set_rules('description','description','required|trim');
        if ($this->uri->segment(2) == 'add') {
            self::_addInfo();
        } else {
            self::_editInfo();

        }
    }

    private function _addInfo() {
        
        if ($this->form_validation->run() == TRUE) {

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

            $count = count($_FILES['news_image']['name']);
    
            for($i=0;$i<$count;$i++){   
                if(!empty($_FILES['news_image']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['news_image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['news_image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['news_image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['news_image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['news_image']['size'][$i];
        
                    $config['file_name'] = $_FILES['news_image']['name'][$i];
                    $this->load->library('upload',$config); 
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
            
                        $arNewsImages[] = $filename;
                    }
                }
            }
            
            $data = array(
                'image_url' => $arData,
                'slug' => $this->input->post('slug'),
                'title' => $this->input->post('news_title'),
                'news_short_desc' => $this->input->post('news_short_desc'),
                'description'=>$this->input->post('description'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );

            $this->db->insert('news',$data);
            $lastID =  $this->db->insert_id();
            foreach($arNewsImages as $files){
                $newsImgData[] = array(
                    'post_id' => $lastID,
                    'type' => 'news',
                    'filename'=> 'assets/uploads/'.$files
                );
            }
            $this->db->insert_batch('images',$newsImgData);

            redirect('news');
        }

    }

    private function _editInfo() {
        $imgId = array();
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 200;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
          

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image_url')){
                $arData = $this->upload->data('file_name');
               
            }
            $newsImg = $this->img->displayList(array('post_id'=>$this->id));
            $newsImgdata = array();
            
            foreach($newsImgdata as $nid){
                $newsImgdata[] = $nid;
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image_url')){
                $arData = $this->upload->data('file_name');
                    // $this->load->view('upload_success', $data);
            }

            $count = count($_FILES['news_image']['name']);
            $existingImageID = !empty($this->input->post('image_id')) ? $this->input->post('image_id') : array();
            $existingImage= !empty($this->input->post('existing_image')) ? $this->input->post('existing_image') : array();
            for($i=0;$i<$count;$i++){   
                if(!empty($_FILES['news_image']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['news_image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['news_image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['news_image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['news_image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['news_image']['size'][$i];
        
                    $config['file_name'] = $_FILES['news_image']['name'][$i];
                    $this->load->library('upload',$config); 
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
            
                        $arNewsImages[] = array(
                            'file' => $filename,
                            'existing_image' => $existingImage[$i],
                            'existing_id' => $existingImageID[$i]
                        );
                    }
                }
            }
            

            $qImg = $newsImg = $this->img->displayList(array('post_id'=>$this->id));
            foreach($qImg as $qImgID){
                $newsImgDataId[] = $qImgID->id_images;
            }
           
            $ctr = 0;
            $e = array();
            if(!empty($arNewsImages)){
                foreach($arNewsImages as $imgKey => $imgVal){
                    if(!empty($arNewsImages[$ctr]['existing_id'])){
                        //do update
                        $e = array(
                            'filename' => 'assets/uploads/'.$arNewsImages[$ctr]['file']
                        );
                        $this->db->where('id_images', $arNewsImages[$ctr]['existing_id']);
                        $this->db->update('images', $e);
                       
                    }else{
                        $newsImgData[] = array(
                            'post_id' => $this->id,
                            'type' => 'news',
                            'filename'=> 'assets/uploads/'.$arNewsImages[$ctr]['file']
                        );     
                    }
                    $ctr++;
                }
                $this->db->insert_batch('images',$newsImgData);
            }
            
            $diffID = array_diff($newsImgDataId,$this->input->post('image_id'));
            foreach($diffID as $a => $b){
                $this->db->where('id_images', $b);
                $this->db->delete('images');
            }
           
            $data = array(
                'image_url' => $arData,
                'slug' => $this->input->post('slug'),
                'title' => $this->input->post('news_title'),
                'news_short_desc' => $this->input->post('news_short_desc'),
                'description'=>$this->input->post('description'),
                'is_active'=>$this->input->post('is_active'),
                'created_by'=>1,
                'date_created'=>date("Y-m-d H:i:s"),
            );


            $this->db->where('id_news', $this->id);
            $this->db->update('news', $data);
            redirect('news');
        }
    }
}
