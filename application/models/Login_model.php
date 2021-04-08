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

class Login_Model extends CI_Model

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

    public function displayList($where = array(), $order_by = array('id_accounts' => 'ASC'), $count = FALSE)

    {

        // SELECT
        //print_r($where);

        $this->_select();



        // JOIN

        // self::_join();



        // WHERE

        $this->_where($where);



        // ORDER BY

        $this->_orderby($order_by);



        // return count immediately

        // if ($count)

        //     return count(parent::get('accounts u'));

        $x = $this->db->get('accounts');


        return $x;

    }

    /*

     * SELECT

     *
s
     * @return      void

     */

    private function _select()

    {

        $this->db->select('accounts.*');

    }



    // --------------------------------------------------------------------



    /*

     * JOIN

     *

     * @return      void

     */

    private function _join()

    {

        $this->db->join('', '', 'left');

    }



    // --------------------------------------------------------------------



    /*

     * WHERE

     *

     * @return      void

     */

    private function _where($where)

    {

        $this->db->where($where);

    }



    // --------------------------------------------------------------------



    /*

     * ORDER BY

     *

     * @return      void

     */

    private function _orderby($order_by = array('id_accounts' => 'ASC'))

    {

        if ( ! empty($order_by))

        {

            foreach($order_by as $field => $direction)

                $this->db->order_by($field, $direction);

        }

    }



    // --------------------------------------------------------------------



    /*

     * LIMIT - OFFSET

     *

     * @return      void

     */

    private function _limit($limit, $offset)

    {

        if ($offset > 0)

        {

            $offset = ($offset * $limit) - $limit;

            $this->db->limit($limit, $offset);

        }

    }

}



/* End of file user_model.php */

/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */

