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

  	}

  	public function index ()
  	{
		$this->category_model->approve_category('4');
	}

}
