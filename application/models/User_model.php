<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{
    
    
    
    public function __construct()
    {
        $this->load->database();
    }


    public function is_admin($user_id)
    {
        $this->db->where('user_id' , $user_id);
        $query = $this->db->get('users');
        $result = $query->result();
        if($result->user_level == 'admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    
    
    public function register()
    {
        $email = strtolower($this->input->post('email'));
        $pass = password_hash($this->input->post('password') , PASSWORD_DEFAULT );
        $userName = $this->random_username($email);
        $data = [
            'name' => $this->input->post('name'),
            'email' => $email,
            'username' => $userName,
            'password' => $pass
        ];

        return $this->db->insert('users' , $data);
    }



    public function login_with_username ()
    {
        $username = $this->input->post('login');
        $query = $this->db->get_where('users' , ['username' => $username] );

        if($query -> num_rows() == 1 )
        {
           $row = $query->row();
           $password = $row->password;
           if(password_verify($this->input->post('password') , $password ))
           {
               if( $this->is_admin($row->user_id) )
               {
                    $this->session->user_level = 'admin';
                    return true;
               }
               else
               {
                    $this->session->user_level = 'user';
                    return true;
               }
                   
           }
           else
           {
               return false;
           }
        }
        else
        {
            return false;
        }
    }



    public function login_with_email ($email , $passwordin)
    {
        $query = $this->db->get_where('users' , ['email' => $email] );

        if($query->num_rows() == 1 )
        {
           $row = $query->row_array();
           $password = $row['password'];
           if(password_verify($passwordin , $password ))
           {
                
                return $row;
            
           }
           else
           {
               return false;
           }
        }
        else
        {
            return false;
        }

    }


    public function get_user_name($id)
    {
        $query = $this->db->get_where('users' , ['user_id' => $id]);
        $result = $query->row();
        return $result->name;
    }


    public function random_username($email) 
    {
        $name = strstr($email , "@" , true);
        $randNum = random_int(0 , 100);
        $userName = url_title($name.' '.$randNum , '-' , true);
        $query = $this->db->get_where('users' , array('username' => $userName ) );
        if($query->num_rows() > 0)
        {
            return $this->random_username($email);
        }
        else
        {
            return $userName;
        }
    }


}