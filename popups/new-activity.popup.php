<div style="margin: 0 auto; width: 690px;">
	<div id="newActivity" class="popupBox">
		<a style=" float: right; position: relative; bottom: 12px; left: 90px; z-index: 9999;" href = "javascript:void(0)" onclick = "document.getElementById('newActivity').style.display='none';document.getElementById('fade2').style.display='none'"><img src="http://www.tabletracker.com/alpha/includes/images/buttons/btn_close.png" /></a>
		<div class="bigbox" style="padding-top: 10px; padding-bottom: 10px; margin-top: 20px; height: auto;">
			<div class="purpletop"></div>
				<?php locate_template( array( 'activity/post-form.php' ), true ) ?>
				<div class="clear"></div>
			</div> 
		</div>
	</div>
</div>

<div id="fade2" class="black_overlay" onclick = "document.getElementById('newActivity').style.display='none';document.getElementById('fade2').style.display='none'"></div>
<div id="fade" class="black_overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>