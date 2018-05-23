<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_calon extends CI_Model {

	var $table = 'calon';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_calon(){
		return $this->db->get('calon');
	}
	
	
	function tampilkan(){       	
       $this->db->FROM('calon');	   
       $query=$this->db->get();
       return $query->result();
    }

    function edit($data) {
        $this->db->insert('karyawan',$data);
    }
		
    function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_calon',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
    function tambah($data){    	
        $this->db->insert('calon',$data);
		return true;			
    }
	
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
	return $this->db->affected_rows();
    }

    public function delete_id($id)	{
	$this->db->where('id_calon', $id);
	$this->db->delete($this->table);
	}

	
}
