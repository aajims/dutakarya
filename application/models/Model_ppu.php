<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ppu extends CI_Model {

	var $table = 'ppu';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_ppu(){
		return $this->db->get($this->table);
	}
	
	function tampilkan($user){       	
       $this->db->FROM($this->table);
	   $this->db->WHERE('id_admin',$user);  
       $query=$this->db->get();
       return $query->result();
    }
	
	function tampil(){       	
       $this->db->SELECT('ppu.kode, ppu.no_ppu, ppu.dept, ppu.periode, ppu.ket, ppu.tgl_pengajuan, ppu.tgl_setuju, ppu.status, admin.nama_lengkap');
	   $this->db->WHERE('status!=',"Approved");
	   $this->db->join('admin','admin.id_admin=ppu.id_admin');
       $query=$this->db->get($this->table);
       return $query->result();
    }
    
    function tampill(){       	
       $this->db->SELECT('ppu.kode, ppu.no_ppu, ppu.dept, ppu.periode, ppu.ket, ppu.tgl_pengajuan, ppu.tgl_setuju, ppu.status, ppu.sts, admin.nama_lengkap');
	   $this->db->WHERE('status=',"Approved");
	   $this->db->join('admin','admin.id_admin=ppu.id_admin');
       $query=$this->db->get($this->table);
       return $query->result();
    }
	
	function edit($id){
       $this->db->SELECT('ppu.kode, ppu.no_ppu, ppu.dept, ppu.sts, ppu.email, ppu.periode, ppu.ket, ppu.keterangan, ppu.tgl_pengajuan, ppu.tgl_setuju, ppu.status, ppu.id_admin, admin.nama_lengkap');
	   $this->db->WHERE('ppu.kode',$id);
	   $this->db->FROM('ppu');
	   $this->db->join('admin','admin.id_admin=ppu.id_admin');
       $query = $this->db->get();
	   return $query->row();
    }
	
	function detail($id){
	   $this->db->FROM('ppu_detail');
	   $this->db->WHERE('kode',$id);  
       $query=$this->db->get();
       return $query->result();
    }
	
	function kode()   {    
	  $this->db->select('RIGHT(ppu.kode,1) as kode', FALSE);
	  $this->db->order_by('kode','DESC');    
	  $this->db->limit(1);     
	  $query = $this->db->get('ppu');        
	  if($query->num_rows() <> 0){       
	   //jika kode ternyata sudah ada.      
	   $data = $query->row();      
	   $kode = intval($data->kode) + 1;     
	  }
	  else{       
	   //jika kode belum ada      
	   $kode = 1;     
	  }
	  $today=date('d-h.i.s');
	  $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT);
	  $kodejadi = $today.$kodemax;
	  return $kodejadi;  
	 }
	
	function buatkode()   {    
	  $this->db->select('RIGHT(ppu.no_ppu,2) as kode', FALSE);
	  $this->db->order_by('no_ppu','DESC');    
	  $this->db->limit(1);
	  $query = $this->db->get('ppu');        
	  if($query->num_rows() <> 0){       
	   //jika kode ternyata sudah ada.      
	   $data = $query->row();      
	   $kode = intval($data->kode) + 1;     
	  }
	  else{       
	   //jika kode belum ada      
	   $kode = 01;
	  }
	  $today=date('Y-m');
	  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
	  if ($this->session->userdata('level') == 'HRD') {
		  $kodejadi = "FR-01/DKS-HRD/".$today.$kodemax;
	  } else if ($this->session->userdata('level') == 'GA') {
		  $kodejadi = "FR-02/DKS-GA/".$today.$kodemax;
	  } else if ($this->session->userdata('level') == 'OPERASIONAL') {
		  $kodejadi = "FR-03/DKS-OPS/".$today.$kodemax;
	  } else if ($this->session->userdata('level') == 'FINANCE') {
		  $kodejadi = "FR-04/DKS-FIN/".$today.$kodemax;
	  } else if ($this->session->userdata('level') == 'BPJS') {
		  $kodejadi = "FR-05/DKS-BPJS/".$today.$kodemax;
      } else if ($this->session->userdata('level') == 'MANAGER') {
          $kodejadi = "FR-05/DKS-MKT/".$today.$kodemax;
	  } else{
		  $kodejadi = "FR-06/DKS-MKT/".$today.$kodemax;
	  }  
	  return $kodejadi;  
	 }
			
    function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_ppu',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function tampilTmp(){
        $id = $this->session->userdata("id_admin");
		$this->db->from('tmp_ppu');
		$this->db->WHERE("tmp_ppu.id_admin", $id);
		$query = $this->db->get();
		return $query;
    }
	
	 function jumlahTmp(){
        $this->db->count_all("tmp_ppu");
    }
	
	function simpantmp($data){
        $this->db->insert("tmp_ppu",$data);
    }
	
	function cekTmp($kode){
        $this->db->where("id_tmp",$kode);
        return $this->db->get("tmp_ppu");
    }
	
	function hapusTmp($kode){
        $this->db->where("ket",$kode);
        $this->db->delete("tmp_ppu");
    }
	
	function hapusTemp(){        
       $this->db->delete_all("tmp_ppu");
    }
	
	function simpan($info){
        $this->db->insert("ppu",$info);
		return $this->db->insert_id();
    }
	
	function simpan_detail($data){
	    //$this->db->WHERE("ppu.id_admin",$id);
        $this->db->insert("ppu_detail",$data);
		return true;
    }
	
    function tambah($data){    	
        $this->db->insert($this->table,$data);
		return true;			
    }
	
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
	return $this->db->affected_rows();
    }

    public function delete_id($id)	{
        $this->db->where('kode', $id);
        $this->db->delete('ppu');
    }

    public function delete($id)	{
        $this->db->where('kode', $id);
        $this->db->delete('ppu_detail');
    }

    public function delete_tmp($id)	{
	$this->db->where('id_tmp', $id);
	$this->db->delete('tmp_ppu');
	}
	
	function laporan($from,$to,$sumber){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,kas_keluar.id_kas,guru.nm_guru,kas.dana');
		 $this->db->WHERE('kas_keluar.id_kas',$sumber);
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}
	
	function lapor($from,$to){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,guru.nm_guru,kas.dana');		
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}

	function laporan_pdf($from,$to,$sumber){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,guru.nm_guru,kas.dana');
		 $this->db->WHERE('kas_keluar.id_kas',$sumber);
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}

	function lapor_pdf($from,$to){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,guru.nm_guru,kas.dana');		
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}
	
}
