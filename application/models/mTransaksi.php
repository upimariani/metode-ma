<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('tran_bb');
		$this->db->join('user', 'tran_bb.id_user = user.id_user', 'left');
		$this->db->order_by('tgl_tran', 'desc');

		return $this->db->get()->result();
	}
	public function bahan_baku($id)
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->where('id_user', $id);
		return $this->db->get()->result();
	}
	public function insert_po_bb($data)
	{
		$this->db->insert('tran_bb', $data);
	}
	public function insert_pesanan($data)
	{
		$this->db->insert('detail_bb', $data);
	}
	public function detail($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `tran_bb` JOIN user ON tran_bb.id_user=user.id_user WHERE id_tran_bb='" . $id . "'")->row();
		$data['detail'] = $this->db->query("SELECT * FROM `tran_bb` JOIN detail_bb ON tran_bb.id_tran_bb=detail_bb.id_tran_bb JOIN bahan_baku ON bahan_baku.id_bb=detail_bb.id_bb WHERE tran_bb.id_tran_bb='" . $id . "'")->result();
		return $data;
	}

	//transaksi supplier
	public function select_supplier()
	{
		$this->db->select('*');
		$this->db->from('tran_bb');
		$this->db->join('user', 'tran_bb.id_user = user.id_user', 'left');

		$this->db->where('user.id_user', $this->session->userdata('id'));
		$this->db->order_by('tgl_tran', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file mTransaksi.php */
