<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	// This function does pretty much everything that is incredible and awesome. Hoorah.

	public function index()
	{
	
		$this->load->library('mongo_db');
	
		switch ($_SERVER['REQUEST_METHOD'])
		{
	
			//! GET
	
			case 'GET':
	
				$query = array();
	
				$activity = $this->mongo_db
					->limit(50)
					->order_by(array('timestamp' => 'ASC'))
					->where($query)
					->get('activity');
				
				foreach ($activity as $event)
				{
					unset($event['_id']);
					$output['events'][] = $event;
				}
				
				$output['query'] = $query; 
				
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode($output));
					
				break;
			
			//! POST
			
			case 'POST':
			
				// We can haz user?
				if (isset($_SERVER['PHP_AUTH_USER'])
					AND $_SERVER['PHP_AUTH_USER'] !== ''
					AND isset($_SERVER['PHP_AUTH_PW'])
					AND $_SERVER['PHP_AUTH_PW'] !== ''
				)
				{
			
					// Make sure the payload is valid JSON
					if ($input = json_decode(file_get_contents('php://input')))
					{
					
						if (isset($input->timestamp)
							AND isset($input->actor)
							AND isset($input->verb)
							AND isset($input->payload)
						)
						{
						
							$object = array(
								'timestamp' => $input->timestamp,
								'actor' => $input->actor,
								'verb' => $input->verb,
								'payload' => $input->payload,
								'application' => array(
									'id' => $_SERVER['PHP_AUTH_USER'],
									'key' => $_SERVER['PHP_AUTH_PW']
								)
							);
							
							$this->mongo_db->insert('publish', $object);
							
							$this->output
								->set_content_type('application/json')
								->set_status_header('202')
								->set_output(json_encode(array(
									'message' => 'Yum. Message accepted. It\'ll appear in the streams soon, assuming that your application credentials are valid and your message makes sense.'
							)));
							
						}
						else
						{
							$this->output
								->set_content_type('application/json')
								->set_status_header('400')
								->set_output(json_encode(array(
									'error' => 'Whoops. You\'re missing something essential. Check the documentation, fool!'
							)));	
						}
						
					}
					else
					{
						$this->output
							->set_content_type('application/json')
							->set_status_header('400')
							->set_output(json_encode(array(
								'error' => 'Whoa! It looks like we couldn\'t parse your POST request. Is it valid JSON?'
						)));	
					}
					
				}
				else
				{
					$this->output
						->set_content_type('application/json')
						->set_status_header('401')
						->set_header('WWW-Authenticate: Basic realm="Rainbow Beam"')
						->set_output(json_encode(array(
							'error' => 'What\'s that? No application ID or API key? No access for you!'
					)));	
				}
			
				break;
			
			//! Default
			
			default:
			
				$this->output
					->set_content_type('application/json')
					->set_status_header('405')
					->set_output(json_encode(array(
						'error' => 'What the hell are you trying to do? That\'s not a supported HTTP method. Read the documentation.'
					)));
					
				break;
			
		}
	}
}

// EOF