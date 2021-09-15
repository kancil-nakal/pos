<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_supplier extends CI_Model
{

    public function get($id = null){
        $this->db->from('suppliers');
        if($id != null){
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAllSupplier()
    {
        return $this->db->get('suppliers')->result_array();
    }
    public function getIdSupplier($id)
    {
        return $this->db->get_where('suppliers', ['supplier_id' => $id])->row_array();
    }

    public function addSupplier($post)
    {
        $data = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description']
        ];
        $this->db->insert('suppliers', $data);
    }

    public function editSupplier($post)
    {
        $data = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['supplier_id']);
        $this->db->update('suppliers', $data);
    }

    public function delSupplier($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('suppliers');
    }
}
