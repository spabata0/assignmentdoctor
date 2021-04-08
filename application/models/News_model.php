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
class News_Model extends CI_Model
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
    public function displayList($where = array(), $order_by = array('id_news' => 'ASC'), $count = FALSE)
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

        return $this->db->get('news u')->result();
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
    private function _orderby($order_by = array('id_news' => 'ASC'))
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

    public function getLatestNews(){
        $data = [];
        $news = "select * from news where is_active = 1 ORDER by date_created DESC LIMIT 2";
        $news_query = $this->db->query($news)->result();
        if(!empty($news_query)){
            foreach($news_query as $objNews){
                $data[] = $objNews;
            }
        }
        return $data;
    }
}

/* End of file user_model.php */
/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */
