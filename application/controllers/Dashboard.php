<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
     function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model(array('model_partner','model_admin','model_karyawan'));
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('template','pagination','form_validation','upload'));
        if ( ! is_login())
        {
            redirect(base_url('auth'));
        }
    }

	public function index(){
            $isi['judul']    = 'Dashboard';	
			$isi['time']	 =	date('Y-m-d H:i:s');
			/*$isi['trans']	= $this->model_transaksi->tampil_masuk()->num_rows();*/
			$isi['partner']	= $this->model_partner->tampil_partner()->num_rows();
			$isi['karyawan']	= $this->model_karyawan->tampil_karyawan()->num_rows();
			$isi['admin']	= $this->model_admin->tampil_admin()->num_rows();          
            $this->template->utama('dashboard',$isi);
		
	}
}
