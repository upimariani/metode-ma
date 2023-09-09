<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Perusahaan/Layout/head');
		$this->load->view('Perusahaan/vDashboard');
		$this->load->view('Perusahaan/Layout/footer');
	}
}

/* End of file cDashboard.php */
