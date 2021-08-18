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
            'title' => 'Items'
        ];
        $data['items'] = $this->item->getAllItem();
        $this->template->load('templates/template', 'products/items/item_data', $data);
    }

    public function add()
    {
        $item = $this->item->getAllItem();
        $item['item_id'] = null;
        $item['barcode'] = null;
        $item['name'] = null;
        $item['category_id'] = null;
        $item['unit_id'] = null;
        $item['price'] = null;
        $item['stock'] = null;

        $categories = $this->category->getAllCategory();
        $units = $this->unit->getAllUnit();
        // $unit[null] = '- Pilih -';
        // foreach ($units as $unt) {
        //     $unit[$unt->unit_id] = $unt->name;
        // }

        $data = [
            'title' => 'Items',
            'page' => 'tambah',
            'items' => $item,
            'categories' => $categories,
            'units' => $units
        ];
        $this->template->load('templates/template', 'products/items/item_form', $data);
    }

    public function edit($id)
    {
        $item = $this->item->getIdItem($id);

        $categories = $this->category->getAllCategory();
        $units = $this->unit->getAllUnit();

        $data = [
            'title' => 'Items',
            'page' => 'edit',
            'items' => $item,
            'categories' => $categories,
            'units' => $units
        ];
        $this->template->load('templates/template', 'products/items/item_form', $data);
    }

    public function process()
    {
        $conifg['upload_path']     = './uploads/product/';
        $conifg['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 2048;
        $conifg['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $conifg);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if ($this->item->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', '<div style="opacity: .6" class="alert alert-danger" role="alert">
                Barcode sudah dipakai product lain!
                </div>');
                redirect('items/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->item->addItem($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
                                Selamat! Product berhasil ditambah!
                            </div>');
                        }
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', '<div style="opacity: .6" class="alert alert-danger" role="alert">
                            ' . $error . '
                        </div>');
                        redirect('items/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->item->addItem($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
                            Selamat! Product berhasil ditambah!
                        </div>');
                    }
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', '<div style="opacity: .6" class="alert alert-danger" role="alert">
                    Barcode sudah dipakai product lain!
                </div>');
                redirect('items/edit/' . $post['item_id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $item = $this->item->getIdItem($post['item_id']);
                        if ($item['image']) {
                            $target_file = './uploads/product/' . $item['image'];
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->item->editItem($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
                                Selamat! Product berhasil ditambah!
                            </div>');
                        }
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', '<div style="opacity: .6" class="alert alert-danger" role="alert">
                            ' . $error . '
                        </div>');
                        redirect('items/edit');
                    }
                } else {
                    $post['image'] = null;
                    $this->item->editItem($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
                            Selamat! Product berhasil ditambah!
                        </div>');
                    }
                }
            }
        }
        redirect('items');
    }

    public function delete($id)
    {
        $item = $this->item->getIdItem($id);
        if ($item['image']) {
            $target_file = './uploads/product/' . $item['image'];
            unlink($target_file);
        }
        $this->item->delItem($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! Data berhasil dihapus!
            </div>');
        }
        redirect('items');
    }
}
