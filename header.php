<!DOCTYPE html>
 
<html lang="en"> 
<head>
	<meta charset="utf-8"> 
	<title>TableTracker</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Damion">
	<!-- Load Styles -->
	<link rel="stylesheet" href="<?PHP bloginfo( 'template_url' ) ?>/styles/reset.css" type="text/css" /> <!-- Reset all styles based on MeyerWeb Reset CSS -->
	<link rel="stylesheet" href="<?PHP bloginfo( 'template_url' ) ?>/styles/main.css" type="text/css" /> <!-- Load the main styles -->
  <link rel="stylesheet" href="<?PHP bloginfo( 'template_url' ) ?>/style.css" type="text/css" /> <!-- Load the style.css -->
  
	
	<!-- Load JS -->
	<script type="text/javascript" src="<?PHP bloginfo( 'template_url' ) ?>/js/jquery.js"></script> <!-- Load jQuery -->
	<script type="text/javascript" src="<?PHP bloginfo( 'template_url' ) ?>/js/jqueryui.custom.js"></script> <!-- Load jQueryUI -->
	<script src="<?PHP bloginfo( 'template_url' ) ?>/js/main.js" type="text/javascript"></script> <!-- Load main jQuery -->
	<script src="<?PHP bloginfo( 'template_url' ) ?>/js/scroll.js" type="text/javascript"></script> <!-- Load scroll jQuery -->
	<script src="<?PHP bloginfo( 'template_url' ) ?>/js/cufon.js" type="text/javascript"></script> <!-- Load cufon to run special fonts -->
	<script type="text/javascript">
		function loadVideo1(){
			document.getElementById('video-emb').innerHTML = '<iframe allowfullscreen="0" frameborder="0" height="160" src="http://www.youtube.com/embed/dPMaid87Es0?rel=0&autoplay=1&controls=0" width="280"></iframe>';
		}
		function loadVideo2(){
			document.getElementById('video-emb').innerHTML = '<iframe allowfullscreen="0" frameborder="0" height="160" src="http://www.youtube.com/embed/nxrKMrsUT5g?rel=0&autoplay=1&controls=0" width="280"></iframe>';
		}
		function loadVideo3(){
			document.getElementById('video-emb').innerHTML = '<iframe allowfullscreen="0" frameborder="0" height="160" src="http://www.youtube.com/embed/FwbQjUcDves?rel=0&autoplay=1&controls=0" width="280"></iframe>';
		}
		function loadVideo4(){
			document.getElementById('video-desc').innerHTML = 'Fred Flinstone';
		}
		function loadVideo5(){
			document.getElementById('video-desc').innerHTML = 'Fred Flinstone';
	}
	
	<?php if ( is_home() ){ ?>
	// Homepage box size fix (reservation, what's hot, and feed )
		$(window).load(function(){
			reservationHeight = $("#reservationWidget").height();
			whatshotHeight = $("#whatsHotWidget").height();
			if (reservationHeight > whatshotHeight){
				$("#whatsHotWidget").css("height",reservationHeight+"px");
				$("#feedWidget").css("height",reservationHeight+"px");
			}else{
				$("#reservationWidget").css("height",whatshotHeight+"px");
				$("#feedWidget").css("height",whatshotHeight+"px");
			}
		});
	<?php } ?>
	</script>
	<script src="<?PHP bloginfo( 'template_url' ) ?>/js/jwplayer.js" type="text/javascript"></script> <!-- Load JW PLAYER-->
	<!-- Load Fonts -->
	<script src="<?PHP bloginfo( 'template_url' ) ?>/fonts/frutiger.js" type="text/javascript"></script> <!-- Frutiger -->
	<script src="<?PHP bloginfo( 'template_url' ) ?>/js/jquery.jtwitter.min.js" type="text/javascript"></script> <!-- Load jQuery -->
	
	<!-- Make the Fonts work -->
	<script type="text/javascript">
				Cufon.replace('.frutiger');
	</script>
	
	<script type="text/javascript">
		$(function(){
    //Get our elements for faster access and set overlay width
    var div = $('div.sc_menu'),
                 ul = $('ul.sc_menu'),
                 // unordered list's left margin
                 ulPadding = 15;

    //Get menu width
    var divWidth = div.width();

    //Remove scrollbars
    div.css({overflow: 'hidden'});

    //Find last image container
    var lastLi = ul.find('li:last-child');

    //When user move mouse over menu
    div.mousemove(function(e){

      //As images are loaded ul width increases,
      //so we recalculate it each time
      var ulWidth = lastLi[0].offsetLeft + lastLi.outerWidth() + ulPadding;

      var left = (e.pageX - div.offset().left) * (ulWidth-divWidth) / divWidth;
      div.scrollLeft(left);
    });
});
</script>
	
	<?php wp_head(); ?>
</head> 
<body> 
	<div id="wrapper">
	
		<div id="header">
			<div id="innerwrapper">
				<div class="watermark"></div>
				
				<div class="headerlogo">
				</div>
				<div id="logo">
					<div class="logo aboveWMark">
						<a href="<?php bloginfo( 'siteurl' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/header/logo.png" /></a>
					</div>
					<div class="beta aboveWMark">
						beta
					</div>
					<div class="slogan aboveWMark frutiger">
						Quick Restaurant booking.
					</div>
				</div>
				<div class="mainnavigation aboveWMark" style="width: 517px;">
				
					<ul>
						<li><a title="Find your favorite resturants" href="http://"><span class="frutiger">How to find</span><br />
							Your favorite restaurants</a></li>
						<li><a title="Add your resturant" href="http://"><span class="frutiger blue">Add +</span><br />
							Your restaurant</a></li>
						<li class="last">
									<ul>
										<?php require("elements/connectIcons.php"); ?>
									</ul>
							<a title="Connect to your social media profile" href="http://">
								<span class="frutiger">Follow Us</span>
								<br />Just as our friends &amp; spammers do!
							</a>
						</li>	
					</ul>
				
				</div>
			</div>
		
			<div id="userbar">
				<div id="innerwrapper">
					
					<div class="userimage aboveWMark">
					
						<?php
							$user = get_userdata( get_current_user_id() );
							$size = "40";
							$default = "http://olufn.com/TabLE12TRAcKr/wp-content/themes/tabletracker/images/TT-Favicon_v1.png";
							
							
							$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->user_email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;	
						?>
						
												<img src="<?php echo $grav_url; ?>" <?php if ( !is_user_logged_in() ) { ?>style="border:none; box-shadow:none; -webkit-box-shadow: none; -moz-box-shadow:none;"<?php } ?> />
					</div>
					
						<?php 
						 if ( !is_user_logged_in() ) {
						?>
					<div class="userinfo aboveWMark" style="margin-top: 2px;">
						<a href="<?php echo wp_login_url() ?>" class="frutiger">Guest</a>
					</div>
						<?php
						 }
						?>
					
					<?php require_once('elements/usernav.php'); ?>
				</div>
			</div>
		
			<div id="locationbar">
				<div id="innerwrapper" class="aboveWMark">
					<?php require_once( 'elements/headerlocation.php' ); ?>
					
					<div class="wronglocation">
						<div class="newlocation">
							<input type="image" src="<?PHP bloginfo( 'template_url' ) ?>/images/go.png" style="background: none; border: none; float: right; position: relative; top: -10px;">
							<input type="text" style="width: 170px; padding: 3px 0; margin-top: 1px" value="San Francisco, California, EEUU"> 
						</div>
					
						<span>Not here?</span><br />
						Select a different location
					</div>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div id="innerwrapper" class="aboveWMark">
