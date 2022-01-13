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
		$this->load->model('M_items');
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
		// $item = $this->M_items->getAllItem();
		$data = [
			'title' => 'Sales',
			'customers' => $this->M_customers->get()->result(),
			'invoice' => $this->M_sales->invoice_no(),
			'items' => $this->M_items->getAllItem(),
			'cart' => $this->M_sales->get_cart()->result(),
		];
		$this->template->load('templates/template', 'transaction/sales/sales_form', $data);
	}


	public function process()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['add_cart'])) {

			$item_id = $this->input->post('item_id');
			$check_cart = $this->M_sales->get_cart(['t_cart.item_id' => $item_id]);
			if ($check_cart->num_rows() > 0) {
				$this->M_sales->update_cart_qty($post);
			} else {
				$this->M_sales->add_cart($post);
			}
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	public function cart_data()
	{
		$data['cart'] = $this->M_sales->get_cart()->result();
		$this->load->view('transaction/sales/cart_data', $data);
	}

	public function cart_del()
	{
		$cart_id = $this->input->post('cart_id');
		$this->M_sales->del_cart(['cart_id' => $cart_id]);

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
