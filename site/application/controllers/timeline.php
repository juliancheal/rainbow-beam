<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {

	public function index()
	{
	
		$row = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2004-01-02"
		);
		
		    $row2 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-03"
		);
		
		    $row3 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-04"
		);
		    $row4 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-05"
		);
		
		    $row5 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-06"
		);
		
		    $row6 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-07"
		);
				    $row7 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-08"
		);
		
		    $row8 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-09"
		);
		    $row9 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-10"
		);
		
		    $row10 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-11"
		);
		
		    $row11 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-12"
		);
		
	
		$data['row'] = $row;
		$data['row2'] = $row2;
		$data['row3'] = $row3;
		$data['row4'] = $row4;
		$data['row5'] = $row5;
		$data['row6'] = $row6;
		$data['row7'] = $row7;
		$data['row8'] = $row8;
		$data['row9'] = $row9;
		$data['row10'] = $row10;
		$data['row11'] = $row11;

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		$this->load->view('timeline_view_yearly', $data);
		$this->load->view('inc/foot');
		
	}

	public function view_yearly()
	{
	
		$row = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2004-01-02"
		);
		
		    $row2 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-03"
		);
		
		    $row3 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-04"
		);
		    $row4 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-05"
		);
		
		    $row5 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-06"
		);
		
		    $row6 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-07"
		);
				    $row7 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-08"
		);
		
		    $row8 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-09"
		);
		    $row9 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-10"
		);
		
		    $row10 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-11"
		);
		
		    $row11 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-12"
		);
		
	
		$data['row'] = $row;
		$data['row2'] = $row2;
		$data['row3'] = $row3;
		$data['row4'] = $row4;
		$data['row5'] = $row5;
		$data['row6'] = $row6;
		$data['row7'] = $row7;
		$data['row8'] = $row8;
		$data['row9'] = $row9;
		$data['row10'] = $row10;
		$data['row11'] = $row11;

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		$this->load->view('timeline_view_yearly', $data);
		$this->load->view('inc/foot');
		
	}
	
	public function view_monthly()
	{
		$year = $this->input->get('year');
			
		//REQUEST ONLY THIS YEAR FORM DATABASE
			
		$row = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2004-01-02"
		);
		
		    $row2 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-03"
		);
		
		    $row3 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-04"
		);
		    $row4 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-05"
		);
		
		    $row5 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-06"
		);
		
		    $row6 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-07"
		);
				    $row7 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-08"
		);
		
		    $row8 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-09"
		);
		    $row9 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-10"
		);
		
		    $row10 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-11"
		);
		
		    $row11 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-12"
		);
		
	
		$data['row'] = $row;
		$data['row2'] = $row2;
		$data['row3'] = $row3;
		$data['row4'] = $row4;
		$data['row5'] = $row5;
		$data['row6'] = $row6;
		$data['row7'] = $row7;
		$data['row8'] = $row8;
		$data['row9'] = $row9;
		$data['row10'] = $row10;
		$data['row11'] = $row11;

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		$this->load->view('timeline_view_monthly', $data);
		$this->load->view('inc/foot');
		
	}

	public function view_daily()
	{
	
		$row = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2004-01-02"
		);
		
		    $row2 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-03"
		);
		
		    $row3 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-04"
		);
		    $row4 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-05"
		);
		
		    $row5 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-06"
		);
		
		    $row6 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-07"
		);
				    $row7 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-08"
		);
		
		    $row8 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-09"
		);
		    $row9 = array(
		    "id" => 1,
		    "type" => "news",
		    "title" => "bar",
		    "body" => "baz",
		    "date_event" => "2007-04-10"
		);
		
		    $row10 = array(
		    "id" => 3,
		    "type" => "image",
		    "title" => "foo",
		    "body" => "bar",
		    "date_event" => "2007-04-11"
		);
		
		    $row11 = array(
		    "id" => 2,
		    "type" => "news",
		    "title" => "baz",
		    "body" => "foo",
		    "date_event" => "2007-04-12"
		);
		
	
		$data['row'] = $row;
		$data['row2'] = $row2;
		$data['row3'] = $row3;
		$data['row4'] = $row4;
		$data['row5'] = $row5;
		$data['row6'] = $row6;
		$data['row7'] = $row7;
		$data['row8'] = $row8;
		$data['row9'] = $row9;
		$data['row10'] = $row10;
		$data['row11'] = $row11;

		$head['page'] = 'Timeline';
	
		$this->load->view('inc/head', $head);
		$this->load->view('timeline_view_daily', $data);
		$this->load->view('inc/foot');
		
	}
}

// EOF