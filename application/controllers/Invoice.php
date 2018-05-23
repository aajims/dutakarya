<?php
Class Invoice extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('fungsidate');
        $this->load->model('model_invoice');
        $this->load->library(array('template','pagination','secure_library','upload'));
        if ( ! is_login())
        {
            redirect(base_url('auth'));
        }
    }
	public function index(){
        $isi['judul']    = ' Invoice';
        $isi['invoice']     = $this->model_invoice->tampilkan();
        $this->template->utama('invoice/view_invoice',$isi);
	}
	public function add() {
		$isi['judul']    = ' Tambah Invoice';
        $this->template->utama('invoice/add_invoice',$isi);
	}
	public function search($nm_kar = null){
		if (is_null($nm_kar))
		{
			redirect('invoice');
		}
		$json = [];
		foreach ($this->model_invoice->search($nm_kar) as $row) {
			$json['query'] = $nm_kar;
			$json['suggestions'][] = array(
				'value'	=>$row['nm_karyawan'],
				'nama_karyawan' => $row['nm_karyawan'],
				'gaji_pokok' => $row['gaji_pokok'],
				'hari_kerja' => $row['hari_kerja'],
				'id_karyawan' => $row['id_karyawan'],
				'lembur' => $row['lembur']
			);
		}
		echo json_encode($json);
	}
	public function detail($id) {
		$isi['judul']    = ' Detail Invoice';
        $isi['inv']     = $this->model_invoice->tampilkan($id)[0];
        $this->template->utama('invoice/detail_invoice',$isi);
	}
	public function save() {
		$data = [
			'periode' => $this->input->post('periode'),
			'customer' => $this->input->post('customer'),
			'id_karyawan' => $this->input->post('id_kar'),
			'jum_hari' => $this->input->post('harikerja'),
			'gaji' => $this->input->post('gaji'),
			'tunj_hadir' => $this->input->post('tunjhadir'),
			'lembur' => $this->input->post('lembur'),
			'lebih_hari' => 0,
			'tunj_dinas' => $this->input->post('tunjdinas'),
			'sub_total' => $this->input->post('subtotal1'),
			'bpjs_tk' => $this->input->post('bpjs-tk'),
			'bpjs_kes' => $this->input->post('bpjs-kes'),
			'thr' => $this->input->post('thr'),
			'tunj_tali' => $this->input->post('tunjtaliasih'),
			'seragam' => $this->input->post('seragam'),
			'sub_total2' => $this->input->post('subtotal2'),
			'fee' => $this->input->post('fee'),
			'sub_total3' => $this->input->post('subtotal3'),
			'ppn' => $this->input->post('ppn'),
			'total' => $this->input->post('total')
		]; 
		// $nama = $this->input->post('nama');
		// $id_kar = $this->input->post('id_kar');
		// $gaji = $this->input->post('gaji');
		// $periode = ;
		// $tunjdinas = $this->input->post('tunjdinas');
		// $harikerja = $this->input->post('harikerja');
		// $seragam = $this->input->post('seragam');
		// $tunjhadir = $this->input->post('tunjhadir');
		// $lembur = $this->input->post('lembur');
		// $subtotal1 = $this->input->post('subtotal1');
		// $bpjs_tk = $this->input->post('bpjs-tk');
		// $bpjs_kes = $this->input->post('bpjs-kes');
		// $thr = $this->input->post('thr');
		// $tunjtaliasih = $this->input->post('tunjtaliasih');
		// $subtotal2 = $this->input->post('subtotal2');
		// $fee = $this->input->post('fee');
		// $subtotal3 = $this->input->post('subtotal3');
		// $ppn = $this->input->post('ppn');
		// $total = $this->input->post('total');
		
		$this->model_invoice->save($data);
		echo json_encode(true);
	}
}
