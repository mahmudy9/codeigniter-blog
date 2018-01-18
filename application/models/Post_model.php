<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{

    public function __construct ()
    {
        $this->load->database();
    }

    public function get_post ($slug = false , $offset = false , $limit = false )
    {   
        if($limit)
        {
            $this->db->limit($limit , $offset);
        }

        if ($slug == false)
        {
            $this->db->order_by('posts.post_id' , 'DESC');
            $this->db->join('categories' , 'categories.category_id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts' , array('slug' => $slug));
        return $query->row_array();
    }


    public function create_post()
    {
        $slug = url_title( $this->input->post('title') , '-'  , true);

        $data = array(
            'user_id' => $this->session->user_id,
            'category_id' => $this->input->post('category_id'),
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'content' => $this->input->post('content')
        );

        return $this->db->insert('posts' , $data);
    }


    public function delete_post()
    {
        $id = $this->input->post('post_id');
        $this->db->where('post_id' , $id);
        $this->db->delete('posts');
        return true;
    }

    public function update_post()
    {
        $slug = url_title( $this->input->post('title') , '-' , true );
        $data = array(
            'category_id' => $this->input->post('category_id'),
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'content' => $this->input->post('content')
        );

        $this->db->where('post_id' , $this->input->post('post_id'));
        return $this->db->update('posts' , $data);
    }


    public function get_posts_by_category($category_id)
    {
        $this->db->order_by("post_id" , "DESC");
        $this->db->join('categories' , 'categories.category_id = posts.category_id');
        $query= $this->db->get_where('posts' , ['category_id' => $category_id]);
        return $query->result_array();
    }


}
