<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function bahanbaku()
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		return $this->db->get()->result();
	}
	public function variabel($periode, $id_bb)
	{
		return $this->db->query("SELECT SUM(jml) as total, bahan_baku.id_bb, tgl_tran FROM `tran_bb` JOIN detail_bb ON tran_bb.id_tran_bb=detail_bb.id_tran_bb JOIN bahan_baku ON detail_bb.id_bb = bahan_baku.id_bb WHERE MONTH(tgl_tran) < '" . $periode . "' AND bahan_baku.id_bb='" . $id_bb . "' GROUP BY bahan_baku.id_bb, MONTH(tgl_tran) ORDER BY tgl_tran DESC LIMIT 3")->result();
	}
	public function periode($id)
	{
		return $this->db->query("SELECT MONTH(tgl_tran) as bulan, YEAR(tgl_tran) as tahun, bahan_baku.id_bb,SUM(jml) as total FROM `tran_bb` JOIN detail_bb ON tran_bb.id_tran_bb=detail_bb.id_tran_bb JOIN bahan_baku ON bahan_baku.id_bb=detail_bb.id_bb WHERE bahan_baku.id_bb='" . $id . "' GROUP BY MONTH(tgl_tran), YEAR(tgl_tran), bahan_baku.id_bb")->result();
	}
	public function insert_analisis($data)
	{
		$this->db->insert('analisis_ma', $data);
	}
	public function status_analisis($id, $data)
	{
		$this->db->where('id_detail_bb', $id);
		$this->db->update('detail_bb', $data);
	}
}

/* End of file mAnalisis.php */
