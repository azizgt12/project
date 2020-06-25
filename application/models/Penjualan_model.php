<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function show(){
		$this->db->select('*,penjualan.id as ids');
		$this->db->from('penjualan');
		$query = $this->db->get();

		return $query;
	}
	function save_produk($data, $table){
		return $this->db->insert($table, $data);
	}
	function addcart($data, $table){
		return $this->db->insert($table, $data);
	}
	function ShowCart(){
		return $this->db->get('temp');
	}
	function getbyid($id){
		$this->db->select('qty');
		$this->db->from('temp');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}
	function count_cart($id){
		$this->db->where('id', $id);
		$num_rows = $this->db->count_all_results('temp');
		return $num_rows;
	}
	function update_cart($id, $data, $table){
		$this->db->where('id',$id);
		$this->db->update($table, $data);

	}
	function insert_cart($data, $table){
		return $this->db->insert($table, $data);
	}
	function insert_detail($data, $table){
		return $this->db->insert($table, $data);
	}
	function delete_all_cart(){
		return $this->db->empty_table('temp');
	}
	function hapus_temp($id, $table){
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}
	function get_pembelian($id){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('id', $id);
		$query =  $this->db->get();
		return $query;
	}
	function get_detail($id){
		$this->db->select('detail_penjualan.*, produk.nama as namas');
		$this->db->from('detail_penjualan');
		$this->db->join('produk', 'detail_penjualan.produk = produk.id');
		$this->db->where('detail_penjualan.id', $id);
		$query =  $this->db->get();
		return $query;
	}

}
