<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{


  	public function __construct ()
  	{
    	parent::__construct();
    	$this->load->model('post_model');
  	}

  	public function index ()
  	{
		echo url_title("HGFi there mt_098() fgfgf is moody" , '-' , true);
	}

}
