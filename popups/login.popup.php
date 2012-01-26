<div style="margin: 0 auto; width: 960px;">
	<div id="loginPopup" class="popupBox" style="margin-top: -10px; margin-left:-30px;">
		<a style=" float: right; position: relative; bottom: 8px; left: -300px; z-index: 9999;" href = "javascript:void(0)" onclick = "document.getElementById('loginPopup').style.display='none';document.getElementById('fade2').style.display='none'"><img src="http://www.tabletracker.com/alpha/includes/images/buttons/btn_close.png" /></a>
		<div class="minibox" style="padding-top: 10px; padding-bottom: 10px; margin-top: 20px;">
			<div class="greentop"></div>
 			<form action="<?php bloginfo('url') ?>/wp-login.php" method="post">

				<p>
					Username<br />
					<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" style="height: 25px; width: 275px;" />
				</p>
				<br />
				<p>
					Password<br />
					<input type="password" name="pwd" id="pwd" size="22" style="height: 25px; width: 275px;" />
				</p>
				
				<p style="float: left; margin-top:7px;">
					<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label><br />
				</p>
				
				<p style="float: right;">
					<input type="submit" name="submit" value="Send" />
				</p>
				</p>

				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>

			</form>
				<div class="clear"></div>
			</div> 
		</div>
	</div>
</div>

<div id="fade2" class="black_overlay" onclick = "document.getElementById('loginPopup').style.display='none';document.getElementById('fade2').style.display='none'"></div>
<div id="fade" class="black_overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>