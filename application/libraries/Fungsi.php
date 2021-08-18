<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_user');
    }

    function user_login()
    {
        $username = $this->ci->session->userdata('username');
        $user_data = $this->ci->M_user->getUserData($username)->row();
        return $user_data;
    }
}
