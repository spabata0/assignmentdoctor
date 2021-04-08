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
class Categories_Model extends CI_Model
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
    public function displayList($where = array(), $order_by = array('id_categories' => 'ASC'), $count = FALSE)
    {
        // SELECT
        self::_select();

        // JOIN
        // self::_join();

        // WHERE
        self::_where($where);

        // ORDER BY
        self::_orderby($order_by);

        // return count immediately
        // if ($count)
        //     return count(parent::get('accounts u'));

        return $this->db->get('categories u')->result();
    }
    /*
     * SELECT
     *
     * @return      void
     */
    private function _select()
    {
        $this->db->select('u.*');
    }

    // --------------------------------------------------------------------

    /*
     * JOIN
     *
     * @return      void
     */
    private function _join()
    {
        $this->db->join('categories c', 'c.id_categories = u.category', 'left');
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
    private function _orderby($order_by = array('id_categories' => 'ASC'))
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
