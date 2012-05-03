<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// Including the DB connection file:
define("INCLUDE_CHECK",1);
require 'connect.php';

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Timeline</title>

<link rel="stylesheet" type="text/css" href="styles.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main">
	<h1>Event Timeline</h1>
	
    <div id="timelineLimiter"> <!-- Hides the overflowing timelineScroll div -->
	    <div id="timelineScroll"> <!-- Contains the timeline and expands to fit -->

		<?php
        
        // We first select all the events from the database ordered by date:
        
        $dates = array();
        /*
        $res = mysql_query("SELECT * FROM timeline ORDER BY date_event ASC");
		
        while($row=mysql_fetch_assoc($res))
        {
        	//CHANGE TO WORK WITH MONGODB
        	
			// Store the events in an array, grouped by years:
            $dates[date('Y',strtotime($row['date_event']))][] = $row;
        }*/
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

        $dates[date('d M Y',strtotime($row['date_event']))][] = $row;
        $dates[date('d M Y',strtotime($row2['date_event']))][] = $row2;
        $dates[date('d M Y',strtotime($row3['date_event']))][] = $row3;
        $dates[date('d M Y',strtotime($row4['date_event']))][] = $row4;
        $dates[date('d M Y',strtotime($row5['date_event']))][] = $row5;
        $dates[date('d M Y',strtotime($row6['date_event']))][] = $row6;
        
        $colors = array('green','blue','chreme');
		$scrollPoints = '';
		
        $i=0;
        foreach($dates as $year=>$array)
        {
			// Loop through the years:
            echo '
            <div class="event">
                <div class="eventHeading '.$colors[$i++%3].'">'.$year.'</div>
                <ul class="eventList">
                ';
        
            foreach($array as $event)
            {
				// Loop through the events in the current year:
				
                echo '<li class="'.$event['type'].'">
				<span class="icon" title="'.ucfirst($event['type']).'"></span>
				'.htmlspecialchars($event['title']).'
				
				<div class="content">
					<div class="body">'.($event['type']=='image'?'<div style="text-align:center"><img src="'.$event['body'].'" alt="Image" /></div>':nl2br($event['body'])).'</div>
					<div class="title">'.htmlspecialchars($event['title']).'</div>
					<div class="date">'.date("F j, Y",strtotime($event['date_event'])).'</div>
				</div>
				
				</li>';
            }
            
            echo '</ul></div>';
			
			// Generate a list of years for the time line scroll bar:
			$scrollPoints.='<div class="scrollPoints">'.$year.'</div>';
        }
        
        ?>
	    
        <div class="clear"></div>
        </div>
        
        <div id="scroll"> <!-- The year time line -->
            <div id="centered"> <!-- Sized by jQuery to fit all the years -->
	            <div id="highlight"></div> <!-- The light blue highlight shown behind the years -->
	            <?php echo $scrollPoints ?> <!-- This PHP variable holds the years that have events -->
                <div class="clear"></div>
            </div>
        </div>
        
        <div id="slider"> <!-- The slider container -->
        	<div id="bar"> <!-- The bar that can be dragged -->
            	<div id="barLeft"></div>  <!-- Left arrow of the bar -->
                <div id="barRight"></div>  <!-- Right arrow, both are styled with CSS -->
          </div>
        </div>
        
    </div> 

  	<p class="tutInfo"></p>
</div>

</body>
</html>
