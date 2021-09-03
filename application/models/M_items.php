<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_items extends CI_Model
{

    // start datatables
    var $column_order = array(null, 'barcode', 'p_items.name', 'category_name', 'unit_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_items.name', 'price'); //set column field database for datatable searchable
    var $order = array('item_id' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('p_items.*, p_categories.name as category_name, p_units.name as unit_name');
        $this->db->from('p_items');
        $this->db->join('p_categories', 'p_items.category_id = p_categories.category_id');
        $this->db->join('p_units', 'p_items.unit_id = p_units.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('p_items');
        return $this->db->count_all_results();
    }
    // end datatables

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

    public function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE p_items SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}
