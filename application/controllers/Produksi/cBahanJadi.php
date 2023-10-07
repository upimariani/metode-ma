<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanJadi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanJadi');
	}

	public function index()
	{
		$data = array(
			'bj' => $this->mBahanJadi->select()
		);
		$this->load->view('Produksi/Layout/head');
		$this->load->view('Produksi/BahanJadi/vBahanJadi', $data);
		$this->load->view('Produksi/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Jadi', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Produksi/Layout/head');
			$this->load->view('Produksi/BahanJadi/vCreateBJ');
			$this->load->view('Produksi/Layout/footer');
		} else {
			$data = array(
				'nama_bj' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga')
			);
			$this->mBahanJadi->insert($data);
			$this->session->set_flashdata('success', 'Bahan Jadi Berhasil Ditambahkan!');
			redirect('Produksi/cBahanJadi');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Jadi', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bj' => $this->mBahanJadi->get_data($id)
			);
			$this->load->view('Produksi/Layout/head');
			$this->load->view('Produksi/BahanJadi/vUpdateBJ', $data);
			$this->load->view('Produksi/Layout/footer');
		} else {
			$data = array(
				'nama_bj' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga')
			);
			$this->mBahanJadi->update($id, $data);
			$this->session->set_flashdata('success', 'Bahan Jadi Berhasil Diperbaharui!');
			redirect('Produksi/cBahanJadi');
		}
	}
	public function delete($id)
	{
		$this->mBahanJadi->delete($id);
		$this->session->set_flashdata('success', 'Bahan Jadi Berhasil Dihapus!');
		redirect('Produksi/cBahanJadi');
	}
	public function detail_penjualan($id_bj)
	{
		$data = array(
			'detail_penjualan' => $this->mBahanJadi->detail_penjualan($id_bj)
		);
		$this->load->view('Produksi/Layout/head');
		$this->load->view('Produksi/BahanJadi/vDetailPenjualan', $data);
		$this->load->view('Produksi/Layout/footer');
	}
}

/* End of file cBahanJadi.php */
