<?php

// application/controllers/Article.php

class Article extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('article_model');
        $this->load->model('commentary_model');
        $this->load->helper('url');
    }

    public function index($page = 'home')
    {
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['articles_item'] = $this->article_model->get_articles();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('article/list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create($page = 'home')
    {
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('article/create');
        $this->load->view('templates/footer', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('Article_Title', 'Titre', 'required');
        $this->form_validation->set_rules('Article_Descritption', 'Description', 'required');
        $this->form_validation->set_rules('Article_Picture', 'Image', 'required');
        $this->form_validation->set_rules('Article_Score', 'Score', 'required');

        if( $this->form_validation->run() ) {
            $slug = rand();
            $data = array(
                'Article_Title'         => $this->input->post('Article_Title'),
                'Article_Descritption'  => $this->input->post('Article_Descritption'),
                'Article_Picture'       => $this->input->post('Article_Picture'),
                'Article_Score'         => $this->input->post('Article_Score'),
                'Article_Slug'          => $slug,
                'ID_Categorie'          => $this->input->post('ID_Categorie'),
            );
            $id = $this->article_model->insert($data);
            if( $id > 0 ) {
                redirect('dashboard');
            }
        } else {
            $this->create();
        }
    }

    public function detail($slug, $page = 'home')
    {
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['articles_item'] = $this->article_model->get_article_detail($slug);
        $data['commentaries'] = $this->commentary_model->get_all_commentary($data['articles_item']['ID_Article']);

        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('article/detail', $data);
        $this->load->view('templates/footer', $data);        
    }

    function edit($slug)
    {   
        // check if the article exists before trying to edit it
        $data['article'] = $this->article_model->get_article_detail($slug);
        
        if(isset($data['article']['Article_Slug']))
        {
			$this->form_validation->set_rules('Article_Title','Article Title','required|max_length[255]');
			$this->form_validation->set_rules('Article_Picture','Article Picture','required|max_length[255]');
			$this->form_validation->set_rules('Article_Score','Article Score','integer');
			$this->form_validation->set_rules('ID_Categorie','ID Categorie','required|integer');
			$this->form_validation->set_rules('Article_Descritption','Article Description','required');
		
			if($this->form_validation->run()) {   
                $data = array(
					'Article_Title'         => $this->input->post('Article_Title'),
					'Article_Picture'       => $this->input->post('Article_Picture'),
					'Article_Score'         => $this->input->post('Article_Score'),
					'Article_Slug'          => $slug,
					'ID_Categorie'          => $this->input->post('ID_Categorie'),
					'Article_Descritption'  => $this->input->post('Article_Descritption'),
                );

                $this->article_model->update_article($slug, $data);            
                redirect('article/list');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('article/edit', $data);
                $this->load->view('templates/footer', $data);     
            }
        } else {
            show_error('The article you are trying to edit does not exist.');
        }
    }

    function remove($slug)
    {
        $article = $this->article_model->get_article_detail($slug);

        // check if the article exists before trying to delete it
        if(isset($article['Article_Slug'])) {
            $this->article_model->delete_article($slug);
            redirect('article/list');
        } else {
            show_error('The article you are trying to delete does not exist.');
        }        
    }
}