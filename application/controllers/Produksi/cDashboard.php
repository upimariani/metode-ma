<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$data = array(
			'sisa_qty' => $this->db->query("SELECT SUM(sisa) as sisa_qty, nama_bb, keterangan, harga  FROM `detail_bb` JOIN bahan_baku ON bahan_baku.id_bb=detail_bb.id_bb GROUP BY bahan_baku.id_bb")->result()
		);
		$this->load->view('Produksi/Layout/head');
		$this->load->view('Produksi/vDashboard', $data);
		$this->load->view('Produksi/Layout/footer');
	}
}

/* End of file cDashboard.php */
