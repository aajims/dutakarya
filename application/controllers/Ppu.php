<?php
Class Ppu extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('fungsidate');
        $this->load->model('model_ppu');
        $this->load->library(array('template','session','upload','email'));
    }
        
    function index(){
    	$user = $this->session->userdata("id_admin");
        $isi['judul']    = ' Halaman Pengajuan Permintaan Uang';
        $isi['ppu']     = $this->model_ppu->tampilkan($user);
        $this->template->utama('ppu/view_ppu',$isi);        
       }
	
	function looks(){
        $isi['judul']    = ' Halaman Pengajuan Permintaan Uang';
        $isi['ppu']     = $this->model_ppu->tampil();
        $this->template->utama('ppu/view_ppud',$isi);        
       }
	
	function look(){
        $isi['judul']    = ' Halaman Pengajuan Permintaan Uang';
        $isi['ppu']     = $this->model_ppu->tampil();
        $this->template->utama('ppu/view_ppum',$isi);        
       }
       
     function approve(){
        $isi['judul']    = 'Halaman PPU yang Sudah Approve';
        $isi['ppu']     = $this->model_ppu->tampill();
        $this->template->utama('ppu/view_ppuc',$isi);        
       }
	
	function addview(){
        $id = $this->session->userdata('id_admin');
		$data['judul']    = 'Tambah PPU';
		$data['kode']		= $this->model_ppu->kode();
		$data['kodeunik'] = $this->model_ppu->buatkode();
		$this->template->utama('ppu/add_ppu',$data, $id);
	}
	
	function tambahrinci(){    	
            $data=array(
            'kete' => $this->input->post('kete'),
            'jumlah' => $this->input->post('jum'),
            'id_admin' => $this->session->userdata('id_admin')
        );
        $this->model_ppu->simpanTmp($data);        
    }
	
	function tampil(){
	        $data['tmp']=$this->model_ppu->tampilTmp()->result();
	        $data['jumlahTmp']=$this->model_ppu->jumlahTmp();
	        $this->load->view('ppu/tampil',$data);
	    }
	
	function hapus(){
        $kode=$this->input->post('kode');
        $this->model_ppu->hapusTmp($kode);
    }
	
	function sukses(){
			$tmp=$this->model_ppu->tampilTmp()->result();
      		  foreach($tmp as $row) {
                  $data = array(
                      'kode' => $this->input->post('kode'),
                      'no_ppu' => $this->input->post('no'),
                      'ket' => $row->kete,
                      'jumlah' => $row->jumlah,
                      'tgl_pengajuan' => date('Y-m-d')
                  );
                  $this->model_ppu->simpan_detail($data);
              }
                  $info = array(
                      'kode' => $this->input->post('kode'),
                      'no_ppu' => $this->input->post('no'),
                      'tgl_pengajuan' => date('Y-m-d'),
                      'dept' => $this->session->userdata('level'),
                      'periode' => $this->input->post('per'),
                      'ket' => $this->input->post('rinc'),
                      'keterangan' => $this->input->post('ket'),
                      'status' => 'Di ajukan',
                      'notif' => '1',
                      'email' => $this->session->userdata('email'),
                      'id_admin' => $this->session->userdata('id_admin')
                  );

                  $this->model_ppu->simpan($info);

			//Config Email
            /* $Pengguna = $this->session->userdata('username');

             $config = Array(
              'protokol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => '465',
              'smtp_user' => 'dutakaryadks@gmail.com',
              'smtp_pass' => 'nabhan07',
              'mailtype' => 'html',
              'charset' => 'iso-8859-1'
            );
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->set_mailtype("html");

                $this->email->from('dutakaryadks@gmail.com', 'Aplikasi Dks');
                $this->email->to('nbhnazfar@gmail.com');
                $this->email->subject('Pengajuan Data PPU');
                $this->email->message('<h2>Dear Bapak/Ibu,</h2><h3>Penginputan PPU (Pengajuan Permintaan Uang) telah di lakukan oleh <strong>$Pengguna</strong>,</h3>
            <br><br><h3>untuk keterangan lebih detail silahkan kunjungi http://app.dutakarya.co.id/ppu</h3>
                    <br><br><h4Terima Kasih,<br><br><br><strong>Admin Dks</strong></h4>');

                $this->email->send();*/

		  //hapus data di temp
           $sql = "DELETE FROM tmp_ppu";
		   $this->db->query($sql);
        $this->session->set_flashdata('success', 'Transaksi PPU Anda Berhasil di Simpan');
        redirect('ppu');
    }
  
    function delete_tmp($id){
	$this->model_ppu->delete_tmp($id);
	redirect('ppu/addview');
    }

    function delete($id){
        $this->model_ppu->delete_id($id);
        $this->model_ppu->delete($id);
        redirect('ppu');
    }
	
	function edit($id){
		$data['judul']    = 'Edit Data PPU';
		$data['ppu']	  = $this->model_ppu->edit($id);
		$data['detail']	  = $this->model_ppu->detail($id);
		$this->template->utama('ppu/edit_ppu',$data);
	}

    function editc($id){
        $data['judul']    = 'Edit Data PPU';
        $data['ppu']	  = $this->model_ppu->edit($id);
        $data['detail']	  = $this->model_ppu->detail($id);
        $this->template->utama('ppu/edit_ppuc',$data);
    }
	
	function vieww($id){
		$data['judul']    = 'View Data PPU';
		$data['ppu']	  = $this->model_ppu->edit($id);
		$data['detail']	  = $this->model_ppu->detail($id);
		$this->template->utama('ppu/v_ppu',$data);
	}

	function view($id){
		$data['judul']    = 'View Data PPU';
		$data['ppu']	  = $this->model_ppu->edit($id);
		$data['detail']	  = $this->model_ppu->detail($id);
		$this->template->utama('ppu/lihat_ppu',$data);
	}
	
	function update(){  
			$data = array( 
            'tgl_setuju' => $this->input->post('tgls'),
            'status' => $this->input->post('status')
	        ); 
        $this->model_ppu->update(array('kode' => $this->input->post('kode')), $data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
		redirect('ppu/look');
        //Config Email
        $Pengguna = $this->session->userdata('username');
        $emailku = $this->input->post('email');
        $isiEmail = "<h2>Dear Bapak/Ibu,</h2><h3>Update data PPU (Pengajuan Permintaan Uang) telah di lakukan oleh <strong>$Pengguna</strong>,<br>untuk keterangan lebih detail silahkan kunjungi http://app.dutakarya.co.id/ppu
                    <br><br>Terima Kasih,<br><br><br><strong>Admin Dks</strong></h3>";
        $config = Array(
            'protokol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'dutakaryadks@gmail.com',
            'smtp_pass' => 'nabhan07',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('dutakaryadks@gmail.com', 'Aplikasi Dks');
        $this->email->to('nbhnazfar@gmail.com');
        $this->email->subject('Update Data PPU');
        $this->email->message($isiEmail);

        $this->email->send();
    }

    function updatec()
    {
        $data = array(
            'tgl_setuju' => $this->input->post('tgls'),
            'sts' => $this->input->post('sts')
        );
        $this->model_ppu->update(array('kode' => $this->input->post('kode')), $data);
        $this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
        redirect('ppu/approve');
    }
}