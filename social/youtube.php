<?php global $options; ?>
<h3><a href="http://youtube.com/<?php echo $options['tt_youtubeid']; ?>">TableTracker's</a> favourite videos</h3>		
	<iframe width="500" height="326" src="http://www.youtube.com/embed/yJ6zELeDBYQ?rel=0" frameborder="0" id="startYoutubeVideo" allowfullscreen>
	</iframe>

<div id="youtubeScroll" style="width: 500px; height: 90px; overflow: hidden;position: relative;">
	<div class="items" style="position: absolute; width: 20000em;">
		
	</div>
</div>	

<div style="position: relative; top: -55px; font-size: 16px;">
	<a href="#" class="prevTube browse left">◀</a>
	<a href="#" class="nextTube browse right">►</a>
</div>