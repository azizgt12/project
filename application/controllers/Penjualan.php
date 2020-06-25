<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('penjualan_model');
		$this->load->model('produk_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}

	}

	public function index()
	{

		if($this->session->userdata('level') != 'Kasir'){
		$this->load->view('errors-403.php');
		}else{


		$data['title'] = 'Data Penjualan';
		$data['show'] = $this->penjualan_model->show()->result();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('penjualan', $data);
		$this->load->view('template/footer');
		}
	}
	public function save(){
		$data = array(
			'id' => '', 
			'nama' => $this->input->post('nama'), 
			'kategori' => $this->input->post('kategori'), 
			'harga' => $this->input->post('jual'), 
			'hargabeli' => $this->input->post('beli'), 
			'stok' => $this->input->post('stok') 
		);
		$this->produk_model->save_produk($data, 'produk');

		$this->session->set_flashdata('success', 'Berhasil Simpan Data'); 
		
		redirect('index.php/produk');
	}
	public function cart(){
		if($this->session->userdata('level') != 'Kasir'){
		$this->load->view('errors-403.php');
		}else{

		$data['data_produk'] = $this->produk_model->show()->result();
		$data['title'] = 'Cart Penjualan';
		$data['data_cart'] = $this->penjualan_model->ShowCart()->result();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('cart', $data);
		$this->load->view('template/footer');
		}

	}
	public function addcart(){

		$id = $this->input->post('produk');

		$produk = $this->produk_model->showby($id);

		$sub = $produk[0]->harga * $this->input->post('qty');

		$cekcart = $this->penjualan_model->getbyid($id);	
		
		$count_cart = $this->penjualan_model->count_cart($id);	
		$subs = $cekcart[0]->qty + $this->input->post('qty');
		if($count_cart > 0){
			$data = array(
				'qty' => $cekcart[0]->qty + $this->input->post('qty'),
				'sub' => $subs * $produk[0]->harga
			);

			$this->penjualan_model->update_cart($id, $data, 'temp');
		}else{
		$data = array(
			'id' => $this->input->post('produk'), 
			'nama' => $produk[0]->nama, 
			'harga' => $produk[0]->harga, 
			'qty' => $this->input->post('qty'),
			'sub' => $sub
		);
		$this->penjualan_model->addcart($data, 'temp');
		}

		redirect ('/penjualan/cart');
	}
	public function save_cart(){
		$ids = $this->input->post('no');
		$data = array(
			'id' => $this->input->post('no'),
			'tgl' => $this->input->post('tgl'),
			'total' => $this->input->post('total'),
			'cash' => $this->input->post('cash')
		);
		$this->penjualan_model->insert_cart($data, 'penjualan');

		$cart = $this->penjualan_model->ShowCart()->result();
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

			$this->penjualan_model->insert_detail($data, 'detail_penjualan');

			$upstok = $produk[0]->stok - $key->qty;

			$data = array(
				'stok' => $upstok 
			);

			$this->produk_model->update($key->id, $data, 'produk');

			$this->penjualan_model->delete_all_cart();
		}
		
		redirect ('penjualan/nota/'.$ids.'');

		
	}
	public function delete_temp_beli($id){
		$this->penjualan_model->hapus_temp($id, 'temp');
		redirect (base_url('index.php/penjualan/cart'));
	}
	public function nota($id){
			
			$data['datas'] = $this->penjualan_model->get_pembelian($id)->result();
			$data['detail'] = $this->penjualan_model->get_detail($id)->result();
			
			$this->load->view('nota_penjualan', $data);

	}

}
