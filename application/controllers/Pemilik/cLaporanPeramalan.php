<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanPeramalan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$data = array(
			'bahan_baku' => $this->mLaporan->bahan_baku()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/vLaporanPeramalan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function cetak()
	{


		// $data = array(
		// 	'tanggal' => $tanggal,
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun)
		// );
		// $this->load->view('Pemilik/Layout/head');
		// $this->load->view('Pemilik/Laporan/LaporanTransaksi/harian', $data);
		// $this->load->view('Pemilik/Layout/footer');

		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(200, 40, 'LAPORAN HASIL PERAMALAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Bahan Baku', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Periode', 1, 0, 'C');
		$pdf->Cell(60, 7, 'Total Permintaan', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Forecast', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		$id_bb = $this->input->post('bb');
		$data = $this->mLaporan->peramalan($id_bb);
		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_bb, 1, 0);
			$pdf->Cell(30, 6, $value->periode . ' / ' . $value->tahun, 1, 0);
			$pdf->Cell(60, 6, $value->total_permintaan, 1, 0);
			$pdf->Cell(40, 6, round($value->forecast, 2), 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLaporanPeramalan.php */
