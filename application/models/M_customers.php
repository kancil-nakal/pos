<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_customers extends CI_Model
{
    public function get($id = null){
        $this->db->from('customers');
        if($id != null){
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAllCustomer()
    {
        return $this->db->get('customers')->result_array();
    }
    public function getIdCustomer($id)
    {
        return $this->db->get_where('customers', ['customer_id' => $id])->row_array();
    }

    public function addCustomer($post)
    {
        $data = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ];
        $this->db->insert('customers', $data);
    }

    public function editCustomer($post)
    {
        $data = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['customer_id']);
        $this->db->update('customers', $data);
    }

    public function delCustomer($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customers');
    }
}
