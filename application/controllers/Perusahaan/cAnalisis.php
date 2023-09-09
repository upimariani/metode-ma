<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'bahan_baku' => $this->mAnalisis->bahanbaku()
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/Analisis/vAnalisis', $data);
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function periode($id)
	{
		$data = array(
			'periode' => $this->mAnalisis->periode($id),
			'id_bb' => $id
		);
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/Analisis/vPeriode', $data);
		$this->load->view('Perusahaan/Layout/footer', $data);
	}
	public function hitung($bulan, $tahun, $id_bb)
	{
		if ($bulan <= 3) {
			$forecast = '0';
			$total_permintaan = '0';
		} else {
			$variabel = $this->mAnalisis->variabel($bulan, $id_bb);
			$total_permintaan = 0;
			foreach ($variabel as $key => $value) {
				// echo $value->total;
				// echo '<br>';
				$total_permintaan += $value->total;
			}
			$forecast = $total_permintaan / 3;
		}

		$data = array(
			'id_bb' => $id_bb,
			'periode' => $bulan,
			'tahun' => $tahun,
			'total_permintaan' => $total_permintaan,
			'forecast' => $forecast
		);
		$this->mAnalisis->insert_analisis($data);

		$this->session->set_flashdata('success', 'Data Analisis Berhasil Disimpan!');
		redirect('Perusahaan/cAnalisis/periode/' . $id_bb);
	}
}

/* End of file cAnalisis.php */
