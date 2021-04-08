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

class Welcome_Model extends CI_Model

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

        public function process_order($data) {

            // Query to insert data in database
             $this->db->insert('members_orders', $data);
            
            if ($this->db->affected_rows() > 0) {
                return array('status'=>true, 'trans_id'=>$this->db->insert_id() );
            } else {
                return array('status'=>false, 'trans_id'=>0);;
            }        
           
        }

}



/* End of file user_model.php */

/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */
