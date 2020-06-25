<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	
	function cek($mulai, $selesai){
		$query = $this->db->query("SELECT produk.id, produk.nama, produk.harga, COUNT(detail_penjualan.`produk`) AS transaksi, SUM(detail_penjualan.qty) AS totalterjual, SUM(subtotal) AS sub FROM penjualan, detail_penjualan, produk
		WHERE penjualan.id = detail_penjualan.`id`
		AND detail_penjualan.produk=produk.id
		AND tgl BETWEEN '$mulai' AND '$selesai'
		GROUP BY detail_penjualan.`produk`");		
		
		return $query;

	}
}
