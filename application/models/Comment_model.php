<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Comment_model extends CI_Model
{
    
    public function __construct()
    {
        $this->load->database();
    }


    public function create_comment()
    {
        
        $data = [
            'user_id' => $this->input->post('user_id'),
            'post_id' => $this->input->post('post_id'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'content' => $this->input->post('content')
        ];

        return $this->db->insert('comments' , $data);
        
    }



    public function get_comments($post_id)
    {
        $this->db->where('post_id' , $post_id);
        $query = $this->db->get('comments');
        return $query->result();
    }


    public function delete_comment($comment_id)
    {
        $this->db->where('id' , $comment_id);
        return $this->db->delete('comments');
    }



}