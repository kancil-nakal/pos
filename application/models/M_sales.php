<?php
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

    //alam koding
    // public function invoice_no($prefix = null, $table = null, $field = null)
    // {
    //     $this->db->select('invoice');
    //     $this->db->like($field, $prefix, 'after');
    //     $this->db->order_by($field, 'desc');
    //     $this->db->limit(1);

    //     return $this->db->get($table)->row_array()[$field];
    // }
}
