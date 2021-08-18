<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_user', 'user');
		// is_not_logged_in();
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];
		$this->template->load('templates/template', 'dashboard/index', $data);
	}
}
