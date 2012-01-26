<div style="margin: 0 auto; width: 785px;">
	<div id="registerPopup" class="popupBox">
		<a style=" float: right; position: relative; bottom: 12px; left: 90px; z-index: 9999;" href = "javascript:void(0)" onclick = "document.getElementById('registerPopup').style.display='none';document.getElementById('fade2').style.display='none'"><img src="http://www.tabletracker.com/alpha/includes/images/buttons/btn_close.png" /></a>
		<div class="bigbox" style="padding-top: 10px; padding-bottom: 10px; margin-top: 20px;">
			<div class="bluetop"></div>
				<?php locate_template( array( 'registration/register.php' ), true ) ?>
				<div class="clear"></div>
			</div> 
		</div>
	</div>
</div>

<div id="fade2" class="black_overlay" onclick = "document.getElementById('registerPopup').style.display='none';document.getElementById('fade2').style.display='none'"></div>
<div id="fade" class="black_overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>