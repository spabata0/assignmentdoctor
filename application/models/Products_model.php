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
class Products_Model extends CI_Model
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
    public function displayList($where = array(), $order_by = array('id_products' => 'ASC'), $count = FALSE)
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

        return $this->db->get('products u')->result();
    }
    /*
     * SELECT
     *
     * @return      void
     */
    private function _select()
    {
        $this->db->select('u.*,c.*,s.*');
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
        $this->db->join('subcategories s', 's.id_subcategories = u.subcategory_id', 'left');
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
    private function _orderby($order_by = array('id_products' => 'ASC'))
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
    
    public function getFeaturedProducts(){
        $data = array();
        $hardware = "select u.*,c.* from products u left join categories c on c.id_categories = u.category where u.is_deleted=0 and u.is_publish = 1 and u.is_hf=1 and c.id_categories = 1 LIMIT 1 ";
        $software = "select u.*,c.* from products u left join categories c on c.id_categories = u.category where u.is_deleted=0 and u.is_publish = 1 and u.is_hf=1 and c.id_categories = 2 LIMIT 1";
        $solutions = "select u.*,c.* from products u left join categories c on c.id_categories = u.category where u.is_deleted=0 and u.is_publish = 1 and u.is_hf=1 and c.id_categories = 3 LIMIT 1";
        // 
        $solutions_query = $this->db->query($solutions)->result();
        if(count($solutions_query)){
            foreach($solutions_query as $objSolutions){
                $data[] = $objSolutions;
            }
        }

        
        $software_query = $this->db->query($software)->result();
        if(count($software_query)){
            foreach($software_query as $objSoftware){
                $data[] = $objSoftware;
            }
        }
       
        $hardware_query = $this->db->query($hardware)->result();
        if(count($hardware_query)){
            foreach($hardware_query as $objHardware){
                $data[] = $objHardware;
            }
        }
        
        // print '<pre>'.print_r($data,1).'</pre>';exit;
        

        return $data;
    }

    public function getProductCategory(){
        $data = array();
        $hardware = "select DISTINCT(u.subcategory_id),c.subcategory_name,c.slug_name,s.category FROM products u left join subcategories c on c.id_subcategories=u.subcategory_id left join categories s on s.id_categories = u.category where u.is_deleted=0 and u.is_publish = 1 and u.category = 1";
        $hardware_query = $this->db->query($hardware)->result();
        if(count($hardware_query)){
            foreach($hardware_query as $objHardwareSubcategory){
                $data[] = $objHardwareSubcategory;
            }
        }

        return $data;
    }

  
}

/* End of file user_model.php */
/* Location: ./application/modules_core/adminpanel/models/outlet/outlet_model.php */
