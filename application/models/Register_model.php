<?php

// application/models/Register_model.php

class Register_model extends CI_Model {
 
    function insert($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    function verify_email($key)
    {
        $this->db->where('User_Verification_Key', $key);
        $this->db->where('User_Is_Email_Verified', 0);
        $query = $this->db->get('user');
        if( $query->num_rows() > 0 ) {
            $data = array(
                'User_Is_Email_Verified' => 1,
            );
            $this->db->where('User_Verification_Key', $key);
            $this->db->update('user', $data);
        } else {
            return false;
        }

    }
}