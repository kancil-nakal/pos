<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_items', 'item');
        $this->load->model('M_units', 'unit');
        $this->load->model('M_category', 'category');
    }
    public function index()
    {
        $data = [
            'title' => 'Categories'
        ];
        $data['categories'] = $this->category->getAllCategory();
        $this->template->load('templates/template', 'products/categories/category_data', $data);
    }

    public function add()
    {
        $category = $this->category->getAllCategory();
        $category['category_id'] = null;
        $category['name'] = null;

        $data = [
            'title' => 'Categories',
            'page' => 'tambah',
            'categories' => $category
        ];
        $this->template->load('templates/template', 'products/categories/category_form', $data);
    }

    public function edit($id)
    {
        $category = $this->category->getIdCategory($id);
        $data = [
            'title' => 'Categories',
            'page' => 'edit',
            'categories' => $category
        ];
        $this->template->load('templates/template', 'products/categories/category_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->category->addCategory($post);
        } else if (isset($_POST['edit'])) {
            $this->category->editCategory($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Data berhasil disimpan!
            </div>');
        }
        redirect('category');
    }

    public function delete($id)
    {
        $this->category->delcategory($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Data berhasil dihapus!
            </div>');
        }
        redirect('category');
    }
}
