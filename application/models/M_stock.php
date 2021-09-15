<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stock extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('t_stock');
        if($id != null){
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('t_stock');
    }

    public function get_stock_in()
    {
        $this->db->select('t_stock.stock_id, p_items.barcode, p_items.name as item_name, qty, date, detail, suppliers.name as supplier_name, p_items.item_id');
        $this->db->from('t_stock');
        $this->db->join('p_items', 't_stock.item_id = p_items.item_id');
        $this->db->join('suppliers', 't_stock.supplier_id = suppliers.supplier_id', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $data = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'created_at' => date('Y-m-d H:i:s'),
            // 'user_id' => $this->session->userdata('user_id')
        ];
        $this->db->insert('t_stock', $data);
    }

    public function get_stock_out()
    {
        $this->db->select('t_stock.stock_id, p_items.barcode, p_items.name as item_name, qty, date, detail, suppliers.name as supplier_name, p_items.item_id');
        $this->db->from('t_stock');
        $this->db->join('p_items', 't_stock.item_id = p_items.item_id');
        $this->db->join('suppliers', 't_stock.supplier_id = suppliers.supplier_id', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $data = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'created_at' => date('Y-m-d H:i:s'),
            // 'user_id' => $this->session->userdata('user_id')
        ];
        $this->db->insert('t_stock', $data);
    }
}
