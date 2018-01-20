<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function get_categories()
    {
        $this->db->order_by('name');
        $this->db->where('approved' , '1');
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function get_category($id)
    {
        $this->db->where(['category_id' => $id]);
        $query = $this->db->get('categories');
         $results = $query->row();
         //foreach($results as $result):
         return $results->name;
         //endforeach;
    }



    public function create_category()
    {
        if($this->session->user_level == 'admin')
        {
            $approved = '1';
        }
        else
        {
            $approved = '0';
        }

        $data = [
            'name' => $this->input->post('name'),
            'approved' => $approved
        ];

        $this->db->insert('categories' , $data);
        return true;
    }


    public function delete_category($category_id)
    {
        $this->db->where('category_id' , $category_id);
        $this->db->delete('categories');
        return true;
    }


    public function approve_category($category_id)
    {
        $this->db->where('category_id' , $category_id);
        $data = [
            'approved' => '1'
        ];
        $this->db->update('categories' , $data);
        return true;
    }


}