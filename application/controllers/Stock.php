<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['M_items', 'M_supplier', 'M_stock']);
    }

    public function stock_in_data()
    {
        $data = [
            'title' => 'Stock in',
            'row' => $this->M_stock->get_stock_in()->result()
        ];
        // $data['units'] = $this->unit->getAllUnit();
        $this->template->load('templates/template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add()
    {
        $data = [
            'title' => 'Stock in',
            'items' => $this->M_items->getAllItem(),
            'suppliers' => $this->M_supplier->getAllSupplier()
        ];
        // $data['units'] = $this->unit->getAllUnit();
        $this->template->load('templates/template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function process()
    {
        if (isset($_POST['submit'])) {
            $post = $this->input->post(null, true);
            $this->M_stock->add_stock_in($post);
            $this->M_items->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Stock in berhasil dihapus!
            </div>');
                redirect('stock/in');
            }
        }
    }
}
