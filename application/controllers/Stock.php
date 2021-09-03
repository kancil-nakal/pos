<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['M_items', 'M_supplier']);
    }

    public function stock_in_data()
    {
        $data = [
            'title' => 'Stock in'
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
}
