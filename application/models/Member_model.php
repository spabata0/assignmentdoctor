<?php

Class Member_Model extends CI_Model {

// Insert registration data in database
public function register_member($data) {

// Query to check whether username already exist or not
    $condition = "username =" . "'" . $data['username'] . "'";

    $security_hash = md5($data['email']);

    $data['security_hash'] = $security_hash;

    $this->db->select('*');

    $this->db->from('members');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

        if ($query->num_rows() == 0) {
            // Query to insert data in database
            $this->db->insert('members', $data);

            if ($this->db->affected_rows() > 0) {
             return true;
            }
        } else {
            return false;
        }        
}

public function check_member_hash($hash) {

    $condition = "security_hash =" . "'" . $hash . "'";

    $this->db->select('*');

    $this->db->from('members');
    $this->db->where($condition);
    $this->db->limit(1);

    $query = $this->db->get();

    if (!$query->num_rows() == 0) {
         return true;
    } else {
        return false;
    }      

}

public function activate_member($id) {
    $this->db->set('is_active', "1", FALSE);
    $this->db->where('id', $id);
    $this->db->update('members');
}


// Read data using username and password
public function login($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";

        $this->db->select('*');
        $this->db->from('members');
        $this->db->where($condition);
        $this->db->limit(1);

        $query = $this->db->get();
        

        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data = array(
                'id' => $row->id,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'email' => $row->email,
                'username' => $row->username
            );

            $this->session->userdata['logged_in'] = $data;

            $data['status'] = true;
            $data['message'] = "Successful Login.";
            return $data;
        } else {
            $data['status'] = false;
            $data['message'] = "Invalid Username/Password";
            return $data;
        }
}

public function login_email($email) {

    $condition = "email =" . "'" . $email . "'";

    $this->db->select('*');
    $this->db->from('members');
    $this->db->where($condition);
    $this->db->limit(1);

    $query = $this->db->get();
    

    if ($query->num_rows() == 1) {
        $row = $query->row();

        $data = array(
            'id' => $row->id,
            'firstname' => $row->firstname,
            'lastname' => $row->lastname,
            'email' => $row->email,
            'username' => $row->username
        );

        $this->session->userdata['logged_in'] = $data;

        $data['status'] = true;
        $data['message'] = "Successful Login.";
        return $data;
    } else {
        $data['status'] = false;
        $data['message'] = "Invalid Username/Password";
        return $data;
    }
} 

// Read data from database to show data in admin page
public function get_member_orders($member_id) {

        $condition = "member_id =" . "'" . $member_id . "'";

        $this->db->select('*');
        $this->db->from('members_orders');
        $this->db->where($condition);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) {
            return $query;
        } else {
            return false;
        }
}


public function get_member_details($member_id) {

    $condition = "id =" . "'" . $member_id . "'";

    $this->db->select('*');
    $this->db->from('members');
    $this->db->where($condition);

    $query = $this->db->get();

    if ($query->num_rows() > 0 ) {
        return $query;
    } else {
        return false;
    }
}

public function member_exist($username) {

    $condition = "username =" . "'" . $username . "'";

    $this->db->from('members');
    $this->db->where($condition);

    $query = $this->db->get();

    if ($query->num_rows() > 0 ) {
        return true;
    } else {
        return false;
    }
}


public function get_all_orders() {

    $this->db->select('mo.id, m.firstname, m.lastname, ot.order_name, mo.no_of_pages, ul.urgency, mo.price, mo.status, mo.paid_date')
             ->from('members_orders mo')
             ->join('order_type ot','mo.order_name = ot.id')
             ->join('urgency_level ul','mo.urgency_level = ul.id')
             ->join('members m','mo.member_id = m.id')
             ->order_by("mo.id",'DESC');

    $query = $this->db->get();
    
    if ($query->num_rows() > 0 ) {
        return $query;
    } else {
        return false;
    }
}

public function search_orders( $key) {

    /*
    if($field == 'id') {
        $condition = "mo.id=" . "'" . $key . "'";
    } elseif($field == 'name') {
    */
        $condition = "m.firstname=" . "'" . $key . "' OR m.lastname='" .  $key . "' OR mo.id='" . $key . "'"; 
    //} 

    $this->db->select('mo.id, m.firstname, m.lastname, ot.order_name, mo.no_of_pages, ul.urgency, mo.price, mo.status, mo.paid_date')
             ->from('members_orders mo')
             ->join('order_type ot','mo.order_name = ot.id')
             ->join('urgency_level ul','mo.urgency_level = ul.id')
             ->join('members m','mo.member_id = m.id')
             ->order_by("mo.id",'DESC')
             ->where($condition);

    $query = $this->db->get();
    
    if ($query->num_rows() > 0 ) {
        return $query;
    } else {
        return false;
    }
}

