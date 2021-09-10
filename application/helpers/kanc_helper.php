<?php

function is_logged_in()
{
    $ci = get_instance();
    $user_session = $ci->session->userdata('username');
    if (!$user_session) {
        redirect('auth');
    }
}
// function is_logged_in()
// {
//     $ci = &get_instance();
//     $user_session = $ci->session->userdata('user_id');
//     if ($user_session) {
//         redirect('dashboard');
//     }
// }

function is_not_logged_in()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('auth');
    }
}

function check_level()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function indo_currency($nominal)
{
    $hasil = 'Rp. ' . number_format($nominal, 2, ',', '.');
    return $hasil;
}

function indo_date($date)
{
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);
    return $d.'/'.$m.'/'.$y;
}
