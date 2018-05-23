<?php
Class Karyawan extends CI_Controller{
       
         
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
        $isi['judul']    = ' Halaman Karyawan';
        $isi['karyawan']     = $this->model_karyawan->tampilkan();
        $this->template->utama('master/view_karyawan',$isi);        
       }
	
	 function look(){
        $isi['judul']    = ' Halaman Karyawan';
        $isi['karyawan']     = $this->model_karyawan->tampilkan();
        $this->template->utama('master/view_karyaw',$isi);        
       }
	
	function addview(){
		$data['judul']    = 'Add Karyawan';	
		$data['kodeunik'] = $this->model_karyawan->buat_kode();	
		$this->template->utama('master/Add_karyawan',$data);
	}
	
	function add(){    
		$config['upload_path'] = './Admin/images/karyawan/';
	    $config['allowed_types'] = 'jpeg|jpg|png';
	    $config['max_size']	= '1000';
	    $config['max_width']  = '2700';
	    $config['max_height']  = '2724';
		$config['file_name']   = trim(str_replace(" ","",date('dmYHi')));		              
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            } 
         $data = array(
            'kd_karyawan' => $this->input->post('kode'),
            'nik' => $this->input->post('nik'),
            'no_pkwt' => $this->input->post('pkwt'),
            'no_mou' => $this->input->post('mou'),
            'no_ktp' => $this->input->post('ktp'),
            'no_npwp' => $this->input->post('npwp'),
            'no_kpj' => $this->input->post('kpj'),
            'no_bpjs' => $this->input->post('bpjs'),            
            'nm_karyawan' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
			'provinsi' => $this->input->post('prov'),
			'no_telepon' => $this->input->post('telp'), 
			'no_telp' => $this->input->post('telp2'),            
            'agama'=>  $this->input->post('agama'),
            'kelamin' => $this->input->post('jk'),            
			'tempat_lahir' => $this->input->post('tempat'),
			'tgl_lahir' => $this->input->post('tgl'),
			'status_kawin' => $this->input->post('status'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'pendidikan' => $this->input->post('didik'),
			'status_karyawan' => $this->input->post('sts'),
			'id_partner' => $this->input->post('partner'),
			'manager' => $this->input->post('manager'),
			'awal_kontrak' => $this->input->post('tgl_awal'),
			'akhir_kontrak' => $this->input->post('tgl_akhir'),
			'id_bank' => $this->input->post('bank'),
			'no_rek' => $this->input->post('rek'),
			'size_baju' => $this->input->post('baju'),
			'size_celana' => $this->input->post('celana'),
			'size_sepatu' => $this->input->post('sepatu'),
			'penempatan' => $this->input->post('lokasi'),
			'kontrak_ke' => $this->input->post('kontrak'),
			'sebab_henti' => $this->input->post('stop'),
			'ref' => $this->input->post('ref'),
			'sts_aktif' => $this->input->post('sts_aktif'),
			'foto_karyawan' => $gambar
        );
		
        $this->model_karyawan->tambah($data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Simpan');
		redirect('Karyawan');
		}

	 function view($id){
    	 $data['judul']    = ' Halaman Profil Karyawan';
		 $data['kar'] = $this->model_karyawan->get($id);
		 $this->template->utama('master/v_karyawan',$data);
	}

	 function edit($id){
    	 $data['judul']    = ' Halaman Edit Karyawan';
		 $data['kar'] = $this->model_karyawan->get($id);
		 $this->template->utama('master/Edit_karyawan',$data);
		}
                
    function update(){    	
		$filelama   = $this->input->post('filelama');
    	$path = './Admin/images/karyawan/';
    	$config['upload_path'] = $path;
	    $config['allowed_types'] = 'jpeg|jpg|png';
	    $config['max_size']	= '1000';
	    $config['max_width']  = '2700';
	    $config['max_height']  = '2724';
		$config['file_name']    = trim(str_replace(" ","",date('dmYHi')));
	               
        $this->upload->initialize($config);
         if($this->upload->do_upload('gambar')){
        	@unlink($path.$filelama);
            $gambar=$this->upload->file_name;
			$data = array(            
		        'kd_karyawan' => $this->input->post('kode'),
	           'nik' => $this->input->post('nik'),
                'no_pkwt' => $this->input->post('pkwt'),
                'no_mou' => $this->input->post('mou'),
                'no_ktp' => $this->input->post('ktp'),
                'no_npwp' => $this->input->post('npwp'),
                'no_kpj' => $this->input->post('kpj'),
                'no_bpjs' => $this->input->post('bpjs'),            
                'nm_karyawan' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
    			'provinsi' => $this->input->post('prov'),
    			'no_telepon' => $this->input->post('telp'),
    			'no_telp' => $this->input->post('telp2'),            
                'agama'=>  $this->input->post('agama'),
                'kelamin' => $this->input->post('jk'),            
    			'tempat_lahir' => $this->input->post('tempat'),
    			'tgl_lahir' => $this->input->post('tgl'),
    			'status_kawin' => $this->input->post('status'),
    			'tgl_masuk' => $this->input->post('tgl_masuk'),
    			'pendidikan' => $this->input->post('didik'),
    			'status_karyawan' => $this->input->post('sts'),
    			'id_partner' => $this->input->post('partner'),
    			'manager' => $this->input->post('manager'),
    			'awal_kontrak' => $this->input->post('tgl_awal'),
    			'akhir_kontrak' => $this->input->post('tgl_akhir'),
    			'id_bank' => $this->input->post('bank'),
    			'no_rek' => $this->input->post('rek'),
    			'size_baju' => $this->input->post('baju'),
    			'size_celana' => $this->input->post('celana'),
    			'size_sepatu' => $this->input->post('sepatu'),
    			'penempatan' => $this->input->post('lokasi'),
    			'kontrak_ke' => $this->input->post('kontrak'),
    			'sebab_henti' => $this->input->post('stop'),
    			'ref' => $this->input->post('ref'),
    			'sts_aktif' => $this->input->post('sts_aktif'),
				'foto_karyawan' => $gambar            		    
	        ); 
	       } else {
			   $data = array(            
		        'kd_karyawan' => $this->input->post('kode'),
	            'nik' => $this->input->post('nik'),
                'no_pkwt' => $this->input->post('pkwt'),
                'no_mou' => $this->input->post('mou'),
                'no_ktp' => $this->input->post('ktp'),
                'no_npwp' => $this->input->post('npwp'),
                'no_kpj' => $this->input->post('kpj'),
                'no_bpjs' => $this->input->post('bpjs'),            
                'nm_karyawan' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
    			'provinsi' => $this->input->post('prov'),
    			'no_telepon' => $this->input->post('telp'),            
                'no_telp' => $this->input->post('telp2'),
                'agama'=>  $this->input->post('agama'),
                'kelamin' => $this->input->post('jk'),            
    			'tempat_lahir' => $this->input->post('tempat'),
    			'tgl_lahir' => $this->input->post('tgl'),
    			'status_kawin' => $this->input->post('status'),
    			'tgl_masuk' => $this->input->post('tgl_masuk'),
    			'pendidikan' => $this->input->post('didik'),
    			'status_karyawan' => $this->input->post('sts'),
    			'id_partner' => $this->input->post('partner'),
    			'manager' => $this->input->post('manager'),
    			'awal_kontrak' => $this->input->post('tgl_awal'),
    			'akhir_kontrak' => $this->input->post('tgl_akhir'),
    			'id_bank' => $this->input->post('bank'),
    			'no_rek' => $this->input->post('rek'),
    			'size_baju' => $this->input->post('baju'),
    			'size_celana' => $this->input->post('celana'),
    			'size_sepatu' => $this->input->post('sepatu'),
    			'penempatan' => $this->input->post('lokasi'),
    			'kontrak_ke' => $this->input->post('kontrak'),
    			'sebab_henti' => $this->input->post('stop'),
    			'ref' => $this->input->post('ref'),
				'sts_aktif' => $this->input->post('sts_aktif')        		    
	        ); 
		   }       
        $this->model_karyawan->update(array('id_karyawan' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
		redirect('Karyawan');
    }
  
    function delete($id){
	$this->model_karyawan->delete_id($id);
	echo json_encode(array("status" => TRUE));
    }
	
	function lap(){
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
		$tgl = date('d F Y h:i:sa');		
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
		
		$pdf->Cell(0, 2, "Bekasi,  ".date('d/m/Y h:i:s', strtotime($tgl)), 0, 1, 'L');
		$pdf->Ln(19);
		$pdf->Cell(0, 1, "PD Manager ", 0, 1, 'R');
		$pdf->Cell(0, 1, "$nama ", 0, 1, 'L');
		$pdf->Output();
	}
}
