<?php //if(!define('BASEPATH')) exit('No direct script access allowed');
Class Model_invoice extends CI_Model {
	public function tampilkan($id = null) {
		$this->db->select('partner.nm_partner,karyawan.nm_karyawan,invoice.id_invoice,invoice.periode,invoice.jum_hari,invoice.gaji,invoice.tunj_hadir,invoice.lembur,invoice.lebih_hari,invoice.tunj_dinas,invoice.sub_total,invoice.bpjs_tk,invoice.bpjs_kes,invoice.thr,invoice.tunj_tali,invoice.seragam,invoice.sub_total2,invoice.fee,invoice.sub_total3,invoice.ppn,invoice.total');
		$this->db->join('invoice', 'invoice.id_karyawan=karyawan.id_karyawan');
		$this->db->join('partner', 'invoice.customer=partner.id_partner');
		if ( ! is_null($id)) {
			$this->db->where('invoice.id_invoice', $id);
		}
		$query = $this->db->get('karyawan');
		return $query->result();
	}
	public function search($nm_kar) {
		$result = $this->db->select('kd_karyawan,id_karyawan,gaji_pokok,nm_karyawan')->like('nm_karyawan', $nm_kar)->get('karyawan')->result();
		$array = [];
		foreach($result as $kar) {
			// $this->db-
			
			// $arr['query'] = $keyword;
				// $arr['suggestions'][] = array(
					// 'value'	=>$row->nm_karyawan,
					// 'kar'	=>$row->nm_karyawan,
					// 'id_kar' =>$row->id_karyawan,
					// 'jabatan'	=>$row->jabatan,
					// 'gaji'	=>$row->gaji_pokok,	
					// 'nik'	=>$row->nik					
				// );
			// $arrya[] = 
			$hari_kerja = $this->db->select('id_karyawan,kode')->where('id_karyawan', $kar->id_karyawan)->get('gaji');
			$lembur = [];
			foreach ($hari_kerja->result() as $hk) {
				$lembur[] = $this->db->select('nom_lembur')->where('kode', $hk->kode)->get('gaji_detail')->row()->nom_lembur;
			}
			$array[] = [
				'id_karyawan' => $kar->id_karyawan,
				'kd_karyawan' => $kar->kd_karyawan,
				'nm_karyawan' => $kar->nm_karyawan,
				'gaji_pokok'  => $kar->gaji_pokok,
				'lembur' => array_sum($lembur),
				'hari_kerja' => $hari_kerja->num_rows()
			];
		}
		return $array;
	}
	public function save($data) {
		return $this->db->insert('invoice', $data);
	}
}
