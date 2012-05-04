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
		
		$this->load->model('activity_model');
		$data['verbs'] = $this->activity_model->get_verbs();
	
		$this->load->view('inc/head', $head);
		$this->load->view('docs', $data);
		$this->load->view('inc/foot');
	}
	
	public function about()
	{
	
		$head['page'] = 'about';
	
		$this->load->view('inc/head', $head);
		$this->load->view('about');
		$this->load->view('inc/foot');
	}
}

// EOF