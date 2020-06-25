<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('pembelian_model');
		$this->load->model('produk_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}

	}

	public function index()
	{
		if($this->session->userdata('level') != 'Admin'){
		$this->load->view('errors-403.php');
		}else{

		$data['title'] = 'Data Pembelian';
		$data['show'] = $this->pembelian_model->show()->result();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('pembelian', $data);
		$this->load->view('template/footer');
		}
	}
	public function cart(){
		if($this->session->userdata('level') != 'Admin'){
		$this->load->view('errors-403.php');
		}else{

		$data['data_produk'] = $this->produk_model->show()->result();
		$data['data_cart'] = $this->pembelian_model->ShowCart()->result();
		$data['title'] = 'Cart Transaksi Pembelian';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('cart-pembelian', $data);
		$this->load->view('template/footer');
		}

	}
	public function addcart(){

		$id = $this->input->post('produk');

		$produk = $this->produk_model->showby($id);

		$sub = $produk[0]->hargabeli * $this->input->post('qty');

		$count_cart = $this->pembelian_model->count_cart($id);	

		if($count_cart > 0){
		$cekcart = $this->pembelian_model->getbyid($id);	
		

		$subss = $cekcart[0]->qty + $this->input->post('qty');
			$data = array(
				'qty' => $cekcart[0]->qty + $this->input->post('qty'),
				'sub' => $subss * $produk[0]->harga
			);

			$this->pembelian_model->update_cart($id, $data, 'temp_pembelian');
		}else{
		$data = array(
			'id' => $this->input->post('produk'), 
			'nama' => $produk[0]->nama, 
			'harga' => $produk[0]->harga, 
			'qty' => $this->input->post('qty'),
			'sub' => $sub
		);
		$this->pembelian_model->addcart($data, 'temp_pembelian');
		}

		redirect ('/pembelian/cart');
	}
	public function save_cart(){
		$ids = $this->input->post('no');
		$data = array(
			'id' => $this->input->post('no'),
			'tgl' => $this->input->post('tgl'),
			'total' => $this->input->post('total')
		);
		$this->pembelian_model->insert_cart($data, 'pembelian');

		$cart = $this->pembelian_model->ShowCart()->result();
		foreach ($cart as $key) {
			$produk = $this->produk_model->showby($key->id);
			$harga = $produk[0]->hargabeli;
			$subtotal = $produk[0]->harga * $key->qty;

			$data = array(
				'id' => $this->input->post('no'), 
				'produk' => $produk[0]->id, 
				'harga' => $harga, 
				'qty' => $key->qty, 
				'subtotal' => $subtotal
			);

			$this->pembelian_model->insert_detail($data, 'det_pembelian');

			$upstok = $produk[0]->stok + $key->qty;

			$data = array(
				'stok' => $upstok 
			);

			$this->produk_model->update($key->id, $data, 'produk');

			$this->pembelian_model->delete_all_cart();
		}
		redirect ('pembelian/nota/'.$ids.'');

	}
	public function delete_temp_beli($id){
		$this->pembelian_model->hapus_temp($id, 'temp_pembelian');
		redirect (base_url('index.php/pembelian/cart'));
	}
	public function nota($id){
			
			$data['datas'] = $this->pembelian_model->get_pembelian($id)->result();
			$data['detail'] = $this->pembelian_model->get_detail($id)->result();
			
			$this->load->view('nota_pembelian', $data);

	}

}
