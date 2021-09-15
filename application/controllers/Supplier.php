<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_supplier', 'supplier');
    }
    public function index()
    {
        $data = [
            'title' => 'Supplier'
        ];
        $data['suppliers'] = $this->supplier->getAllSupplier();
        $this->template->load('templates/template', 'suppliers/supplier_data', $data);
    }

    public function add()
    {
        $supplier = $this->supplier->getAllSupplier();
        $supplier['supplier_id'] = null;
        $supplier['name'] = null;
        $supplier['phone'] = null;
        $supplier['address'] = null;
        $supplier['description'] = null;

        $data = [
            'title' => 'Supplier',
            'page' => 'tambah',
            'suppliers' => $supplier
        ];
        $this->template->load('templates/template', 'suppliers/supplier_form', $data);
    }

    public function edit($id)
    {
        $suppliers = $this->supplier->getIdSupplier($id);
        $data = [
            'title' => 'Supplier',
            'page' => 'edit',
            'suppliers' => $suppliers
        ];
        $this->template->load('templates/template', 'suppliers/supplier_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->supplier->addSupplier($post);
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
                Selamat! Supplier berhasil ditambahkan!
                </div>');
        } else if (isset($_POST['edit'])) {
            $this->supplier->editSupplier($post);
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
                Selamat! Supplier berhasil diupdate!
                </div>');
        }
        redirect('supplier');
    }

    public function delete()
    {
        $id = $this->input->post('supplier_id');
        $this->supplier->delSupplier($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('message', '<div  class="alert alert-danger" role="alert">
                Gagal! Supplier tidak dapat dihapus!
                </div>');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
                Selamat! Supplier berhasil dihapus!
                </div>');
            redirect('supplier');
        }
    }
}
