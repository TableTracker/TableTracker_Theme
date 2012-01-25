<?php global $options; ?>
<?php if ($options['tt_youtubeid'] != '') { ?>
<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url: 'https://gdata.youtube.com/feeds/api/users/<?php echo $options['tt_youtubeid'] ?>/favorites?&v=2&max-results=12&alt=jsonc',
		success: function(data){
			var videoId = data['data']['items'][0]['video']['id'];
			$('#startYoutubeVideo').attr('src', 'http://www.youtube.com/embed/' + videoId);
			
			var q = 0;
			
			currDiv = -1;
			
			$.each(data['data']['items'], function(key, item){
				if ( q < 12 ) {
					if ( q % 4 == 0 || q == 0 ) {
						$('#youtubeScroll div.items').append('<div></div>');
						currDiv++;
					}
					
					var video = item['video'];
					$('#youtubeScroll div.items div:eq('+ currDiv +')').append('<img src="'+ video['thumbnail']['sqDefault'] +'" onclick="newYoutubeVideo(\''+ video['id'] +'\', this)">');
					
				}
				q++;
			});
			
			$('#youtubeScroll img:first').addClass('selected');
			
			$("#youtubeScroll").scrollable({ circular: true, next: '.nextTube', prev: '.prevTube' });
			$("#youtubeScroll").data("scrollable").move(3);
			setTimeout(function(){ $("#youtubeScroll").data("scrollable").begin(); }, 4000);
		}
	});
	
	/*var totalPages = Math.floor($('#youtubeScroll .items img').size()/4);
	var currPage = 0;
	$('#youtubeNext').click(function(){
		alert("s");
	});*/
});

function newYoutubeVideo(v, t){
	$('#startYoutubeVideo').attr('src', 'http://www.youtube.com/embed/' + v);
	$('#youtubeScroll img').removeClass('selected');
	$(t).addClass('selected');
}
</script>
<?php } ?>

<div style="margin: 0 auto; width: 785px;">
	<div id="socialOverview" class="popupBox" style="margin-top:40px;">
		<a style="position: absolute; top: -20px; right: 0; z-index: 9999;" href = "javascript:void(0)" onclick = "document.getElementById('socialOverview').style.display='none';document.getElementById('fade2').style.display='none'"><img src="http://www.tabletracker.com/alpha/includes/images/buttons/btn_close.png" /></a>
		<div class="bigbox" style="padding-top: 10px; padding-bottom: 10px;">
			<div class="bluetop"></div>
				
 				<?php require_once( 'header.php' ); ?>
				
				<div style="float: left; width: 90px; margin-top: 5px;">
					<?php if ($options['tt_twitterid'] != '') { ?>
						<a href="javascript:void(0)" onclick="openSocial('twitter', this)" class="box_button">Twitter</a>
					<?php } ?>
					
					<?php if (strlen($options['tt_facebookid']) > 15) { ?>
					<a href="javascript:void(0)" onclick="openSocial('facebook', this)" class="box_button" target="_blank">Facebook</a>
					<?php } ?>
					
					<?php if ($options['tt_linkedinid'] != '') { ?>
						<a href="javascript:void(0)" onclick="openSocial('linkedin', this)" class="box_button">Linkedin</a>
					<?php } ?>
					
					<?php if ($options['tt_youtubeid'] != '') { ?>
					<a href="javascript:void(0);" onclick="openSocial('youtube', this); $('#youtubeScroll').data('scrollable').begin();" class="box_button" target="_blank">Youtube</a>
					<?php } ?>
					
					<?php if ($options['tt_mailid'] != '') { ?>
						<a href="javascript:void(0)" onclick="openSocial('email', this); $('#contact-response').hide(); $('#contact-mail').show();" class="box_button">e-Mail</a>
					<?php } ?>
				</div>
				<div style="float: right; width: 500px; margin-left: 20px;">
					<?php if ($options['tt_twitterid'] != '') { ?>
					<div id="SocialOverview_twitter" class="socialOverview"><?php require_once( 'twitter.php' ); ?></div>
					<?php } 
					if (strlen($options['tt_facebookid']) > 15) { ?>
					<div id="SocialOverview_facebook" class="socialOverview">
						<?php require_once('facebook.php'); ?>
					</div>
					<?php } ?>
					
					<div id="SocialOverview_email" class="socialOverview"><?php require_once('email.php'); ?></div>
					
					<div id="SocialOverview_linkedin" class="socialOverview">
						<?php require_once('linkedin.php'); ?>
					</div>
					
					<?php if ($options['tt_youtubeid'] != '') { ?>
						<div id="SocialOverview_youtube" class="socialOverview">
							<?php require_once('youtube.php'); ?>
						</div>
					<?php } ?>
					
					
				
				</div>
				
				<div class="clear"></div>
			</div> 
		</div>
	</div>
</div>

<div id="fade2" class="black_overlay" onclick = "document.getElementById('socialOverview').style.display='none';document.getElementById('fade2').style.display='none'"></div>
<div id="fade" class="black_overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>