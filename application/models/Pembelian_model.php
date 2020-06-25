<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

	function show(){
		return $this->db->get('pembelian');
	}
	function ShowCart(){
		return $this->db->get('temp_pembelian');
	}
	function getbyid($id){
		$this->db->select('qty');
		$this->db->from('temp_pembelian');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}
	function count_cart($id){
		$this->db->where('id', $id);
		$num_rows = $this->db->count_all_results('temp_pembelian');
		return $num_rows;
	}
	function update_cart($id, $data, $table){
		$this->db->where('id',$id);
		$this->db->update($table, $data);

	}
	function addcart($data, $table){
		return $this->db->insert($table, $data);
	}
	function insert_cart($data, $table){
		return $this->db->insert($table, $data);
	}
	function insert_detail($data, $table){
		return $this->db->insert($table, $data);
	}
	function delete_all_cart(){
		return $this->db->empty_table('temp_pembelian');
	}
	function hapus_temp($id, $table){
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}
	function get_pembelian($id){
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->where('id', $id);
		$query =  $this->db->get();
		return $query;
	}
	function get_detail($id){
		$this->db->select('det_pembelian.*, produk.nama as namas');
		$this->db->from('det_pembelian');
		$this->db->join('produk', 'det_pembelian.produk = produk.id');
		$this->db->where('det_pembelian.id', $id);
		$query =  $this->db->get();
		return $query;
	}


}
