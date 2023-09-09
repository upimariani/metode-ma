<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanJadi extends CI_Controller
{

	public function index()
	{
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/BahanJadi/vBahanJadi');
		$this->load->view('Perusahaan/Layout/footer');
	}
	public function create()
	{
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/BahanJadi/vCreateBJ');
		$this->load->view('Perusahaan/Layout/footer');
	}
}

/* End of file cDashboard.php */
