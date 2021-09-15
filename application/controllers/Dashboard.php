<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_user', 'user');
		$this->load->model('M_items', 'items');
		$this->load->model('M_supplier', 'supplier');
		$this->load->model('M_customers', 'customers');
		// is_not_logged_in();
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'count_items' => $this->items->get()->num_rows(),
			'count_supplier' => $this->supplier->get()->num_rows(),
			'count_customers' => $this->customers->get()->num_rows(),
		];
		$this->template->load('templates/template', 'dashboard/index', $data);
	}
}
