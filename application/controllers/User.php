<?php

// application/controllers/User.php
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

    function index()
    {
        $data['user'] = $this->User_model->get_all_user();
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('User_Mail','User Mail','required|max_length[255]');
		$this->form_validation->set_rules('User_Password','User Password','required|max_length[255]');
		$this->form_validation->set_rules('User_UserName','User UserName','required|max_length[255]');
		$this->form_validation->set_rules('User_Picture','User Picture','required|max_length[255]');
		$this->form_validation->set_rules('User_Verification_Key','User Verification Key','max_length[255]');
		$this->form_validation->set_rules('ID_Role','ID Role','required|integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'User_Is_Email_Verified' => $this->input->post('User_Is_Email_Verified'),
				'User_Mail' => $this->input->post('User_Mail'),
				'User_Password' => $this->input->post('User_Password'),
				'User_UserName' => $this->input->post('User_UserName'),
				'User_Picture' => $this->input->post('User_Picture'),
				'User_Verification_Key' => $this->input->post('User_Verification_Key'),
				'User_CreateAt' => $this->input->post('User_CreateAt'),
				'User_DeleteAt' => $this->input->post('User_DeleteAt'),
				'User_UpdateAt' => $this->input->post('User_UpdateAt'),
				'ID_Role' => $this->input->post('ID_Role'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        }
        else
        {            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($ID_User)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($ID_User);
        
        if(isset($data['user']['ID_User']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('User_Mail','User Mail','required|max_length[255]');
			$this->form_validation->set_rules('User_Password','User Password','required|max_length[255]');
			$this->form_validation->set_rules('User_UserName','User UserName','required|max_length[255]');
			$this->form_validation->set_rules('User_Picture','User Picture','required|max_length[255]');
			$this->form_validation->set_rules('User_Verification_Key','User Verification Key','max_length[255]');
			$this->form_validation->set_rules('ID_Role','ID Role','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'User_Is_Email_Verified' => $this->input->post('User_Is_Email_Verified'),
					'User_Mail' => $this->input->post('User_Mail'),
					'User_Password' => $this->input->post('User_Password'),
					'User_UserName' => $this->input->post('User_UserName'),
					'User_Picture' => $this->input->post('User_Picture'),
					'User_Verification_Key' => $this->input->post('User_Verification_Key'),
					'User_CreateAt' => $this->input->post('User_CreateAt'),
					'User_DeleteAt' => $this->input->post('User_DeleteAt'),
					'User_UpdateAt' => $this->input->post('User_UpdateAt'),
					'ID_Role' => $this->input->post('ID_Role'),
                );

                $this->User_model->update_user($ID_User,$params);            
                redirect('user/index');
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    function remove($ID_User)
    {
        $user = $this->User_model->get_user($ID_User);

        // check if the user exists before trying to delete it
        if(isset($user['ID_User']))
        {
            $this->User_model->delete_user($ID_User);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}
