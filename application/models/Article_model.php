<?php

// application/models/Article_model.php

class Article_model extends CI_Model {

    function insert($data)
    {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }
}