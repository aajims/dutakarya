<?php
Class Wo extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
		$this->load->helper('fungsidate');
        $this->load->model('model_wo');
        $this->load->library(array('template','form_validation','upload'));
    }
        
    function index(){
    	$user = $this->session->userdata("id_admin");
        $isi['judul']    = ' Halaman Data WO';
        $isi['wo']     = $this->model_wo->tampilkan($user);
        $this->template->utama('kegiatan/view_wo',$isi);
       }
	
	function view(){
        $isi['judul']    = ' Halaman WO';
        $isi['wo']     = $this->model_wo->tampil();
        $this->template->utama('kegiatan/lihat_wo',$isi);
       }
	
	function addview(){
		$data['judul']    = 'Tambah Data WO';
		$this->template->utama('kegiatan/add_wo',$data);
	}
       
     function tambah(){
        $data = array(
            'nama'  =>  $this->input->post('nama'),
            'keterangan'=>  $this->input->post('ket'),
            'status'=>  $this->input->post('status'),
            'tgl'=>  date('Y-m-d'),
            'id_admin'=>  $this->session->userdata('id_admin'),
        );
        $this->model_wo->tambah($data);
      	$this->session->set_flashdata('success', 'Transaksi Berhasil di Simpan');
		redirect('wo');
    }
    
	function edit($id){
		$data = $this->model_wo->get_id($id);
		echo json_encode($data);
	}
	
	function update(){
         $data = array(
             'nama'  =>  $this->input->post('nama'),
             'keterangan'=>  $this->input->post('ket'),
             'status'=>  $this->input->post('status'),
             'tgl'=>  date('Y-m-d'),
        );
       $this->model_wo->update(array('id_wo' => $this->input->post('id_wo')), $data);
	echo json_encode(array("status" => TRUE));
    }
	
    function delete($id){
		$this->model_wo->delete_id($id);
		echo json_encode(array("status" => TRUE));
    }
}
