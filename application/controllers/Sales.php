<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_sales');
		$this->load->model('M_customers');
	}
	public function index()
	{
		// // alam koding
		// $table = "t_sales";
		// $field = "invoice";
		// $today = date('ymd');
		// $prefix = "INV" . $today;

		// $lastKode = $this->M_sales->invoice_no($prefix, $table, $field);

		// //mengambil nilai 4 dari belakang
		// $noUrut = (int)substr($lastKode, -4, 4);
		// $noUrut++;
		// $newKode = $prefix . sprintf('%04s', $noUrut);

		//yuk koding
		$data = [
			'title' => 'Sales',
			'customers' => $this->M_customers->get()->result(),
			'invoice' => $this->M_sales->invoice_no()
		];
		$this->template->load('templates/template', 'transaction/sales/sales_form', $data);
	}
}
