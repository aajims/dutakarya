<?php
	Class Laporan extends CI_Controller{
		
			 function __construct() {
	        parent::__construct();
	        $this->model_squrity->getsqurity();
	        $this->load->database();
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('fungsidate');
	        $this->load->model('model_karyawan');
	        $this->load->library(array('template','pagination','secure_library','upload'));
	        if ( ! is_login())
        {
            redirect(base_url('auth'));
        }
	    }
			 
		function index(){
		$data['judul']    = 'Laporan Karyawan';
		$this->template->utama('laporan/lap_karyawan',$data);
	}
		
		function aksi_laporan($from, $to){				
		$dt['kar'] 	= $this->model_karyawan->laporan($from, $to);
		$dt['from']			= date('d F Y', strtotime($from));
		$dt['to']			= date('d F Y', strtotime($to));
		$this->load->view('laporan/laporan_karyawan', $dt);
	}
	
	public function laporan_pdf($from, $to)	{
		$this->load->library('cfpdf');
		$tgl = date('d F Y ');		
		$nama = $this->session->userdata('nama_lengkap');
				
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		
		$pdf->Image('pavicondks.png',20,10,15,10);		
		$pdf->Cell(3, 25, "PT DUTA KARYA SINERGI", 3, 0, 'L');
		$pdf->Cell(3, 31, "Jl. Jatibening Estate Raya Pondok Gede -Bekasi ", 3, 0, 'L');
		$pdf->Cell(3, 39, "JABAR - INDONESIA", 3, 0, 'L');
		$pdf->Cell(3, 47, "Telp : +62-852.82107967 ", 3, 0, 'L');
		$pdf->SetFont('Arial','B',17);
		$pdf->Cell(0, 10, "Laporan Karyawan ", 10, 1, 'C');
		$pdf->Cell(0, 10, "Periode ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'C');
		$pdf->Ln(10); 
		$pdf->SetFont('Arial','',10);		

		$pdf->Cell(7, 7, 'No', 1, 0, 'L');
		$pdf->Cell(30, 7, 'Nik', 1, 0, 'L');
		$pdf->Cell(55, 7, 'Nama Karyawan', 1, 0, 'L');
		$pdf->Cell(35, 7, 'No Telp', 1, 0, 'L'); 
		$pdf->Cell(25, 7, 'Tgl Lahir', 1, 0, 'L');
		$pdf->Cell(25, 7, 'Jabatan', 1, 0, 'L');
		$pdf->Cell(25, 7, 'Akhir Kontrak', 1, 0, 'L');
		$pdf->Cell(39, 7, 'Nama Customer', 1, 0, 'L'); 
		$pdf->Ln();
		
		$karyawan 	= $this->model_karyawan->pdf($from, $to);

		$no = 1;
		
		foreach($karyawan->result() as $p)
		{
			$pdf->Cell(7, 7, $no, 1, 0, 'L');
			$pdf->Cell(30, 7, $p->kd_karyawan, 1, 0, 'L');
			$pdf->Cell(55, 7, $p->nm_karyawan, 1, 0, 'L');
			$pdf->Cell(35, 7, $p->no_telepon, 1, 0, 'L'); 
			$pdf->Cell(25, 7, date('d/m/Y', strtotime($p->tgl_lahir)), 1, 0, 'L');
			$pdf->Cell(25, 7, $p->jabatan, 1, 0, 'L');
			$pdf->Cell(25, 7, date('d/m/Y', strtotime($p->akhir_kontrak)), 1, 0, 'L');
			$pdf->Cell(39, 7, $p->nm_partner, 1, 0, 'L');
			$pdf->Ln();
			$no++;
		}
		
		$pdf->Ln();
		$pdf->Cell(0, 1, "Mengetahui,  ", 0, 1, 'R');		
		
		$pdf->Cell(0, 2, "Bekasi,  ".date('d/m/Y ', strtotime($tgl)), 0, 1, 'L');
		$pdf->Ln(19);
		$pdf->Cell(0, 1, "PD Manager ", 0, 1, 'R');
		$pdf->Cell(0, 1, "$nama ", 0, 1, 'L');
		$pdf->Output();
	}
			 
}
