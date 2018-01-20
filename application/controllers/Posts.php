<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{


  	public function __construct ()
  	{
    	parent::__construct();
		$this->load->model('post_model');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('comment_model');
		$this->load->library('pagination');
		$this->load->library('form_validation');

  	}

  	public function index ()
  	{
		$config['base_url'] = 'http://127.0.0.1:8000/page/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 20;
		$config['uri_segment'] = 2;
		$config['attributes'] = array('class' => 'pagination-link');
		$this->pagination->initialize($config);
		$data['title'] = "latest posts";
		$data['posts'] = $this->post_model->get_post(false , false);
		//print_r($this->session->userdata());
		$this->load->view('layouts/header');
		$this->load->view('posts/index' , $data);
		$this->load->view('layouts/footer');
	
	}

	public function view($slug , $id)
	{
		$data['post'] = $this->post_model->get_post($id , $slug);
		$this->load->view('layouts/header');
		$this->load->view('posts/view' , $data);
		$this->load->view('layouts/footer');

	}


		public function create()
	{
		if(!$this->session->user_level)
		{
			redirect('user/login');
		}

		$data['categories'] = $this->category_model->get_categories(); 
		$this->form_validation->set_rules('title' , "Title" , "required|min_length[10]|max_length[255]");
		$this->form_validation->set_rules('content' , "Content" , "required|min_length[200]");
		if($this->form_validation->run() == false )
		{

			$this->load->view('layouts/header');
			$this->load->view('posts/create' , $data);
			$this->load->view('layouts/footer');
		}
		else
		{
			$this->post_model->create_post();
			redirect('/');
		}


	}


}
