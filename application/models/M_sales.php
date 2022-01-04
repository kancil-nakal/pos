<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class M_sales extends CI_Model
{
    public function invoice_no()
    {
        $query = $this->db->query("select max(mid(invoice,10,4)) as invoice_no from t_sales where mid(invoice,4,6) = date_format(curdate(),'%y%m%d')");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no + 1);
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "INV" . date('ymd') . $no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, p_items.name as item_name, t_cart.price as cart_price');
        $this->db->from('t_cart');
        $this->db->join('p_items', 't_cart.item_id = p_items.item_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM t_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $cart_no = ((int) $row->cart_no) + 1;
        } else {
            $cart_no = "1";
        }

        $data = [
            'cart_id' => $cart_no,
            'item_id' => $post['item_id'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'total' => $post['price'] * $post['qty'],
            'user_id' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_cart', $data);
    }
}
