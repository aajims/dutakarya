<?php
Class Profil extends CI_Controller{
       
         
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
        $this->load->model('model_profil');
        $this->load->library(array('template','pagination','form_validation','upload'));
        if ( ! is_login())
        {
            redirect(base_url('auth'));
        }
    }
        
    function index(){
    	$username= $this->session->userdata("username");
        $isi['judul']    = ' Halaman Profil';
        $isi['profil']     = $this->model_profil->tampilkan($username);
		$isi['message'] = $this->session->flashdata('edit_message');
        $this->template->utama('master/view_profil',$isi);
        
       }
       
	function edit()
	{
		$username= $this->session->userdata("username");
		$isi['judul']  = 'Edit Profil';
		$isi['profil'] = $this->model_profil->tampilkan($username);
		$isi['row']    = $this->model_profil->get_id($this->session->userdata('id_admin'));
		// $data = $this->model_profil->get_id($id);
		// echo json_encode($data);
		$this->template->utama('master/edit_profil', $isi);
	}
	          
    function update(){
 		$pass = $this->input->post('pass');
 		$filelama = $this->input->post('filelama');
		$path 						= FCPATH . 'Admin/images/staff/';
	  	$config['upload_path'] 		= $path;
		$config['allowed_types'] 	= 'jpeg|jpg|png';
		$config['max_size']			= '512';
		$config['max_width']  		= '2700';
		$config['max_height'] 		= '2724';
		$config['file_ext_tolower'] = true;
		$config['file_name'] 		= date('dmYHi');
		$this->upload->initialize($config);
		$gambar = null;
		$data 	= array(            	
			'username'		=> $this->input->post('user'),
			'nama_lengkap' 	=> $this->input->post('nama'),
			'no_telp' 		=> $this->input->post('telp'),
			'email'			=> $this->input->post('email')                
		);
		if ( ! empty($pass))
		{
			$data['password'] = md5($pass);
		}
		if ( ! empty($_FILES['gambar']))
		{
			if ($this->upload->do_upload('gambar'))
			{
				@unlink($path.$filelama);
				$gambar = $this->upload->data('file_name');
				$data['foto'] = $gambar;
			}
			$this->model_profil->update(array('id_admin' => $this->input->post('id_admin')), $data);
			$this->session->set_flashdata(array('edit_message' => 'ok'));
			redirect(site_url().'/profil');
		}
	  //   	$filelama   = $this->input->post('filelama');
	  //   	$path = './Admin/images/staff/';
	  //   	$config['upload_path'] = $path;
		 //    $config['allowed_types'] = 'jpeg|jpg|png';
		 //    $config['max_size']	= '512';
		 //    $config['max_width']  = '2700';
		 //    $config['max_height']  = '2724';
			// $config['file_name']   = trim(str_replace(" ","",date('dmYHi')));		              
	  //       if($this->upload->do_upload('gambar')){
	  //       	// @unlink($path.$filelama);
	  //           $gambar=$this->upload->file_name;
   //          $data=array(            	
   //              'username'=>$this->input->post('user'),
	  //           'password' => md5($this->input->post('pass')),
	  //           'nama_lengkap' => $this->input->post('nama'),
	  //           'no_telp' => $this->input->post('telp'),
	  //           'foto' => $gambar,
	  //           'email'=>  $this->input->post('email')                
	  //           );
	           
			// } else {
			// 	 $data=array(            	
   //              'username'=>$this->input->post('user'),
	  //           'nama_lengkap' => $this->input->post('nama'),
	  //           'no_telp' => $this->input->post('telp'),
	  //           'email'=>  $this->input->post('email')
			// );	
				/*if ($this->upload->do_upload('gambar')) {
					@unlink($path.$filelama);
		            $gambar=$this->upload->file_name;
					 $data=array(            	
	                'username'=>$this->input->post('user'),
		            'nama_lengkap' => $this->input->post('nama'),
		            'no_telp' => $this->input->post('telp'),
		            'foto' => $gambar,
		            'email'=>  $this->input->post('email')
				  );	
				} elseif($this->input->post('pass')){
					 $data=array(            	
		                'username'=>$this->input->post('user'),
		                'password' => md5($this->input->post('pass')),
			            'nama_lengkap' => $this->input->post('nama'),
			            'no_telp' => $this->input->post('telp'),
			            'email'=>  $this->input->post('email')
					);	
				}*/
				
		 //  }
   //          $this->model_profil->update(array('id_admin' => $this->input->post('id_admin')), $data);
			// echo json_encode(array("status" => TRUE));       
		}
                
   
    
    function delete($id){
	$this->model_admin->delete_id($id);
	echo json_encode(array("status" => TRUE));
    }
}
