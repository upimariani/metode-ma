<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiBB extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mUser');
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'supplier' => $this->mUser->select(),
			'transaksi' => $this->mTransaksi->select()
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/TransaksiBB/vTransaksiBB', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function pesan_supplier($id_supplier = NULL)
	{
		$id_supplier = $this->input->post('supplier');
		$data = array(
			'bb' => $this->mTransaksi->bahan_baku($id_supplier),
			'id_supplier' => $id_supplier
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/TransaksiBB/vCreateTransaksiBB', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function addtocart()
	{
		$qty_tersedia = $this->input->post('stok');
		$qty_beli = $this->input->post('qty');
		if ($qty_beli > $qty_tersedia) {
			$id_supplier = $this->input->post('id_supplier');
			$this->session->set_flashdata('success', 'Quantity Yang diproses melebih kapasitas stok yang tersedia!');
			$data = array(
				'bb' => $this->mTransaksi->bahan_baku($id_supplier),
				'id_supplier' => $id_supplier
			);
			$this->load->view('Perusahaan/Layout/head');
			$this->load->view('Perusahaan/TransaksiBB/vCreateTransaksiBB', $data);
			$this->load->view('Perusahaan/Layout/footer');
		} else {
			$data = array(
				'id' => $this->input->post('bb'),
				'name' => $this->input->post('nama'),
				'price' => $this->input->post('harga'),
				'qty' => $this->input->post('qty'),
				'stok' => $this->input->post('stok')
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Bahan Baku Berhasil Masuk Keranjang!');


			$id_supplier = $this->input->post('id_supplier');
			$data = array(
				'bb' => $this->mTransaksi->bahan_baku($id_supplier),
				'id_supplier' => $id_supplier
			);
			$this->load->view('Perusahaan/Layout/head');
			$this->load->view('Perusahaan/TransaksiBB/vCreateTransaksiBB', $data);
			$this->load->view('Perusahaan/Layout/footer');
		}
	}
	public function hapus($id, $id_supplier)
	{
		$this->cart->remove($id);
		$data = array(
			'bb' => $this->mTransaksi->bahan_baku($id_supplier),
			'id_supplier' => $id_supplier
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/TransaksiBB/vCreateTransaksiBB', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function selesai()
	{
		$data = array(
			'id_user' => $this->input->post('id_supplier'),
			'tgl_tran' => date('Y-m-d'),
			'tot_bayar' => $this->cart->total(),
			'stat_order' => '0'
		);
		$this->mTransaksi->insert_po_bb($data);

		$id_po_bb = $this->db->query("SELECT MAX(id_tran_bb) as id_tran_bb FROM `tran_bb`")->row();

		foreach ($this->cart->contents() as $key => $value) {
			$pesanan = array(
				'id_tran_bb' => $id_po_bb->id_tran_bb,
				'id_bb' => $value['id'],
				'jml' => $value['qty'],
				'sisa' => $value['qty']
			);
			$this->mTransaksi->insert_pesanan($pesanan);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Transaksi berhasil Dikirim!');
		redirect('Perusahaan/cTransaksiBB');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail_transaksi' => $this->mTransaksi->detail($id)
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/TransaksiBB/vDetailTransaksi', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function pembayaran($id)
	{
		$config['upload_path']          = './asset/bukti-pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bayar')) {
			$data = array(
				'detail_transaksi' => $this->mTransaksi->detail($id),
				'error' => $this->upload->display_errors()
			);
			$this->load->view('Perusahaan/Layout/head');
			$this->load->view('Perusahaan/TransaksiBB/vDetailTransaksi', $data);
			$this->load->view('Perusahaan/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'stat_order' => '1',
				'bukti_payment' => $upload_data['file_name']
			);
			$this->db->where('id_tran_bb', $id);
			$this->db->update('tran_bb', $data);


			$this->session->set_flashdata('success', 'Pembayaran Berhasil Dikirim!');
			redirect('Perusahaan/cTransaksiBB');
		}
	}
}

/* End of file cDashboard.php */
