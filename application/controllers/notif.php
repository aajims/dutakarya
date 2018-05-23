<?php
Class Notif extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_notif');
    }
        
    function index(){
        $isi['jnotif']     = $this->model_notif->jum_notif();
		$isi['getnotif']     = $this->model_notif->get_notif();
        $this->load->view('template/topbar',$isi);
       }

	function load_row(){
        //if ( ! empty($notif = $this->model_notif->jum_notif())) {
           echo '1';
        //}
		// echo $this->model_notif->jum_notif();
	}

	function view(){
		echo $this->model_notif->count();

	}

	function load_data(){
		$data['ppu_notif'] = $this->model_notif->get_notif();
		$this->load->view('view_notif', $data);
	}
}
