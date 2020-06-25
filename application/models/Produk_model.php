<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

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
		return $this->db->get('produk');
	}
	function save_produk($data, $table){
		return $this->db->insert($table, $data);
	}
	function showby($id){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}
	function update($id, $data, $table){
		$this->db->where('id',$id);
		$this->db->update($table, $data);
	}
	function edit_produk($id){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function hapus_data($id, $table){
		$this->db->where('id', $id);	
		$this->db->delete($table);
	}
}
