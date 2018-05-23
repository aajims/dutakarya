<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wo extends CI_Model {

	var $table = 'wo';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_wo()
	{
		return $this->db->get($this->table);
	}
	
	function tampilkan($user){
	   $this->db->FROM($this->table);
	   $this->db->ORDER_BY('');
	   $this->db->WHERE('id_admin',$user);  
       $query=$this->db->get();
       return $query->result();
	}
	
	function tampil(){
	   $this->db->SELECT('*');
	   $this->db->FROM($this->table);
	   $this->db->join('admin','admin.id_admin=wo.id_admin', 'LEFT');
       $query=$this->db->get();
       return $query->result();
	}
			

	function get($id){
		$this->db->from($this->table);
		$this->db->where('id_wo',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_wo',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
    function tambah($data){
    	return $this->db->insert($this->table,$data);
    }
	   
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	    }

    public function delete_id($id)	{
	$this->db->where('id_wo', $id);
	$this->db->delete($this->table);
	}
	
	
}
