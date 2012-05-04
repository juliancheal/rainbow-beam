<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	public function home()
	{
	
		$head['page'] = 'home';
	
		$this->load->view('inc/head', $head);
		$this->load->view('home');
		$this->load->view('inc/foot');
	}
	
	public function docs()
	{
	
		$head['page'] = 'docs';
	
		$this->load->view('inc/head', $head);
		$this->load->view('docs');
		$this->load->view('inc/foot');
	}
}

// EOF