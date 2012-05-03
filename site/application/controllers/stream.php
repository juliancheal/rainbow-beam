<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stream extends CI_Controller {

	public function index()
	{
		$this->load->view('inc/head');
		$this->load->view('stream');
		$this->load->view('inc/foot');
	}
}

// EOF