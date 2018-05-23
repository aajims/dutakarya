<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->model_squrity->getsqurity();
		$this->load->database();
		$this->load->helper('fungsidate');
		$this->load->model('model_bank');
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( ! is_login()) {
			redirect(base_url('auth'));
		}
	}
		
	function index(){
		$isi['judul']	= ' Halaman Data Bank';
		$isi['bank']	= $this->model_bank->tampilkan();
		$this->template->utama('master/view_bank',$isi);
	}
		   
	function tambah(){
		$data = array(
			'kd_bank'=>  $this->input->post('kode'),
			'nm_bank'=>  $this->input->post('nama'),
			'cabang'=>  $this->input->post('cab'),
		);
		$this->model_bank->tambah($data);
		echo json_encode(array("status" => TRUE));
	}

	function edit($id) {
		$data = $this->model_bank->get_id($id);
		echo json_encode($data);
	}

	function update() {
		$data = array(
			'kd_bank'=>  $this->input->post('kode'),
			'nm_bank'=>  $this->input->post('nama'),
			'cabang'=>  $this->input->post('cab'),
		);
		
		$this->model_bank->update(array('id_bank' => $this->input->post('id_bank')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function delete($id) {
		$this->model_bank->delete_id($id);
		echo json_encode(array("status" => TRUE));
	}

	function laporan() {
		$data['judul']    = 'Laporan Transaksi';
		$this->template->utama('laporan/lapo_trans',$data);
	}

	function aksi_laporan($from, $to) {
		$dt['masuk']	 	= $this->model_transaksi->laporan($from, $to);
		$dt['from']			= date('d F Y', strtotime($from));
		$dt['to']			= date('d F Y', strtotime($to));
		$this->load->view('laporan/laporan_trans', $dt);
	}

	function pdf($id){
		$this->load->library('cfpdf');
		$tgl = date('d F Y');	
		$nama = $this->session->userdata('nama_lengkap');

		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',17);

		$pdf->Cell(0, 10, "Struk Tagihan Air Syamdassyah ", 10, 1, 'L');
		$pdf->Cell(0, 10, "Periode Bulan  ".date('F - Y', strtotime($tgl)), 0, 1, 'L');
		$pdf->Ln(5); 
		$pdf->SetFont('Arial','',10);		

		$transaksi 	= $this->model_transaksi->pdf($id);
		foreach($transaksi->result() as $p)
		{
			$pdf->Cell(35, 7, 'ID Pel', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->kode, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Pelanggan', 1, 0, 'L');	
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->nm_pelanggan, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Tarif', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->tarif, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Mtr Awal', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->meter_awal, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Mtr Akhir', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->meter_akhir, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Total Meter', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->total_meter, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Tunggakan', 1, 0, 'L');
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->tunggakan, 1, 0, 'L');
			$pdf->Ln();

			$pdf->Cell(35, 7, 'Total Tagihan', 1, 0, 'L');	
			$pdf->Cell(5, 7, ':', 1, 0, 'C');
			$pdf->Cell(35, 7, $p->total_tagihan, 1, 0, 'L');							 
			$pdf->Ln();

		}
		$pdf->Ln();	
		$pdf->Cell(0, 2, "Bandung,  ".date('d F Y', strtotime($tgl)), 0, 1, 'L');
		$pdf->Ln(12);

		$pdf->Cell(0, 1, "$nama ", 0, 1, 'L');			

		$pdf->Output();
	}	


	function laporan_pdf($from,$to){		 
		$this->load->library('cfpdf');
		$tgl = date('d F Y');	
		$nama = $this->session->userdata('nama_lengkap');

		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',17);

		$pdf->Cell(0, 10, "Laporan Transaksi ", 20, 1, 'C');
		$pdf->Cell(0, 10, "Periode ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'C');
		$pdf->Ln(10); 
		$pdf->SetFont('Arial','',10);		

		$pdf->Cell(7, 7, 'No', 1, 0, 'L');
		$pdf->Cell(35, 7, 'Kode', 1, 0, 'L');		
		$pdf->Cell(35, 7, 'Pelanggan', 1, 0, 'L');		
		$pdf->Cell(35, 7, 'Tgl Transaksi', 1, 0, 'L');
		$pdf->Cell(25, 7, 'Tarif', 1, 0, 'L');
		$pdf->Cell(25, 7, 'Mtr Awal', 1, 0, 'L');
		$pdf->Cell(25, 7, 'Mtr Akhir', 1, 0, 'L');
		$pdf->Cell(35, 7, 'Tunggakan', 1, 0, 'L');
		$pdf->Cell(35, 7, 'Total', 1, 0, 'L');

		$pdf->Ln();

		$transaksi 	= $this->model_transaksi->lapor_pdf($from, $to);

		$no = 1;

		foreach($transaksi->result() as $p)
		{
			$pdf->Cell(7, 7, $no, 1, 0, 'L');
			$pdf->Cell(35, 7, $p->kode, 1, 0, 'L');
			$pdf->Cell(35, 7, $p->nm_pelanggan, 1, 0, 'L');			
			$pdf->Cell(35, 7, date('d F Y', strtotime($p->tgl_transaksi)), 1, 0, 'L');			
			$pdf->Cell(25, 7, number_format($p->tarif), 1, 0, 'L');
			$pdf->Cell(25, 7, $p->meter_awal, 1, 0, 'L');
			$pdf->Cell(25, 7, $p->meter_akhir, 1, 0, 'L');
			$pdf->Cell(35, 7, number_format($p->tunggakan), 1, 0, 'L');
			$pdf->Cell(35, 7, number_format($p->total_tagihan), 1, 0, 'L');		

			$pdf->Ln();			
			$no++;
		}

		$pdf->Ln();
		$pdf->Cell(0, 1, "Mengetahui,  ", 20, 1, 'R');		

		$pdf->Cell(0, 2, "Bandung,  ".date('d/m/Y', strtotime($tgl)), 0, 1, 'L');
		$pdf->Ln(19);
		$pdf->Cell(0, 1, "PD Manager ", 0, 1, 'R');
		$pdf->Cell(0, 1, "$nama ", 0, 1, 'L');			

		$pdf->Output();
	}
}
