<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBBKeluar extends CI_Model
{
	public function stok_bb()
	{
		$this->db->select('*');
		$this->db->from('detail_bb');
		$this->db->join('bahan_baku', 'detail_bb.id_bb = bahan_baku.id_bb', 'left');
		$this->db->where('sisa!=0');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('bb_keluar', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('bb_keluar');
		$this->db->join('detail_bb', 'bb_keluar.id_detail_bb = detail_bb.id_detail_bb', 'left');
		$this->db->join('bahan_baku', 'detail_bb.id_bb = bahan_baku.id_bb', 'left');
		$this->db->join('bahan_jadi', 'bahan_jadi.id_bj = bb_keluar.id_bj', 'left');

		return $this->db->get()->result();
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('bb_keluar');
		$this->db->join('detail_bb', 'bb_keluar.id_detail_bb = detail_bb.id_detail_bb', 'left');
		$this->db->where('id_bb_keluar', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_bb_keluar', $id);
		$this->db->update('bb_keluar', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bb_keluar', $id);
		$this->db->delete('bb_keluar');
	}
}

/* End of file mBBKeluar.php */
