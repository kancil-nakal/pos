<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data = [
			'title' => 'Sales',
		];
		$this->template->load('templates/template', 'transaction/sales/sales_form', $data);
	}
}
