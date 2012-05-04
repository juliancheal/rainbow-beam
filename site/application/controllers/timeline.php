<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {

	public function index()
	{
	
		$this->load->library('mongo_db');
			
		$row = $this->mongo_db->where('date_event')->get('activity');

		foreach($row as $result)
		{
			$data['rows'][] = $result;
		}

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		if (isset($data))
		{
			$this->load->view('timeline_view_yearly', $data);
		}
		else
		{
			$this->load->view('timeline_view_yearly');
		}
		$this->load->view('inc/foot');
	}

	public function view_yearly()
	{
		$this->load->library('mongo_db');
			
		$row = $this->mongo_db->where('date_event')->get('activity');

		foreach($row as $result)
		{
			$data['rows'][] = $result;
		}

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		if (isset($data))
		{
			$this->load->view('timeline_view_yearly', $data);
		}
		else
		{
			$this->load->view('timeline_view_yearly');
		}
		$this->load->view('inc/foot');
	}
		
	public function view_monthly()
	{
		$year = $this->input->get('year');
		
		$this->load->library('mongo_db');
		
		//REQUEST ONLY THIS YEAR FROM DATABASE
			
		$row = $this->mongo_db->where_gt('timestamp', strtotime('1 January ' . $year))->where_lt('timestamp', strtotime('31 December ' . $year))->get('activity');

		foreach($row as $result)
		{
			$data['rows'][] = $result;
		}

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		if (isset($data))
		{
			$this->load->view('timeline_view_monthly', $data);
		}
		else
		{
			$this->load->view('timeline_view_monthly');
		}
		$this->load->view('inc/foot');
		
	}

	public function view_daily()
	{
		$year = $this->input->get('year');
		
		$month = $this->input->get('month');
		
		$this->load->library('mongo_db');
		
		//REQUEST ONLY THIS YEAR FROM DATABASE
			
		$row = $this->mongo_db->where_gt('timestamp', strtotime('1 ' . $month . ' ' . $year))->where_lt('timestamp', strtotime('31 ' . $month . ' ' . $year))->get('activity');

		foreach($row as $result)
		{
			$data['rows'][] = $result;
		}
			$data['year_sent'] = $year;

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		if (isset($data))
		{
			$this->load->view('timeline_view_daily', $data);
		}
		else
		{
			$this->load->view('timeline_view_daily');
		}
		$this->load->view('inc/foot');
		
	}

}

// EOF