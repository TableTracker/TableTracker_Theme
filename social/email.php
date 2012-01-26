<?PHP
global $options;

if (isset($_GET['process'])) {
	error_reporting(0);
	
function checkEmail($email) 
{
   if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) 
   { return true; }
   return false;
}
	
	$error = false;
	if (!checkEmail($_POST["mail"])) {
		$error = true;
	}
	if ($_POST["name"] == "") {
		$error = true;
	}
	if ($_POST["msg"] == "") {
		$error = true;
	}
	
	$headers = 'From: '. $_POST["name"] .' <'. $_POST["mail"] .'>';
	if (!$error) {
		if (!mail($_POST["tomail"], 'Website Contact Message', $_POST["msg"], $headers)) {
			$error = true;
			echo $_POST["tomail"];
		}
	}
	
	if ($error) {
		echo json_encode(array(
			'success' => false,
			'message' => 'oops! Your mail did not get send, there was a problem, try again later.'
		));
	} else {	
		echo json_encode(array(
			'success' => true,
			'message' => '<center><h3 style="font-size: 30px; padding: 20px 0 2px; margin-bottom: 0;">Thanks for your mail,</h3><br> '. $options["ts_firstname"] .' will get back to you - promise.</center>'
		));
	}
	
	
} else { ?>
<script language="javascript">
$(function() {  
	$(".button").click(function() {  
		var name = $('#name').val();
		var mail = $('#mail').val();
		var msg  = $('textarea#message').val();
		$.post("<?php bloginfo( 'template_directory' ); ?>/social/email.php?process", {
  				name: name,
  				mail: mail,
  				msg: msg,
  				tomail: '<?php echo $options['ts_mailid'] ?>'
  			}, function(data) {
    			var data = eval('(' + data + ')');
    			if (data.success == true) {
    				$('#contact-response').show().html(data.message);
    				$('#contact-mail').hide();
    			} else {
    				alert(data.message);
    			}
    		}    
		);  
		
		return false;
	});
});
</script>

<h3 style="font-size: 25px; padding-bottom: 2px;">Send <?php echo $options['ts_firstname'] ?> an e-mail</h3>

<div id="contact-response"></div>

<div id="contact-mail">

	<form action="#" name="mail" method="post">
	<div style="float:left; width: 220px;margin-right:20px;">
		<strong>Your name?</strong><br />
		<input id="name" type="text" style="width:220px; height:20px;" />
	</div>
	<div style="float:left; width: 220px;margin-left:20px;">
		<strong>Your email?</strong><br />
		<input id="mail" type="text" style="width:220px; height:20px;" />
	</div>
	<div class="clear">&nbsp;</div>
	<div style="width:484px;">
		<strong>Message</strong><br />
		<textarea id="message" rows="15" style="width: 484px;"></textarea>
	</div>
	<div>
		<input type="image" src="<?php bloginfo( 'template_directory' ); ?>/images/go.png" style="background: none; border: none; width: auto; height: auto; float: right; margin: 0;" class="button">
	</div>

	</form>

</div>

<?php } ?>