<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_customers', 'customer');
    }
    public function index()
    {
        $data = [
            'title' => 'Customers'
        ];
        $data['customers'] = $this->customer->getAllcustomer();
        $this->template->load('templates/template', 'customers/customer_data', $data);
    }

    public function add()
    {
        $customer = $this->customer->getAllcustomer();
        $customer['customer_id'] = null;
        $customer['name'] = null;
        $customer['gender'] = null;
        $customer['phone'] = null;
        $customer['address'] = null;

        $data = [
            'title' => 'Customers',
            'page' => 'tambah',
            'customers' => $customer
        ];
        $this->template->load('templates/template', 'customers/customer_form', $data);
    }

    public function edit($id)
    {
        $customers = $this->customer->getIdcustomer($id);
        $data = [
            'title' => 'Customers',
            'page' => 'edit',
            'customers' => $customers
        ];
        $this->template->load('templates/template', 'customers/customer_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->customer->addCustomer($post);
            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
                Selamat! Customer berhasil ditambahkan!
                </div>');
        } else if (isset($_POST['edit'])) {
            $this->customer->editCustomer($post);
            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
                Selamat! customer berhasil diupdate!
                </div>');
        }
        redirect('customers');
    }

    public function delete($id)
    {
        $this->customer->delCustomer($id);
        $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Customer berhasil dihapus!
            </div>');
        redirect('customers');
    }
}
