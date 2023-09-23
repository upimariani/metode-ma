<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

	public function lap_harian_transaksi($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('tran_bb');
		$this->db->join('detail_bb', 'tran_bb.id_tran_bb = detail_bb.id_tran_bb', 'left');
		$this->db->join('bahan_baku', 'detail_bb.id_bb = bahan_baku.id_bb', 'left');

		$this->db->where('tran_bb.stat_order=1');
		$this->db->where('DAY(tran_bb.tgl_tran)', $tanggal);
		$this->db->where('MONTH(tran_bb.tgl_tran)', $bulan);
		$this->db->where('YEAR(tran_bb.tgl_tran)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_bulanan_transaksi($bulan, $tahun)
	{

		$this->db->select('*');
		$this->db->from('tran_bb');
		$this->db->join('detail_bb', 'tran_bb.id_tran_bb = detail_bb.id_tran_bb', 'left');
		$this->db->join('bahan_baku', 'detail_bb.id_bb = bahan_baku.id_bb', 'left');

		$this->db->where('tran_bb.stat_order=1');
		$this->db->where('MONTH(tran_bb.tgl_tran)', $bulan);
		$this->db->where('YEAR(tran_bb.tgl_tran)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_tahunan_transaksi($tahun)
	{
		$this->db->select('*');
		$this->db->from('tran_bb');
		$this->db->join('detail_bb', 'tran_bb.id_tran_bb = detail_bb.id_tran_bb', 'left');
		$this->db->join('bahan_baku', 'detail_bb.id_bb = bahan_baku.id_bb', 'left');

		$this->db->where('tran_bb.stat_order=1');
		$this->db->where('YEAR(tran_bb.tgl_tran)', $tahun);
		return $this->db->get()->result();
	}

	//laporan peramalan
	public function bahan_baku()
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		return $this->db->get()->result();
	}
	public function peramalan($id)
	{
		$this->db->select('*');
		$this->db->from('analisis_ma');
		$this->db->join('bahan_baku', 'analisis_ma.id_bb = bahan_baku.id_bb', 'left');
		$this->db->where('analisis_ma.id_bb', $id);
		return $this->db->get()->result();
	}
}

/* End of file mlaporan.php */
