<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanJadiKeluar extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('bj_keluar', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('bj_keluar');
		$this->db->join('bahan_jadi', 'bj_keluar.id_bj = bahan_jadi.id_bj', 'left');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_bj_keluar', $id);
		$this->db->update('bj_keluar', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_bj_keluar', $id);
		$this->db->delete('bj_keluar');
	}
}

/* End of file mBahanJadiKeluar.php */
