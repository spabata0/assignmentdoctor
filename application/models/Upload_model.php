<?php if ( !  defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Outlet Model Class
|--------------------------------------------------------------------------
|
| Handles the outlet table on the DB
|
| @category Model
| @author       Kenneth Bahia
*/
class User_Model extends CI_Model
{


    // ------------------------------------------------------------------------

    /*
     * Constructor
     *
     * Called automatically
     * Inherits method from the parent class
     */
    public function __construct($id = '')
    {
        parent::__construct($id);
    }

    // --------------------------------------------------------------------

    /*
     * Display user list
     *
     * @access  public
     * @param   mixed
     * @param   array
     * @return      object
     */
    public function upload($where = array(), $order_by = array('id_accounts' => 'ASC'), $count = FALSE)
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image_url'))
        {
                $error = array('error' => $this->upload->display_errors());
                echo '<pre>';
                print_r($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                echo '<pre>';
                print_r($data);
                // $this->load->view('upload_success', $data);
        }
    }

}

/* End of file user_model.php */
/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */
