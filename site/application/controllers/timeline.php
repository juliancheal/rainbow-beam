<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {

	public function index()
	{
		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		$this->load->view('timeline');
		$this->load->view('inc/foot');
	}
}

// EOF