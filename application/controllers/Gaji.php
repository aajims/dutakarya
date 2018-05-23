<?php
Class Gaji extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('fungsidate');
        $this->load->model('model_gaji');
        $this->load->library(array('template','pagination','upload'));
    }

    function cetak($id) {
		$karyawan 	= $this->model_gaji->pdf($id)->result();
		$this->load->library('cfpdf');
		$tgl = date('d F Y ');		
		$nama = $this->session->userdata('nama_lengkap');
				
		$pdf = new FPDF('L','mm','Legal');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Image('dks.png', null, null, 55, 20);
		$pdf->Text(10,35, "PERIHAL");
		$pdf->Text(40, 35, ":");
		$pdf->Text(44, 35, "LAMPIRAN PERINCIAN BIAYA LEMBUR TENAGA KERJA PT. DUTA KARYA SINERGI");

		$pdf->Text(10,40, "LOKASI");
		$pdf->Text(40, 40, ":");
		$pdf->Text(44, 40, "PT.CIKARANG LISTRINDO - CIKARANG ");

		$pdf->Text(10,45, "PERIODE");
		$pdf->Text(40, 45, ":");
		$pdf->Text(44, 45, $karyawan[0]->periode);

		$pdf->Text(10,50, "NAMA");
		$pdf->Text(40, 50, ":");
		$pdf->Text(44, 50, $karyawan[0]->nm_karyawan);

		$pdf->Text(10,55, "JABATAN");
		$pdf->Text(40, 55, ":");
		$pdf->Text(44, 55, $karyawan[0]->jab);

		$pdf->Text(140,65,'Break Down Lembur');

		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',17);
		$pdf->Ln(20); 
		$pdf->SetFont('Arial','',10);		

		$pdf->Cell(10, 20, 'No', 1, 0, 'C');
		$pdf->Cell(20, 20, 'TGL', 1, 0, 'C');
		$pdf->Cell(20, 20, 'GAJI', 1, 0, 'C');
		$pdf->Cell(160, 7, 'JUMLAH HARI  LEMBUR', 1,0,'C');
		$pdf->SetXY(60,77);
		$pdf->Cell(20, 13, 'MULAI', 1, 0, 'C'); 
		$pdf->Cell(20, 13, 'AKHIR', 1, 0, 'C');
		$pdf->Cell(20, 13, 'STD', 1, 0, 'C');
		$pdf->Cell(20, 13, 'STD', 1, 0, 'C');
		$pdf->Cell(20, 13, 'OT PG', 1, 0, 'C'); 
		$pdf->Cell(20, 13, 'OT SR', 1, 0, 'C'); 
		$pdf->Cell(20, 13, 'JAM LEM', 1, 0, 'C'); 
		$pdf->Cell(20, 13, 'JMLH TUL', 1, 0, 'C'); 
		$pdf->SetXY(220,70);
		$pdf->Cell(25, 20, 'NILAI LEM', 1, 0, 'C');
		//$pdf->Cell(30, 20, 'HARI', 1, 0, 'C');
		$pdf->Cell(40, 20, 'KETERANGAN', 1, 0, 'C'); 
		$pdf->Ln();
		
		$no = 1;

		foreach ($karyawan as $row)
		{
			$pdf->Cell(10, 20, $no, 1, 0, 'C');
			$pdf->Cell(20, 20, $row->tgl, 1, 0, 'C');
			$pdf->Cell(20, 20, $row->gaji, 1, 0, 'C');
			$pdf->Cell(20, 20, $row->jam_masuk, 1, 0, 'C');
			$pdf->Cell(20, 20, $row->jam_pulang, 1, 0, 'C');
			$pdf->Cell(20, 20, '07:30', 1, 0 , 'C');
			$pdf->Cell(20, 20, '16:00', 1, 0 , 'C');
			$OTPagi = '00:00';
			/*if (strtolower($row->jenis_hari) == 'libur') {
				$OTPagi = date('H:i', strtotime('07:30') - strtotime($row->jam_masuk));
			}*/
			$pdf->Cell(20, 20, $OTPagi, 1, 0 , 'C');
			$pdf->Cell(20, 20, '00:00', 1, 0 , 'C');

			$pdf->Cell(20, 20, $row->total_lembur, 1, 0 , 'C');
			$pdf->Cell(20, 20, '0', 1, 0 , 'C');
			$pdf->Cell(25, 20, $row->nom_lembur, 1, 0 , 'C');
			//$pdf->Cell(30, 20, $row->jenis_hari, 1, 0 , 'C');
			$pdf->Cell(40, 20, $row->ket, 1, 0 , 'C');
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
        
    function index(){
        $isi['judul']    = ' Halaman Rincian Lembur';
        $isi['gaji']     = $this->model_gaji->tampilkan();
        $this->template->utama('invoice/view_gaji',$isi);        
       }
	
	function looks(){
        $isi['judul']    = ' Halaman Pengajuan Permintaan Uang';
        $isi['gaji']     = $this->model_gaji->tampil();
        $this->template->utama('gaji/view_gajid',$isi);        
       }
	
	function look(){
        $isi['judul']    = ' Halaman Pengajuan Permintaan Uang';
        $isi['gaji']     = $this->model_gaji->tampil();
        $this->template->utama('gaji/view_gajim',$isi);        
       }
	
	function addview(){
		$data['judul']    = 'Tambah gaji';
		$data['kode']		= $this->model_gaji->kode();
		$this->template->utama('invoice/add_gaji',$data);
	}

	public function search(){
			$keyword = $this->uri->segment(3);
				
			$data = $this->db->from('karyawan')->like('nm_karyawan',$keyword)->get();	
	
			foreach($data->result() as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->nm_karyawan,
					'kar'	=>$row->nm_karyawan,
					'id_kar' =>$row->id_karyawan,
					'jabatan'	=>$row->jabatan,
					'gaji'	=>$row->gaji_pokok,	
					'nik'	=>$row->nik					
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		} 
	
	function tambahrinci(){
		$lembur = $this->input->post('lem');
		$gapok = $this->input->post('gaji');
		$Hari	= strtolower($this->input->post('jenis_hari'));
		$tot = $this->input->post('total');
		if ($lembur > 0)
		{
			if ($Hari == "biasa") {
				$tot = ($lembur * 2) - 0.5;
			} else if ($Hari == "libur") {
				$tot = $lembur * 2;
			}
		}

            $data=array(

            'tgl' => $this->input->post('tgl'),
			'jam_masuk' => $this->input->post('masuk'),
			'jam_pulang' => $this->input->post('pulang'),
			'jam_lembur' => $this->input->post('lem'),
			'total_lembur' => $tot,
			'nom_lembur' => $this->input->post('nom'),
            'ket' => $this->input->post('ket')
        );
        $this->model_gaji->simpanTmp($data);        
    }
	
	function tampil(){
	        $data['tmp']=$this->model_gaji->tampilTmp()->result();
	        $this->load->view('invoice/tampil',$data);
	    }
	
	function hapus(){
        $kode=$this->input->post('kode');
        $this->model_gaji->hapusTmp($kode);
    }
	
	function sukses(){
			$tmp=$this->model_gaji->tampilTmp()->result();
      		  foreach($tmp as $row) {
                  $data = array(
                      'kode' => $row->kode,
                      'tgl' => $row->tgl,
                      'nik' => $this->input->post('nik'),
                      'periode' => $this->input->post('periode'),
                      'jam_masuk' => $row->jam_masuk,
                      'jam_pulang' => $row->jam_pulang,
                      'jam_lembur' => $row->jam_lembur,
                      'total_lembur' => $row->total_lembur,
                      'nom_lembur' => $row->nom_lembur,
                      'ket' => $row->ket
                  );
                  $this->model_gaji->simpan_detail($data);
              }
				$gaji=array(
					'kode' => $row->kode,
					'nik' => $this->input->post('nik'),
					'id_karyawan' => $this->input->post('id_kar'),
					'jab' => $this->input->post('jab'),
					'gaji' => $this->input->post('gaji'),
					'periode' => $this->input->post('periode'),
					'id_partner' => $this->input->post('id_par')
				);
				$this->model_gaji->simpan($gaji);
		  //hapus data di temp
		  $this->model_gaji->hapusTemp();
    	}
  
    function delete_tmp($id){
	$this->model_gaji->delete_tmp($id);
	redirect('gaji/addview');
    }
	
	function edit($id){
		$data['judul']    = 'Edit Data gaji';
		$data['gaji']	  = $this->model_gaji->edit($id);
		$data['detail']	  = $this->model_gaji->detail($id);
		$this->template->utama('gaji/edit_gaji',$data);
	}

	function view($id){
		$data['judul']    = 'View Data gaji';
		$data['gaji']	  = $this->model_gaji->edit($id);
		$data['detail']	  = $this->model_gaji->detail($id);
		$this->template->utama('gaji/lihat_gaji',$data);
	}
	
	function update(){  
			$data = array( 
            'tgl_setuju' => $this->input->post('tgls'),
            'status' => $this->input->post('status')
                 		    
	        ); 
        $this->model_gaji->update(array('kode' => $this->input->post('kode')), $data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
		redirect('gaji/look');
    }
	
}
