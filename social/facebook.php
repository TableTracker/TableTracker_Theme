<?php 
	global $current_blog, $options; 
?>

<?php
	$access_token = $options['tt_facebookid'];

		$facebookData = json_decode(file_get_contents('https://graph.facebook.com/110185715730216/feed?access_token=' . $access_token), true);

	
	
	$facebookData = $facebookData['data'];
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	
	$userID = explode('_',$facebookData[0]['id']);

		echo '<h3><a href="http://www.facebook.com/pages/TableTracker/110185715730216?sk=wall">TableTracker\'s</a> page</h3>';
	
	
	
	$q = 0;
	foreach($facebookData as $fb) {	
		if (isset($fb['message']) && $q < 5) {
			
			$string = $string = preg_replace("((http://|ftp://)?([a-zA-Z1-9\-_\.]+\.[a-zA-Z1-9\-_]+\.[a-z]{2,3}(/[a-zA-Z0-9\-/\._\?=&]+)?))", "<a href=\"\\1\\2\" target=\"_blank\">\\0</a>", $fb['message']);
				
			$time = date('H:i l jS M Y' ,strtotime($fb['created_time']));
			
      		echo "<div class='fbUpdate'>
      			<span>{$fb['from']['name']}:</span>
      			$string 
      			<div style='font-size: 11px; color: #777; margin-top: 3px;'>{$time}</div>
      			</div>";
			
			$q++;
		}
	}

?>