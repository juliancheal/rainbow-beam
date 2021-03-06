<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>

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
		    
        if (isset($rows))
        {
		    foreach($rows as $row)
		    {
        		$dates[date('D M Y',$row['timestamp'])][] = $row;
		    }    
		}
        
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
				
				try
				{
					$message = $event['payload']['message'];
				}
				catch (exception $e)
				{
					try
					{
						$message = $event['payload'];
					}
					catch (exception $e)
					{
					}
				}	
				// Loop through the events in the current year:
				
                echo '<li class="'.$event['verb'].'">
				<span class="icon" title="'.ucfirst($event['verb']).ucfirst($event['verb']).'"></span>
				'.htmlspecialchars($event['actor']). ' ' . htmlspecialchars($event['verb']).'
				
				<div class="content">
					<div class="body">'.($event['verb']=='image'?'<div style="text-align:center"><img src="'.$message.'" alt="Image" /></div>':nl2br($event['payload']['message'])).'</div>
					<div class="title">'.htmlspecialchars($event['actor']). ' ' . htmlspecialchars($event['verb']).'</div>
					<div class="date">'.date("F j, Y",$event['timestamp']).'</div>
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
        <?php echo '<a href = "' . site_url() . 'timeline/view_monthly?year=' . $year_sent .'">Back to monthly view</a>';?>
        
    </div> 
