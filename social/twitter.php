<?php global $options; ?>
<h3><a href="http://twitter.com/<?php echo $options['tt_twitterid']; ?>">@<?php echo $options['tt_twitterid']; ?></a></h3>
<a href="http://twitter.com/<?php echo $options['tt_twitterid']; ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $options['tt_twitterid']; ?></a>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<div class="my_tweets">
	<ul id="twitter_update_list">
		<li style="font-size: 13px;
padding: 10px 30px;
border-bottom: 1px solid #999;"><span>The moment when you realize that you've poured to much maple sirup on your pancakes...</span> 
				<a style="font-size:85%" href="http://twitter.com/Dorphern/statuses/94033024873799680">about 5 hours ago</a>
		</li>
	</ul>
</div>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $options['tt_twitterid']; ?>.json?callback=twitterCallback2&count=6"></script>