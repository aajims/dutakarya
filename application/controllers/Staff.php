<?php
Class Staff extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_admin');
        $this->load->library(array('template','pagination','upload'));
        if ( ! is_login())
        {
            redirect(base_url('auth'));
        }
    }
        
    function index(){
        $isi['judul']    = 'Halaman Staff';        
        $isi['admin']     = $this->model_admin->tampilkan();
        $this->template->utama('master/view_admin',$isi);
        
       }
       
       function tambah(){
        $data = array(
            'username' => $this->input->post('user'),
            'password' => md5($this->input->post('pass')),
            'nama_lengkap' => $this->input->post('nama'),
            'no_telp' => $this->input->post('telp'),
            'email'=>  $this->input->post('email'),
			'level'=>  $this->input->post('level'),
        );
        $this->model_admin->tambah($data);
       echo json_encode(array("status" => TRUE));
    }
    
    function edit($id){
	$data = $this->model_admin->get_id($id);
	echo json_encode($data);
		}
                
    function update(){
          if ($this->input->post('pass')) { 
         $data = array(            
            'username' => $this->input->post('user'),
            'password' => md5($this->input->post('pass')),
            'nama_lengkap' => $this->input->post('nama'),
            'no_telp' => $this->input->post('telp'),
            'email'=>  $this->input->post('email'),
            'level'=>  $this->input->post('level')             
        );
        } else {
            $data = array(            
            'username' => $this->input->post('user'),            
            'nama_lengkap' => $this->input->post('nama'),
            'no_telp' => $this->input->post('telp'),
            'email'=>  $this->input->post('email'),
            'level'=>  $this->input->post('level')            
			);
        }	
       $this->model_admin->update(array('id_admin' => $this->input->post('id_admin')), $data);
	echo json_encode(array("status" => TRUE));
    }
    
    function delete($id){
	$this->model_admin->delete_id($id);
	echo json_encode(array("status" => TRUE));
    }
}
