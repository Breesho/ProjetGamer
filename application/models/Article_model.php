<?php

// application/models/Article_model.php

class Article_model extends CI_Model {

    function insert($data)
    {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }

    public function get_articles()
    {
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function get_article_detail($slug)
    {
        $query = $this->db->get_where('articles', array(
            'Article_Slug' => $slug
        ));

        return $query->row_array();
    }
}