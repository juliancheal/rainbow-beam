<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stream extends CI_Controller {

	public function index()
	{
	
		$head['page'] = 'stream';
	
		$this->load->view('inc/head', $head);
	
		$this->load->view('inc/head');
		$this->load->view('stream');
		$this->load->view('inc/foot');
	}
}

// EOF