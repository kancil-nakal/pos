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

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->M_stock->get($stock_id)->row()->qty;
        $data = ['qty' => $qty,'item_id' => $item_id];
        $this->M_items->update_stock_out($data);
        $this->M_stock->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat! Stock in berhasil dihapus!
        </div>');
            redirect('stock/in');
        }

    }

    public function process()
    {
        if (isset($_POST['submit'])) {
            $post = $this->input->post(null, true);
            $this->M_stock->add_stock_in($post);
            $this->M_items->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Stock in berhasil disimpan!
            </div>');
                redirect('stock/in');
            }
        }
    }


    public function stock_out_data()
    {
        $data = [
            'title' => 'Stock Out',
            'row' => $this->M_stock->get_stock_out()->result()
        ];
        // $data['units'] = $this->unit->getAllUnit();
        $this->template->load('templates/template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $data = [
            'title' => 'Stock Out',
            'items' => $this->M_items->getAllItem(),
            'suppliers' => $this->M_supplier->getAllSupplier()
        ];
        // $data['units'] = $this->unit->getAllUnit();
        $this->template->load('templates/template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function process_stock_out()
    {
        if (isset($_POST['submit'])) {
            $post = $this->input->post(null, true);
            if($post['qty'] >= $post['stock'] ){
                $this->session->set_flashdata('message', '<div  class="alert alert-danger" role="alert">
                Gagal! Qty melebihi stock!
                </div>');
                redirect('stock/out/add');
            } else {
                $this->M_stock->add_stock_out($post);
                $this->M_items->update_stock_out($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
                    Selamat! Stock in berhasil disimpan!
                    </div>');
                    redirect('stock/out');
                }
            }
        }
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->M_stock->get($stock_id)->row()->qty;
        $data = ['qty' => $qty,'item_id' => $item_id];
        $this->M_items->update_stock_in($data);
        $this->M_stock->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
        Selamat! Stock in berhasil dihapus!
        </div>');
            redirect('stock/out');
        }

    }
}
