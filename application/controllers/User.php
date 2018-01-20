<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->helper('cookie');

    }

    public function logout ()
    {
        $_SESSION = array();
        set_cookie(session_name() , "" , time()-3600 , "" , "/" , false , true);
        $this->session->sess_destroy();
        $this->load->view('layouts/header');
    	$this->load->view('users/login');
	    $this->load->view('layouts/footer');


    }

    public function register ()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

        if($this->form_validation->run() == false )
        {
            $this->load->view('layouts/header');
    		$this->load->view('users/register');
	    	$this->load->view('layouts/footer');

        }
        else
        {

            $this->user_model->register();
            $this->session->set_flashdata('login_success' , "Success , You may now log in");
            redirect('user/login');

        }

    }


    public function login ()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false )
        {
            $this->load->view('layouts/header');
    		$this->load->view('users/login');
	    	$this->load->view('layouts/footer');

        }
        else
        {
            $email = $this->input->post('email');
				// Get and encrypt the password
			$password = $this->input->post('password');
            if($this->user_model->login_with_email($email , $password)){
            $result = $this->user_model->login_with_email($email , $password);
            $this->session->set_userdata($result);
            unset($this->session->password);
            
            redirect('posts/index');
            }else{
                $this->session->set_flashdata('error_logging' , 'email or password is wrong');
                redirect('user/login');
            }
        }
    }



    public function edit ()
    {
        
    }



    public function getusers ()
    {
        
    }

    public function deleteuser ()
    {
        
    }



}
