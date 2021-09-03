<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stock extends CI_Model
{
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
}
