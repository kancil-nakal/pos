<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_items extends CI_Model
{



    public function getAllItem()
    {
        $this->db->select('p_items.*, p_categories.name as category_name, p_units.name as unit_name');
        $this->db->from('p_items');
        $this->db->join('p_categories', 'p_categories.category_id = p_items.category_id');
        $this->db->join('p_units', 'p_units.unit_id = p_items.unit_id');
        $this->db->order_by('barcode', 'asc');
        return $this->db->get()->result_array();
    }
    public function getIdItem($id)
    {
        return $this->db->get_where('p_items', ['item_id' => $id])->row_array();
    }

    public function addItem($post)
    {
        $data = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'stock' => $post['stock'],
            'image' => $post['image'],
        ];
        $this->db->insert('p_items', $data);
    }

    public function editItem($post)
    {
        $data = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'stock' => $post['stock'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if ($post['image']) {
            $data['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('p_items', $data);
    }

    public function check_barcode($code, $id = null)
    {
        $this->db->from('p_items');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        return $this->db->get();
    }

    public function delItem($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_items');
    }
}
