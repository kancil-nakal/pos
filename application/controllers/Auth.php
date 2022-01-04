<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $users = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($users) {
            if ($users['is_active'] == 1) {
                if (password_verify($password, $users['password'])) {
                    $data = [
                        'username' => $users['username'],
                        'user_id' => $users['user_id'],
                        'level' => $users['level'],
                        // 'userid' => $users['user_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($users['level'] == 1) {
                        redirect('dashboard');
                    } elseif ($users['level'] == 2) {
                        redirect('dashboard');
                    } else {
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('auth');
                }
            } else {
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username tidak terdaftar!
                    </div>');
            redirect('auth');
        }

        // $post = $this->input->post(null, TRUE);
        // if (isset($post['login'])) {
        //     $query = $this->user->getUsers($post);
        //     if ($query->num_rows() > 0) {
        //         $row = $query->row();
        //         $params = ['user_id' => $row->user_id, 'level' => $row->level];
        //         $this->session->set_userdata($params);
        //         echo "<script>
        //             alert('Selamat, Login berhasil!');
        //             window.location ='" . base_url('dashboard') . "';
        //         </script>";
        //     } else {
        //         echo "<script>
        //             alert('Login gagal!, username/password salah');
        //             window.location ='" . base_url('auth') . "';
        //         </script>";
        //     }
        // }
    }

    public function logout()
    {
        $data = ['username', 'level'];
        $this->session->unset_userdata($data);
        redirect('auth');
    }
}
