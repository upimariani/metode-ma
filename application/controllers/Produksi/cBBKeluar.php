<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBBKeluar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBBKeluar');
		$this->load->model('mBahanJadi');
	}
	public function index()
	{
		$data = array(
			'bb_keluar' => $this->mBBKeluar->select()
		);
		$this->load->view('Produksi/Layout/head');
		$this->load->view('Produksi/BBKeluar/vBbKeluar', $data);
		$this->load->view('Produksi/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('bb', 'Bahan Baku', 'required');
		$this->form_validation->set_rules('qty_bb', 'Quantity Bahan Baku', 'required');
		$this->form_validation->set_rules('bahan_jadi', 'Bahan Jadi', 'required');
		$this->form_validation->set_rules('qty_bj', 'Quantity Bahan Jadi', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'stok_bb' => $this->mBBKeluar->stok_bb(),
				'bahan_jadi' => $this->mBahanJadi->select()
			);
			$this->load->view('Produksi/Layout/head');
			$this->load->view('Produksi/BBKeluar/vCreateBbKeluar', $data);
			$this->load->view('Produksi/Layout/footer');
		} else {
			$id_bj = $this->input->post('bahan_jadi');
			$id_detail = $this->input->post('bb');


			//menembahkan data ke tabel bahan baku keluar
			$bb_keluar = array(
				'id_detail_bb' => $this->input->post('bb'),
				'qty_keluar' => $this->input->post('qty_bb'),
				'id_bj' => $this->input->post('bahan_jadi'),
				'qty_bj' => $this->input->post('qty_bj')
			);
			$this->mBBKeluar->insert($bb_keluar);

			//menambahkan stok data bahan jadi
			$qty_sebelumnya = $this->input->post('qty_bj_sebelumnya');
			$qty_jadi = $this->input->post('qty_bj');
			$qty_update = $qty_sebelumnya + $qty_jadi;


			$stok_bj = array(
				'stok' => $qty_update
			);
			$this->db->where('id_bj', $id_bj);
			$this->db->update('bahan_jadi', $stok_bj);



			//update sisa bahan baku
			$sisa_sebelumnya = $this->input->post('stok_bb');
			$qty_keluar = $this->input->post('qty_bb');
			$sisa_update = $sisa_sebelumnya - $qty_keluar;


			$sisa_bb = array(
				'sisa' => $sisa_update
			);
			$this->db->where('id_detail_bb', $id_detail);
			$this->db->update('detail_bb', $sisa_bb);

			$this->session->set_flashdata('success', 'Bahan Baku Keluar Berhasil Disimpan!');
			redirect('Produksi/cBBKeluar');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('bb', 'Bahan Baku', 'required');
		$this->form_validation->set_rules('qty_bb', 'Quantity Bahan Baku', 'required');
		$this->form_validation->set_rules('bahan_jadi', 'Bahan Jadi', 'required');
		$this->form_validation->set_rules('qty_bj', 'Quantity Bahan Jadi', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'stok_bb' => $this->mBBKeluar->stok_bb(),
				'bahan_jadi' => $this->mBahanJadi->select(),
				'bb_keluar' => $this->mBBKeluar->get_data($id)
			);
			$this->load->view('Produksi/Layout/head');
			$this->load->view('Produksi/BBKeluar/vUpdateBBKeluar', $data);
			$this->load->view('Produksi/Layout/footer');
		} else {

			//menembahkan data ke tabel bahan baku keluar
			$bb_keluar = array(
				'id_detail_bb' => $this->input->post('bb'),
				'qty_keluar' => $this->input->post('qty_bb'),
				'id_bj' => $this->input->post('bahan_jadi')
			);
			$this->mBBKeluar->update($id, $bb_keluar);

			//menambahkan stok data bahan jadi
			$qty_sebelumnya = $this->input->post('qty_bj_sebelumnya');
			$qty_jadi = $this->input->post('qty_bj');
			$qty_update = $qty_sebelumnya + $qty_jadi;

			$id_bj = $this->input->post('bahan_jadi');
			$stok_bj = array(
				'stok' => $qty_update
			);
			$this->db->where('id_bj', $id_bj);
			$this->db->update('bahan_jadi', $stok_bj);


			//update sisa bahan baku
			$sisa_sebelumnya = $this->input->post('stok_bb');
			$qty_keluar = $this->input->post('qty_bb');
			$sisa_update = $sisa_sebelumnya - $qty_keluar;

			$id_detail = $this->input->post('bb');
			$sisa_bb = array(
				'sisa' => $sisa_update
			);
			$this->db->where('id_detail_bb', $id_detail);
			$this->db->update('detail_bb', $sisa_bb);

			$this->session->set_flashdata('success', 'Bahan Baku Keluar Berhasil Disimpan!');
			redirect('Produksi/cBBKeluar');
		}
	}
	public function delete($id)
	{
		$this->mBBKeluar->delete($id);
		$this->session->set_flashdata('success', 'Bahan Baku Keluar Berhasil Dihapus!');
		redirect('Produksi/cBBKeluar');
	}
}

/* End of file cBJKeluar.php */
