<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Produksi/Layout/head');
		$this->load->view('Produksi/vDashboard');
		$this->load->view('Produksi/Layout/footer');
	}
}

/* End of file cDashboard.php */
