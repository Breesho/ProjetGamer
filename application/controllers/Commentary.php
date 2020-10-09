<?php

// application/controllers/Commentary.php

class Commentary extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('commentary_model');
        $this->load->helper('url');
    } 

    function index()
    {
        $data['commentary'] = $this->commentary_model->get_all_commentary();
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('commentary/index');
        $this->load->view('templates/footer', $data);
    }

    function add()
    {   
		$this->form_validation->set_rules('Commentary_Text','Commentary Text','required|max_length[5]');
		$this->form_validation->set_rules('ID_Article','ID Article','integer');
		$this->form_validation->set_rules('ID_User','ID User','required|integer');
		
		if($this->form_validation->run())     
        {   
            $data = array(
				'Commentary_Text'   => $this->input->post('Commentary_Text'),
				'ID_Article'        => $this->input->post('ID_Article'),
				'ID_User'           => $this->input->post('ID_User'),
            );
            
            $commentary_id = $this->commentary_model->add_commentary($data);
            
            if($commentary_id > 0) {
                redirect('article/detail/'.$this->input->post('Article_Slug'));
            }                
        } else {
            redirect('article/detail/'.$this->input->post('Article_Slug'));
        }

    }  

    function edit($ID_Commentary)
    {   
        // check if the commentary exists before trying to edit it
        $data['commentary'] = $this->commentary_model->get_commentary($ID_Commentary);
        
        if(isset($data['commentary']['ID_Commentary']))
        {
			$this->form_validation->set_rules('Commentary_Text','Commentary Text','required|max_length[5]');
			$this->form_validation->set_rules('ID_Article','ID Article','integer');
			$this->form_validation->set_rules('ID_User','ID User','required|integer');
		
			if($this->form_validation->run())     
            {   
                $data = array(
					'Commentary_Text' => $this->input->post('Commentary_Text'),
					'Commentary_CreateAt' => $this->input->post('Commentary_CreateAt'),
					'Commentary_UpdateAt' => $this->input->post('Commentary_UpdateAt'),
					'Commentary_DeleteAt' => $this->input->post('Commentary_DeleteAt'),
					'ID_Article' => $this->input->post('ID_Article'),
					'ID_User' => $this->input->post('ID_User'),
                );

                $this->commentary_model->update_commentary($ID_Commentary, $data);            
                redirect('commentary/index');
            }
            else
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('commentary/edit');
                $this->load->view('templates/footer', $data);
            }
        }
        else
            show_error('The commentary you are trying to edit does not exist.');
    } 

    function remove($ID_Commentary)
    {
        $commentary = $this->commentary_model->get_commentary($ID_Commentary);

        // check if the commentary exists before trying to delete it
        if(isset($commentary['ID_Commentary']))
        {
            $this->commentary_model->delete_commentary($ID_Commentary);
            redirect('commentary/index');
        }
        else
            show_error('The commentary you are trying to delete does not exist.');
    }
    
}
