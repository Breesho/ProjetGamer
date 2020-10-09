<?php

// application/controllers/Login.php

class Login extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_model');
        $this->load->helper('url');
    }

    function index($page = 'home') 
    {$data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('login');
        $this->load->view('templates/footer', $data);
    }

    function validation()
    {
        $this->form_validation->set_rules('User_Mail', 'Adresse mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('User_Password', 'Mot de passe', 'required');

        if( $this->form_validation->run() ) {
            $result = $this->login_model->can_login($this->input->post('User_Mail'), $this->input->post('User_Password'));
            if( $result == '' ) {
                redirect('article/list');
            } else {
                $this->session->set_flashdata('message', $result);
                redirect('login');
            }
        } else {
            $this->index();
        }
    }

    function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		redirect('article/list');
	}
}