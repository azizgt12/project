<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('laporan_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}

	}

	public function index()
	{
		if($this->session->userdata('level') != 'Pimpinan'){
		$this->load->view('errors-403.php');
		}else{

		$data['title'] = 'Laporan Penjualan';

		if(isset($_POST['act'])){
			$mulai   = $this->input->post('mulai');
			$selesai = $this->input->post('selesai');			


		
		$data['data'] = $this->laporan_model->cek($mulai, $selesai)->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('laporan', $data);
		$this->load->view('template/footer', $data);
		}else{

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('laporan');
		$this->load->view('template/footer');

		}
		}	
	}
    public function export($mulai, $selesai) {


		$data = $this->laporan_model->cek($mulai, $selesai)->result();

        $tanggal = date('d-m-Y');
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
		$pdf->setPageOrientation('L');
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Penjualan - ".date('d F Y', strtotime($mulai))." - ".date('d F Y', strtotime($selesai)), 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(30, 8, "Kode Produk", 1, 0, 'C');
        $pdf->Cell(100, 8, "Nama Produk", 1, 0, 'L');
        $pdf->Cell(35, 8, "Harga Penjualan", 1, 0, 'C');
        $pdf->Cell(35, 8, "Total Transaksi", 1, 0, 'C');
        $pdf->Cell(35, 8, "Jumlah Terjual", 1, 0, 'C');
        $pdf->Cell(35, 8, "Subtotal", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        $fill = 0;
		$total = 0;
        $totalT = 0;
        $totalJ = 0;
		foreach($data as $row) {
		$total += $row->sub;
        $totalT +=$row->transaksi;
        $totalJ +=$row->totalterjual;

        $pdf->Cell(30, 8, "000".$row->id, 1, 0, 'C');
        $pdf->Cell(100, 8, $row->nama, 1, 0, 'L');
        $pdf->Cell(35, 8, "Rp. ".number_format($row->harga).",-", 1, 0, 'R');
        $pdf->Cell(35, 8, number_format($row->transaksi), 1, 0, 'C');
        $pdf->Cell(35, 8, number_format($row->totalterjual), 1, 0, 'C');
        $pdf->Cell(35, 8, "Rp. ".number_format($row->sub).",-", 1, 0, 'R');
        $pdf->ln();
        }        
        $pdf->Cell(165, 8, "Total Harga Penjualan", 1, 0, 'C');
        $pdf->Cell(35, 8, $totalT, 1, 0, 'C');
        $pdf->Cell(35, 8, $totalJ, 1, 0, 'C');
        $pdf->Cell(35, 8, "Rp. ".number_format($total).",-", 1, 0, 'R');

        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    }
    private function addRow($pdf, $no, $datas) {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $datas['id'], 1, 0, '');
    }
}
