<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Api extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function news_get() {
        $data = array();
        $this->load->model('news_model');

        $news = $this->news_model->displayList();

        foreach($news as $n) {
            $data[] = array(
                'news_url'=>$n->news_url,
                'image_url'=>$n->image_url,
                'news_title'=>$n->news_title,
                'news_short_desc'=>$n->news_short_desc,
                'description'=>$n->description
            );
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function news_full_get() {
        $data = array();
        $this->load->model('news_model');
        $news = $this->news_model->displayList(array('url'=>$this->uri->segment(3)));
        foreach($news as $n) {
            $data[] = array(
                'news_url'=>$n->news_url,
                'image_url'=>$n->image_url,
                'news_title'=>$n->news_title,
                'news_short_desc'=>$n->news_short_desc,
                'description'=>$n->description
            );
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function programmes_get() {
        $data = array();
        $this->load->model('programmes_model');

        $programmes = $this->programmes_model->displayList();

        foreach($programmes as $n) {
            $data[] = array(
                'video_link'=>$n->video_link,
                'image_url'=>$n->image_url,
                'programme_title'=>$n->programme_title,
                'programme_short_desc'=>$n->programme_short_desc,
                'description'=>$n->description
            );
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function programmes_full_get() {
        $data = array();
        $this->load->model('programmes_model');

        $programmes = $this->programmes_model->displayList(array('url'=>$this->uri->segment(3)));

        foreach($programmes as $n) {
            $data[] = array(
                'url'=>$n->url,
                'video_link'=>$n->video_link,
                'image_url'=>$n->image_url,
                'programme_title'=>$n->programme_title,
                'programme_short_desc'=>$n->programme_short_desc,
                'description'=>$n->description
            );
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function pages_get() {
        $data=array();
        $this->load->model('pages_model');

        $pages = $this->pages_model->displayList(array('url'=>$this->uri->segment(3)));

        foreach($pages as $n) {
            $data[] = array(
                'url'=>$n->url,
                'page_title'=>$n->page_title,
                'page_content'=>$n->page_content,
            );
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function contactus_post() {
        $data = array();
        $data = $this->input->post();

        $this->db->insert('contact_us',$data);

    }

    public function auditions_get() {
        $data = array();
        $this->load->model('auditions_model');

        $programmes = $this->auditions_model->displayList();

        foreach($programmes as $n) {
            $data[] = array(
                'url'=>$n->url,
                'image_url'=>$n->image_url,
                'audition_name'=>$n->audition_name,
                'audition_description'=>$n->audition_description,
                'start_date'=>date("m-d-Y",strtotime($n->start_date)),
                'end_date'=>date("m-d-Y",strtotime($n->end_date))
            );
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function auditions_full_get() {
        $data=array();
        $this->load->model('auditions_model');

        $programmes = $this->auditions_model->displayList(array('url'=>$this->uri->segment(3)));

        foreach($programmes as $n) {
            $data[] = array(
                'url'=>$n->url,
                'image_url'=>$n->image_url,
                'audition_name'=>$n->audition_name,
                'audition_description'=>$n->audition_description,
                'start_date'=>date("m-d-Y",strtotime($n->start_date)),
                'end_date'=>date("m-d-Y",strtotime($n->end_date))
            );
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function competitions_get() {
        $data=array();

        $this->load->model('competitions_model');

        $programmes = $this->competitions_model->displayList();

        foreach($programmes as $n) {
            $data[] = array(
                'url'=>$n->url,
                'image_url'=>$n->image_url,
                'audition_name'=>$n->audition_name,
                'audition_description'=>$n->audition_description,
                'start_date'=>date("m-d-Y",strtotime($n->start_date)),
                'end_date'=>date("m-d-Y",strtotime($n->end_date))
            );
        }
        $this->response($programmes, REST_Controller::HTTP_OK);
    }

    public function competitions_full_get() {
        $data=array();
        $this->load->model('competitions_model');

        $programmes = $this->competitions_model->displayList(array('url'=>$this->uri->segment(3)));
        foreach($programmes as $n) {
            $data[] = array(
                'url'=>$n->url,
                'image_url'=>$n->image_url,
                'competition_name'=>$n->audition_name,
                'description'=>$n->description,
                'start_date'=>date("m-d-Y",strtotime($n->start_date)),
                'end_date'=>date("m-d-Y",strtotime($n->end_date))
            );
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function videos_get(){
        $data = array();
        $this->load->model('videos_model');
        $vids = $this->videos_model->displayList();
        foreach($vids as $n){
            $data[] = array(
                'name' => $n->video_name,
                'url' => $n->video_url
            );
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function magazines_get(){
        $data = array();
        $this->load->model('magazines_model');
        $this->load->model('magazinefiles_model');
        $vids = $this->magazines_model->displayList();
        foreach($vids as $n){
            $data[] = array(
                'name' => $n->magazine_name,
                'url' => $n->url,
                'cover' => $this->magazinefiles_model->displayList(array('magazine_id'=>$n->id_magazines,'is_cover'=>1))
            );

        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function magazine_full_get(){
        $data = array();
        $this->load->model('magazines_model');
        $this->load->model('magazinefiles_model');
        $magazines = $this->magazines_model->displayList(array('url'=>$this->uri->segment(3)));
        $magazine_files = $this->magazinefiles_model->displayList(array('magazine_id'=>$magazines[0]->id_magazines));

        $data = array(
            'id' => $magazines[0]->id_magazines,
            'name'=>$magazines[0]->magazine_name
        );

        foreach($magazine_files as $mf){
            $data['pages'][] = array(
                'image_url' => $mf->image_url,
                'image_cover' => $mf->is_cover,
                'order'=>$mf->image_order
            );
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

}
