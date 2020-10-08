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

    function index() 
    {
        $this->load->view('login');
    }

    function validation()
    {
        $this->form_validation->set_rules('User_Mail', 'Adresse mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('User_Password', 'Mot de passe', 'required');

        if( $this->form_validation->run() ) {
            $result = $this->login_model->can_login($this->input->post('User_Mail'), $this->input->post('User_Password'));
            if( $result == '' ) {
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', $result);
                redirect('login');
            }
        } else {
            $this->index();
        }

    }
}