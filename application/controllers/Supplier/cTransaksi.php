<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select_supplier()
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/TransaksiBB/vTransaksiBB', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail_transaksi' => $this->mTransaksi->detail($id)
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/TransaksiBB/vDetailTransaksi', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function konfirmasi_pesanan($id)
	{
		$data = array(
			'stat_order' => '2'
		);
		$this->db->where('id_tran_bb', $id);
		$this->db->update('tran_bb', $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
		redirect('Supplier/cTransaksi');
	}
}

/* End of file cTransaksi.php */
