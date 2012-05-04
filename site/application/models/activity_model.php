<?php

class Activity_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_events($query = array(), $limit = 50)
    {
    
    	$this->load->library('mongo_db');
    
        return $this->mongo_db
			->limit($limit)
			->order_by(array('timestamp' => 'ASC'))
			->where($query)
			->get('activity');
    }

}

// EOF