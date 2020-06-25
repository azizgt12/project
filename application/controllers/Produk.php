<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();
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
		$data['show'] = $this->produk_model->show()->result();
		$data['title'] = 'Data Produk';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('produk', $data);
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
		
		redirect('/produk');

	}public function getproduk($id){
		
		$where = array('id' => $id );
		$data['show'] = $this->produk_model->showby($where);
		var_dump($data);

	}
	public function edit($id){
		
		$data['title'] = 'Edit Data Produk';

		$data['data_produk'] = $this->produk_model->edit_produk($id, 'produk');

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('edit_produk', $data);
		$this->load->view('template/footer');

	}
	public function update_produk(){

		$where = $this->input->post('id');

		$data = array(
			'nama' => $this->input->post('nama') , 
			'kategori' => $this->input->post('kategori') , 
			'harga' => $this->input->post('jual') , 
			'hargabeli' => $this->input->post('beli') , 
			'stok' => $this->input->post('stok') 
		);

		$this->produk_model->update($where, $data, 'produk');

		redirect ('produk');
	}
	public function hapus($id){

		$this->produk_model->hapus_data($id, 'produk');
		
		$this->session->set_flashdata('success', 'Berhasil Hapus Data'); 

		redirect ('produk');


	}
}
