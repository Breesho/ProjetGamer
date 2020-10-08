<?php

// application/controllers/Register.php

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function validation()
    {
        $this->form_validation->set_rules('User_UserName', 'Nom', 'required|trim');
        $this->form_validation->set_rules('User_Mail', 'Adresse mail', 'required|trim|valid_email|is_unique[user.User_Mail]');
        $this->form_validation->set_rules('User_Password', 'Mot de passe', 'required');

        if( $this->form_validation->run() ) {
            $verification_key = md5(rand());
            $encrypted_password = $this->encryption->encrypt($this->input->post('User_Password'));
            $data = array(
                'User_Mail'             => $this->input->post('User_Mail'),
                'User_Password'         => $encrypted_password,
                'User_UserName'         => $this->input->post('User_UserName'),
                'User_Verification_Key' => $verification_key,
                'ID_Role'               => 1
            );
            $id = $this->register_model->insert($data);
            if($id > 0) {
                $subject = "Merci de vérifier votre email pour vous connectez";
                $message = "
                <p>Bonjour ".$this->input->post('User_UserName')."</p>
                <p>Ceci est un email de vérification pour vous permettre de compléter votre inscription.
                Dans un premier temps vérifier votre adresse email en cliquant sur ce <a href=". base_url('register/verify_email/').$verification_key.">lien</a>.</p>
                <p>Une fois votre email vériffé vous pouvez vous connecter.</p>
                ";
                $config = array(
                    'protocol'          => 'smtp',
                    'smtp_host'         => 'ssl://smtp.gmail.com',
                    'smtp_port'         => 465,
                    'smtp_username'     => 'dangersimon76@gmail.com',
                    'smtp_pass'         => 'hackedbyxtac134679852',
                    'mailtype'          => 'html',
                    'charset'           => 'utf8',
                    'wordwrap'          => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('dangersimon76@gmail.com');
                $this->email->to( $this->input->post('User_Mail') );
                $this->email->subject($subject);
                $this->email->message($message);
                if( $this->email->send() ) {
                    $this->session->set_flashdata('message', 'Vous avez reçu un email de vérification');
                    redirect('register');
                } else {
                    $this->session->set_flashdata('message', 'Erreur');
                    redirect('register');
                }
            }
        } else {
            $this->index();
        }
    }

    function verify_email() 
    {
        if( $this->uri->segment(3) ) {
            $verification_key = $this->uri->segment(3);
            if( $this->register_model->verify_email($verification_key) ) {
                $data['message'] = '<h1 align="center">Votre email a bien été validé. Vous pouvez maintenant vous connecter <a href="'.base_url("login").'ici</a></h1>';
            } else {
                $data['message'] = '<h1 align="center">Lien invalide</h1>';
            }
        }
        $this->load->view('email_verification', $data);
    }
}