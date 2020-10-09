<?php

// application/models/Login_model.php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user($ID_User)
    {
        return $this->db->get_where('user',array('ID_User'=>$ID_User))->row_array();
    }

    function get_all_user()
    {
        $this->db->order_by('ID_User', 'desc');
        return $this->db->get('user')->result_array();
    }

    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }

    function update_user($ID_User,$params)
    {
        $this->db->where('ID_User',$ID_User);
        return $this->db->update('user',$params);
    }

    function delete_user($ID_User)
    {
        return $this->db->delete('user',array('ID_User'=>$ID_User));
    }
}
