<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    public function getAllCategory()
    {
        return $this->db->get('p_categories')->result_array();
    }
    public function getIdCategory($id)
    {
        return $this->db->get_where('p_categories', ['category_id' => $id])->row_array();
    }

    public function addCategory($post)
    {
        $data = [
            'name' => $post['category_name']
        ];
        $this->db->insert('p_categories', $data);
    }

    public function editCategory($post)
    {
        $data = [
            'name' => $post['category_name'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('p_categories', $data);
    }

    public function delCategory($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_categories');
    }
}
