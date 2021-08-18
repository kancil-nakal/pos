<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_units', 'unit');
    }
    public function index()
    {
        $data = [
            'title' => 'Units'
        ];
        $data['units'] = $this->unit->getAllUnit();
        $this->template->load('templates/template', 'products/units/unit_data', $data);
    }

    public function add()
    {
        $unit = $this->unit->getAllunit();
        $unit['unit_id'] = null;
        $unit['name'] = null;

        $data = [
            'title' => 'Units',
            'page' => 'tambah',
            'units' => $unit
        ];
        $this->template->load('templates/template', 'products/units/unit_form', $data);
    }

    public function edit($id)
    {
        $unit = $this->unit->getIdUnit($id);
        $data = [
            'title' => 'Units',
            'page' => 'edit',
            'units' => $unit
        ];
        $this->template->load('templates/template', 'products/units/unit_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->unit->addUnit($post);
        } else if (isset($_POST['edit'])) {
            $this->unit->editUnit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Data berhasil disimpan!
            </div>');
        }
        redirect('units');
    }

    public function delete($id)
    {
        $this->unit->delunit($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Data berhasil dihapus!
            </div>');
        }
        redirect('units');
    }
}
