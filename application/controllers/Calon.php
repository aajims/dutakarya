 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Calon extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->model_squrity->getsqurity();
        $this->load->database();
		$this->load->helper('fungsidate');
        $this->load->model('model_calon');
        $this->load->library(array('template','pagination','secure_library','upload'));
        }

        
    function index(){
        $isi['judul']	= ' Halaman Calon Karyawan';
        $isi['calon']	= $this->model_calon->tampilkan();
        $this->template->utama('master/view_calon',$isi);        
	}
	
	 function look(){
        $isi['judul']    = ' Halaman Calon Karyawan';
        $isi['calon']     = $this->model_calon->tampilkan();
        $this->template->utama('master/view_calo',$isi);        
       }
	
	function addview(){
		$data['judul']    = 'Tambah Calon Karyawan';
		$this->template->utama('master/add_calon',$data);
	}
	
	function add(){ 
         $data = array(
            'no_ktp' => $this->input->post('ktp'),
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
			'ref' => $this->input->post('ref')			
        );
		
        $this->model_calon->tambah($data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Simpan');
		redirect('calon');
		}

	 function view($id){
    	 $data['judul']    = ' Halaman Profil Karyawan';
		 $data['kar'] = $this->model_calon->get_id($id);
		 $this->template->utama('master/v_calon',$data);
	}

	 function edit($id){
    	 $data['judul']    = ' Halaman Edit Karyawan';
		 $data['kar'] = $this->model_calon->get_id($id);
		 $this->template->utama('master/Edit_calon',$data);
		}

    function insert(){
        $id = $this->input->post('id');
        $data = array(
            'no_ktp' => $this->input->post('ktp'),
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
            'ref' => $this->input->post('ref')
        );
        $this->model_calon->edit($data);
        $sql = "DELETE FROM calon WHERE id_calon = '$id' ";
        $this->db->query($sql);

        //$this->model_calon->update(array('id_calon' => $this->input->post('id')), $data);
        $this->session->set_flashdata('success', 'Transaksi Berhasil di Pindah');
        redirect('calon');
    }
                
    function update(){  
			$data = array( 
            'no_ktp' => $this->input->post('ktp'),
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
			'ref' => $this->input->post('ref')	     		    
	        ); 
        $this->model_calon->update(array('id_calon' => $this->input->post('id')), $data);
		$this->session->set_flashdata('success', 'Transaksi Berhasil di Update');
		redirect('calon');
    }
  
    function delete($id){
	$this->model_calon->delete_id($id);
	echo json_encode(array("status" => TRUE));
    }
}
