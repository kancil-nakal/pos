<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_units extends CI_Model
{
    public function getAllUnit()
    {
        return $this->db->get('p_units')->result_array();
    }
    public function getIdUnit($id)
    {
        return $this->db->get_where('p_units', ['unit_id' => $id])->row_array();
    }

    public function addUnit($post)
    {
        $data = [
            'name' => $post['unit_name']
        ];
        $this->db->insert('p_units', $data);
    }

    public function editUnit($post)
    {
        $data = [
            'name' => $post['unit_name'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('p_units', $data);
    }

    public function delUnit($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_units');
    }
}
