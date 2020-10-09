<?php

// application/models/Commentary_model.php

class Commentary_model extends CI_Model
{

    function get_commentary($ID_Commentary)
    {
        return $this->db->get_where('commentary',array('ID_Commentary'=>$ID_Commentary))->row_array();
    }

    function get_all_commentary_count()
    {
        $this->db->from('commentary');
        return $this->db->count_all_results();
    }

    function get_all_commentary($ID_Article)
    {
        $this->db->get_where('commentary', array(
            'ID_Article' => $ID_Article
        ));
        //$this->db->order_by('ID_Commentary', 'desc');
        return $this->db->get('commentary')->result_array();
    }

    function add_commentary($data)
    {
        $this->db->insert('commentary', $data);
        return $this->db->insert_id();
    }

    function update_commentary($ID_Commentary,$params)
    {
        $this->db->where('ID_Commentary',$ID_Commentary);
        return $this->db->update('commentary',$params);
    }

    function delete_commentary($ID_Commentary)
    {
        return $this->db->delete('commentary',array('ID_Commentary'=>$ID_Commentary));
    }
}
