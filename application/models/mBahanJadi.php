<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanJadi extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('bahan_jadi', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('bahan_jadi');
		return $this->db->get()->result();
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('bahan_jadi');
		$this->db->where('id_bj', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_bj', $id);
		$this->db->update('bahan_jadi', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bj', $id);
		$this->db->delete('bahan_jadi');
	}

	public function detail_penjualan($id)
	{
		$this->db->select('*');
		$this->db->from('bj_keluar');
		$this->db->join('bahan_jadi', 'bj_keluar.id_bj = bahan_jadi.id_bj', 'left');
		$this->db->where('bahan_jadi.id_bj', $id);
		return $this->db->get()->result();
	}
}

/* End of file mBahanJadi.php */