public function get_orders_status($member_id) {

    /*
    SELECT mo.id, ot.order_name, ul.urgency, DATEDIFF(mo.paid_date,now()) as elapse_date 
    FROM members_orders mo 
    LEFT JOIN order_type ot ON mo.order_name = ot.id 
    LEFT JOIN urgency_level ul ON mo.urgency_level = ul.id 
    WHERE mo.status = 1 AND mo.member_id = 1
    */

    $condition = "mo.status =1 and member_id=" . "'" . $member_id . "'";

    $this->db->select('mo.id, ot.order_name, ul.urgency, DATEDIFF(mo.paid_date,now()) as elapse_days, ul.max_days, mo.output_file')
             ->from('members_orders mo')
             ->join('order_type ot', 'mo.order_name = ot.id')
             ->join('urgency_level ul', 'mo.urgency_level = ul.id')
             ->order_by("mo.id",'DESC')
             ->where($condition);

    $query = $this->db->get();

    if ($query->num_rows() > 0 ) {
        return $query->result();
    } else {
        return false;
    }
}

public function get_orders($member_id) {

    $condition = "member_id =" . "'" . $member_id . "'";

    $this->db->select('mo.id, ot.order_name, mo.no_of_pages, ul.urgency, mo.price, mo.status ')
             ->from('members_orders mo')
             ->join('order_type ot','mo.order_name = ot.id')
             ->join('urgency_level ul','mo.urgency_level = ul.id')
             ->order_by("mo.id",'DESC')
             ->where($condition);

    $query = $this->db->get();
    
    if ($query->num_rows() > 0 ) {
        return $query;
    } else {
        return false;
    }


}

public function get_paid_order($session_id) {

    $condition = "stripe_session_id =" . "'" . $session_id . "'";

    $this->db->select('mo.id, ot.order_name, mo.no_of_pages, ul.urgency, mo.price, mo.status ')
             ->from('members_orders mo')
             ->join('order_type ot','mo.order_name = ot.id')
             ->join('urgency_level ul','mo.urgency_level = ul.id')
             ->where($condition);

    $query = $this->db->get();
    
    if ($query->num_rows() > 0 ) {
        return $query->result();
    } else {
        return false;
    }
}

public function save_revision($rev_details) {

    $this->db->insert('revision', $rev_details);

}

public function get_revisions($oid) {

    $condition = "order_id=" . "'" . $oid . "'";

    $this->db->select('*')
    ->from('revision')
    ->where($condition);

    $result = $this->db->get();

    return $result;

}

public function save_trans_details($trans_id, $sess) {

    $date = date('Y-m-d H:i:s');

    $condition = "id=" . "'" . $trans_id . "'";

    $this->db->set('stripe_session_id', $sess);
    $this->db->set('paid_date', $date);
    $this->db->set('status', 1);
    $this->db->where($condition);
    $this->db->update('members_orders');

}

public function update_output($order_id, $filename) {

    $condition = "id=" . "'" . $order_id . "'";

    $this->db->set('output_file', $filename);
    $this->db->where($condition);
    $this->db->update('members_orders');

}

public function get_output_file($id) {

    $condition = "id =" . "'" . $id . "'";

    $this->db->select('output_file')
             ->from('members_orders')
             ->where($condition);

    $query = $this->db->get();
    
    if ($query->num_rows() > 0 ) {
        return $query->result();
    } else {
        return false;
    }
}

public function check_securityhash($email) {

    $condition = "email =" . "'" . $email . "'";

    $this->db->from('members');
    $this->db->where($condition);

    $query = $this->db->get();

    $details = $query->result();

    if($details[0]->security_hash === md5($email)) {
        return true;
    } else {
        return false;
    }
}

public function update_member_details($details, $id) {

    $this->db->set('firstname', "'" . $details['firstname'] . "'", FALSE);
    $this->db->set('lastname', "'" . $details['lastname'] . "'", FALSE);
    $this->db->set('email', "'" . $details['email'] . "'", FALSE);
    $this->db->set('address', "'" . $details['address'] . "'", FALSE);
    $this->db->set('city', "'" . $details['city'] . "'", FALSE);
    $this->db->set('country', "'" . $details['country'] . "'", FALSE);
    $this->db->set('phone_no', "'" . $details['phone_no'] . "'", FALSE);
    $this->db->where('id', $id);

    $this->db->update('members');

}

}

?>