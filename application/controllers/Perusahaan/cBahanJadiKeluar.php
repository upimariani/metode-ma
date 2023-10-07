<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanJadiKeluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanJadiKeluar');
		$this->load->model('mBahanJadi');
	}

	public function index()
	{
		$data = array(
			'bj_keluar' => $this->mBahanJadiKeluar->select(),
			'bj' => $this->mBahanJadi->select()
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/BahanJadiKeluar/vBahanJadi', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function create()
	{
		$id_bj = $this->input->post('bj');
		$stok = $this->input->post('stok');
		$qty = $this->input->post('qty');
		if ($qty > $stok) {
			$this->session->set_flashdata('error', 'Stok Bahan Jadi Tidak Tersedia!');
			redirect('Perusahaan/cBahanJadiKeluar');
		} else {
			$data = array(
				'id_bj' => $this->input->post('bj'),
				'tgl_jual' => date('Y-m-d'),
				'quantity' => $this->input->post('qty')
			);
			$this->mBahanJadiKeluar->insert($data);

			//stok bahan jadi berkurang
			$stok_update = $stok - $qty;
			$update = array(
				'stok' => $stok_update
			);
			$this->db->where('id_bj', $id_bj);
			$this->db->update('bahan_jadi', $update);

			$this->session->set_flashdata('success', 'Data Bahan Jadi Berhasil Disimpan!');
			redirect('Perusahaan/cBahanJadiKeluar');
		}
	}
	public function update($id_bj_keluar)
	{
		$id_bj = $this->input->post('bj');
		$stok = $this->input->post('stok');
		$qty = $this->input->post('qty');
		if ($qty > $stok) {
			$this->session->set_flashdata('error', 'Stok Bahan Jadi Tidak Tersedia!');
			redirect('Perusahaan/cBahanJadiKeluar');
		} else {
			$data = array(
				'id_bj' => $this->input->post('bj'),
				'tgl_jual' => date('Y-m-d'),
				'quantity' => $this->input->post('qty')
			);
			$this->mBahanJadiKeluar->update($id_bj_keluar, $data);

			//stok bahan jadi berkurang
			$stok_update = $stok - $qty;
			$update = array(
				'stok' => $stok_update
			);
			$this->db->where('id_bj', $id_bj);
			$this->db->update('bahan_jadi', $update);

			$this->session->set_flashdata('success', 'Data Bahan Jadi Berhasil Diperbaharui!');
			redirect('Perusahaan/cBahanJadiKeluar');
		}
	}
	public function delete($id)
	{
		$this->mBahanJadiKeluar->delete($id);
		$this->session->set_flashdata('success', 'Data Bahan Jadi Keluar Berhasil Dihapus!');
		redirect('Perusahaan/cBahanJadiKeluar');
	}
}

/* End of file cBahanJadiKeluar.php */
