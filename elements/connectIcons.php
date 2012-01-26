<?php global $options; ?>
<?php if ($options['tt_twitterid'] != '') { ?>
	<a href="javascript:void(0);" onclick="openSocial('twitter')">
	<!--<a href="http://twitter.com/<?php echo $options['tt_twitterid']; ?>" target="_blank" title="Opens in a new window">-->
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/twitter.png" style="height:16px;width:16px;">
	</a>
<?php } ?>

<!-- <?=$options['tt_facebookid']?> -->
<?php if (strlen($options['tt_facebookid']) > 15) { ?>
	<a href="javascript:void(0);" onclick="openSocial('facebook')">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/facebook.png" style="height:16px;width:16px;">
	</a>
<?php } ?>

<?php if ($options['tt_linkedinid'] != '') { ?>
	<a href="javascript:void(0);" onclick="openSocial('linkedin')">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/linkedin.png" style="height:16px;width:16px;">
	</a>
<?php } ?>
<!--
<?php if ($options['tt_flickrid'] != '') { ?>
	<a href="javascript:void(0);" onclick="openSocial('instagram')">
	<a href="http://www.flickr.com/photos/<?php echo $options['tt_flickrid']; ?>" target="_blank" title="Opens in a new window">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/flickr.png" style="height:16px;width:16px;">
	</a>
<?php } ?>-->

<?php if ($options['tt_instagramid'] != '') { ?>
	<!--<a href="javascript:void(0);" onclick="openSocial('instagram')">
	<a href="http://instagr.am/<?php echo $options['tt_instagramid']; ?>" target="_blank" title="Opens in a new window">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/instagram.png" style="height:16px;width:16px;">
	</a>-->
<?php } ?>

<?php if ($options['tt_youtubeid'] != '') { ?>
	<a href="javascript:void(0);" onclick="openSocial('youtube'); $('#youtubeScroll').data('scrollable').begin();">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/youtube.png" style="height:16px;width:16px;">
	</a>
<?php } ?>

<?php if ($options['tt_mailid'] != '') { ?>
	<a href="javascript:void(0);" onclick="openSocial('email')">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/email.png" style="height:16px;width:16px;">
	</a>
<?php } ?>

<?php if ($options['tt_gruviid'] != '') { ?>
	<!--<a href="javascript:void(0);" onclick="openSocial('gruvii')">
	<a href="https://apps.facebook.com/gruviapp/users/<?php echo $options['tt_gruviid']; ?>" target="_blank" title="Opens in a new window">
		<img src="<?php bloginfo('template_url'); ?>/images/connecticons/gruvi.png" style="height:16px;width:16px;">
	</a>-->
<?php } ?>
