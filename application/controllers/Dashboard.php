<?php

// application/controllers/Dashboard.php

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if( !$this->session->userdata('id'))
		{
			redirect('login');
		}
		if( $this->session->userdata('role') != 2 )
		{
			redirect('article');
		}
	}

	function index($page = 'home')
	{
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('pages/dashboard');
        $this->load->view('templates/footer', $data);
    }
}