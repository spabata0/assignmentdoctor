<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



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

	public function __construct(){

		parent::__construct();

		$this->load->model('programmes_model');

        

        $this->programmes = new Programmes_Model();

	}

	public function index()

	{

		$x=0;

		$programmes = $this->programmes->displayList();



		foreach($programmes	as $t) {

			if($x<4){

				$test[$x][]=array(

							"id_programmes"=>$t->id_programmes,

							"programme_name"=>$t->programme_title,

							"img_url"=>$t->image_url,

							"url"=>$t->url

						);

				$x++;				

			} 



			if($x==4){

				$x=0;

			}

			

		}

		// echo '<pre>';

		// print_r($test);

		// exit;

		$data = array(

			'programmes'=>$test,

            'header' =>$this->load->view('templates/header',array(),TRUE),

            'footer' => $this->load->view('templates/footer',array(),TRUE),

            

        );

        $this->load->view('Home/index',$data);

	}

}

