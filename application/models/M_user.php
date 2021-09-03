<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }
    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }
    public function getUsers($post)
    {
        return $this->db->get_where('users', ['username' => $post['username'], 'password' => sha1($post['password'])]);
    }

    public function getUserData($username = null)
    {
        if ($username != null) {
            return $this->db->get_where('users', ['username' => $username]);
        }
    }

    public function getUserId($id)
    {
        return $this->db->get_where('users', ['user_id' => $id])->row_array();
    }

    public function addUser()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'email' => $this->input->post('email', true),
            'address' => $this->input->post('address', true),
            'level' => $this->input->post('level', true),
            'is_active' => 1
        ];
        $this->db->insert('users', $data);
    }

    public function updateUser()
    {
        if ($this->input->post('password1')) {
            $data = [
                'name' => $this->input->post('name', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email', true),
                'address' => $this->input->post('address', true),
                'level' => $this->input->post('level', true),
                'is_active' => 1
            ];
        } else {
            $data = [
                'name' => $this->input->post('name', true),
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'address' => $this->input->post('address', true),
                'level' => $this->input->post('level', true),
                'is_active' => 1
            ];
        }
        $this->db->where('user_id', $this->input->post('user_id'));
        $this->db->update('users', $data);
    }

    public function delUser($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }
}
