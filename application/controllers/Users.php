<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_level();
        $this->load->model('M_user', 'user');
    }
    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => $this->user->getAllUser()
        ];
        $this->template->load('templates/template', 'users/user_data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Users'
        ];
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '{field} tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]|alpha_dash', [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'is_unique' => '{field} sudah dipakai',
            'alpha_dash' => '{field} tidak boleh menggunakan spasi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email', [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'valid_email' => '{field} tidak valid',
            'alpha_dash' => '{field} tidak boleh menggunakan spasi'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'matches' => '{field} tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[5]|matches[password1]', [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'matches' => '{field} tidak sama'
        ]);

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/template', 'users/user_add', $data);
        } else {

            $this->user->addUser();
            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User baru berhasil ditambahkan!
            </div>');
            redirect('users');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Users Update'
        ];
        $data['users'] = $this->user->getUserId($id);

        //cek username
        $userOld = $this->user->getUserId($id);
        if ($userOld['username'] == $this->input->post('username')) {
            $rule_username = 'trim|required|min_length[4]|alpha_dash';
        } else {
            $rule_username = 'trim|required|is_unique[users.username]|min_length[4]|alpha_dash';
        }
        //cek email
        $userOld = $this->user->getUserId($id);
        if ($userOld['email'] == $this->input->post('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|is_unique[users.username]|valid_email';
        }


        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '{field} tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', $rule_username, [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'is_unique' => '{field} sudah dipakai',
            'alpha_dash' => '{field} tidak boleh menggunakan spasi'
        ]);
        $this->form_validation->set_rules('email', 'Email', $rule_email, [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} min 5 karakter',
            'valid_email' => '{field} tidak valid',
            'alpha_dash' => '{field} tidak boleh menggunakan spasi'
        ]);
        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password1', 'Password', 'trim|matches[password2]', [
                'required' => '{field} tidak boleh kosong',
                'min_length' => '{field} min 5 karakter',
                'matches' => '{field} tidak sama'
            ]);
        }
        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]', [
                'required' => '{field} tidak boleh kosong',
                'min_length' => '{field} min 5 karakter',
                'matches' => '{field} tidak sama'
            ]);
        }

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/template', 'users/user_edit', $data);
        } else {
            $this->user->updateUser();
            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User baru berhasil diupdate!
            </div>');
            redirect('users');
        }
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->user->delUser($id);
        $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User berhasil dihapus!
            </div>');
        redirect('users');
    }
}
