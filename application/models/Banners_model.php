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
class Banners_Model extends CI_Model
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
    public function displayList($where = array(), $order_by = array('id_banners' => 'ASC'), $count = FALSE)
    {
        // SELECT
        self::_select();

        // JOIN
        self::_join();

        // WHERE
        self::_where($where);

        // ORDER BY
        self::_orderby($order_by);
        

        // return count immediately
        // if ($count)
        //     return count(parent::get('accounts u'));

        return $this->db->get('banners u')->result();
    }
    /*
     * SELECT
     *
     * @return      void
     */
    private function _select()
    {
        $this->db->select('u.*,a.*');
    }

    // --------------------------------------------------------------------

    /*
     * JOIN
     *
     * @return      void
     */
    private function _join()
    {
        $this->db->join('banner_images a', 'a.banner_id = u.id_banners', 'left');
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
    private function _orderby($order_by = array('id_banners' => 'ASC'))
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

    private function _limitResult($limit){
        $this->db->limit($limit);
    }

    public function getLatestBanner(){
        $data = [];
        $sqlBannerInfo = "select * from banners where is_show = 1 ORDER by created_at DESC LIMIT 1";
        $sbi = $this->db->query($sqlBannerInfo)->result();

        if(count($sbi)){
            foreach($sbi as $sbis){
                $sqlBannerImage = "select * from banner_images where banner_id =".$sbis->id_banners;
                $resultBannerImage = $this->db->query($sqlBannerImage)->result();
                if(count($resultBannerImage)){
                    foreach($resultBannerImage as $ob){
                        $data[] = $ob;
                    }
                }
            }
        }

        return $data;
    }

  
}

/* End of file user_model.php */
/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */
