<?php

class Listener extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('frontend/my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function paypal() 
    {
        print_r($_POST);
    }

}

?>