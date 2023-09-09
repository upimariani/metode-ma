<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBaku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanBaku');
	}

	public function index()
	{
		$data = array(
			'bahan_baku' => $this->mBahanBaku->select()
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/BahanBaku/vBahanBaku', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Supplier/Layout/head');
			$this->load->view('Supplier/BahanBaku/vCreateBB');
			$this->load->view('Supplier/Layout/footer');
		} else {
			$data = array(
				'id_user' => $this->session->userdata('id'),
				'nama_bb' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi')
			);
			$this->mBahanBaku->insert($data);
			$this->session->set_flashdata('success', 'Data Bahan Baku berhasil disimpan!');
			redirect('Supplier/cBahanBaku');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bb' => $this->mBahanBaku->get_data($id)
			);
			$this->load->view('Supplier/Layout/head');
			$this->load->view('Supplier/BahanBaku/vUpdateBB', $data);
			$this->load->view('Supplier/Layout/footer');
		} else {
			$data = array(
				'id_user' => $this->session->userdata('id'),
				'nama_bb' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi')
			);
			$this->mBahanBaku->update($id, $data);
			$this->session->set_flashdata('success', 'Data Bahan Baku berhasil diperbaharui!');
			redirect('Supplier/cBahanBaku');
		}
	}
	public function delete($id)
	{
		$this->mBahanBaku->delete($id);
		$this->session->set_flashdata('success', 'Data Bahan Baku berhasil dihapus!');
		redirect('Supplier/cBahanBaku');
	}
}

/* End of file cBahanBaku.php */
