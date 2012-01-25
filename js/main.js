var currentImg 	= 0;
var totalImg	= 0;

var currScroll = 0;
var blogPostsHeight = 0;
var maxScroll = 0;

$(function() {
	totalImg	= $('#imagesslide img').size();
	
	if (totalImg > 0) {
		if (totalImg > 1) {
			setInterval(changeImg, 5000);
		} else { changeImg(); }
		var picHeight = $('#imagesslide img:eq('+ currentImg +')').height();
		var align = $('#imagesslide img:eq('+ currentImg +')').attr('imgalign').toLowerCase();
		var picWidth = $('#imagesslide img:eq('+ currentImg +')').width();
		
		if (align == 'center') {
			var leftOffset = (380-picWidth)/2;
		} else if (align == 'right') {
			var leftOffset = (380-picWidth);
		} else {
			var leftOffset = 0;
		}
		
		if (leftOffset < 0) { leftOffset = 0; }
		
		$('#imagesslide').css({
			left: leftOffset + 'px',
			top: (500-picHeight) + 'px'
		});			
	}
			
	$('#twitter_popup').click(function(event) {
    	var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
        		 ',width='  + width  +
        		 ',height=' + height +
        		 ',top='    + top    +
        		 ',left='   + left;

   			window.open(url, 'twitter', opts);

    	return false;
  	});
  	
  	if ($("#shortbio div").size()) {
  		var bio = $("#shortbio div").html().split(' ');
		$("#shortbio div").html('');
		var currentWord = currDiv = 0;
		var i = 0;
		while (currentWord < bio.length) {
			$("#shortbio").append('<div></div>');
					
			while ($("#shortbio div:eq("+ currDiv +")").height() < 100 && currentWord < bio.length) {
				var nwText = bio[currentWord].replace('[tabletracker]','<a href="http://tabletracker.com"><img src="'+ templateUrl +'/images/tt-logo.png"/></a>');
				$("#shortbio div:eq("+ currDiv +")").html( $("#shortbio div:eq("+ currDiv +")").html() +' '+ nwText );
				currentWord++;
				i++;
			}
			currDiv++;
		}
		
		if (currDiv == 1) {
			$('#shortbio_next').hide();
		}
			
		$(".shortbio_scroll").scrollable({ circular: false });
			
		$("#shortbio_next").click(function() {
			$('.shortbio_scroll').data("scrollable").next();	
			if ($('.shortbio_scroll').data("scrollable").getIndex() == 1) {
				$('#shortbio_back').fadeIn('slow');
			}
			if ( $('.shortbio_scroll').data("scrollable").getIndex() >= (currDiv-1)) {
				$(this).fadeOut('slow');
			}		
		});
		
		$("#shortbio_back").click(function() {
			$('.shortbio_scroll').data("scrollable").prev();	
			if ( $('.shortbio_scroll').data("scrollable").getIndex() == 0) {
				$(this).fadeOut();
				$("#shortbio_next").fadeIn();
			}
		});
  	}
  	
  	
  if ($('.activity').size()) {
  	$('#scrolls').append('<a href="#" class="scrollUp" style="position: absolute; color: #1D1D20;  top: 200px;">&#9650;</a>');
  	$('#scrolls').append('<a href="#" class="scrollDown" style="position: absolute; color: #1D1D20;  top: 350px;">&#9660;</a>');
  		
  	var nID = document.location.hash;
  	if ( nID ) {
  		setTimeout(function(){
  			$('body').scrollTop(0); $('div').scrollTop(0);
  				
  			var topPosition = $(nID).position().top;
  			currScroll = -topPosition;
  			updateScrollUpdate();
  		}, 500);
  	}
  		
  	$('li.activity').click(function(){
  		var topPosition = $(this).position().top;
  		currScroll = -topPosition-70;
  		updateScrollUpdate();
  	});
  	maxScroll = $('#activity-stream').height()-300;
		$('.scrollUp').click(function(){
			//$('.activity').scrollTop(0);
			currScroll += 300;
			updateScrollUpdate();
		});
		
		if ( maxScroll < 0 ) {
			$('.scrollDown').hide();
		}
		
		$('.scrollDown').click(function(){
			$('.activity').scrollTop(0);
			currScroll -= 300;
			updateScrollUpdate();
		});
		updateScrollUpdate();
	}
	
	$('#memolane_expand').click(function(){
		
		$("#memolane span iframe").appendTo("#huge_memolane");
		$('#huge_memolane').css({ zIndex: 999 });
		$("#huge_memolane iframe").css({
			height: 549,
			width: '100%'
		});
		
	});
	
	$('#memolane_contract').click(function(){
		
		$("#huge_memolane iframe").appendTo("#memolane");
		$('#huge_memolane').css({ zIndex: -100 });
		$("#memolane iframe").css({
			height: 342,
			width: 570
		});
		
	});
	
	/* facebook accessToken */
	var accessToken = document.location.hash;
	if ( accessToken.substr(0,13) == '#access_token' ) {
		var access_token = accessToken.substr(14);
		access_token = access_token.split('&')
		alert('Access Token: \n' + access_token[0]);
	}
});

function updateScrollUpdate() {
	if ( currScroll >= 0 ) {
		currScroll = 0;
		$('.scrollUp').fadeOut();
	} else { 
		$('.scrollUp').fadeIn();
	}
	if ( currScroll <= -maxScroll ) {
		currScroll = -maxScroll;
		$('.scrollDown').fadeOut();
	} else {  
		$('.scrollDown').fadeIn();
	}
	$('.activity').animate({top: currScroll}, 700);
}

function changeImg() {
	$('#imagesslide img:eq('+ currentImg +')').fadeOut(500);
					
	currentImg++;
	if (currentImg >= totalImg) {
		currentImg = 0;
	}
	setTimeout(function(){
		$('#imagesslide img:eq('+ currentImg +')').fadeIn(500);
		var picHeight = $('#imagesslide img:eq('+ currentImg +')').height();
		var align = $('#imagesslide img:eq('+ currentImg +')').attr('imgalign').toLowerCase();
		
		var picWidth = $('#imagesslide img:eq('+ currentImg +')').width();
		
		if (align == 'center') {
			var leftOffset = (380-picWidth)/2;
		} else if (align == 'right') {
			var leftOffset = (380-picWidth);
		} else {
			var leftOffset = 0;
		}
		
		if (leftOffset < 0) { leftOffset = 0; }
		
		$('#imagesslide').css({
			left: leftOffset + 'px',
			top: (500-picHeight) + 'px'
		});
	}, 550);
					
}

function openSocial(s, t)
{
	$('#fade2').show();
	$('#socialOverview').show();
	$('.socialOverview').hide();
	$('#SocialOverview_' + s).show();
	
	if ( t ) {
		$('.box_button').removeClass('box_button_active');
		$(t).addClass('box_button_active');
	} else {
		$('.box_button').removeClass('box_button_active');
		$('a[onclick="openSocial(\''+ s +'\', this)"]').addClass('box_button_active');
	}
}

function openNewactivity()
{
	$('#fade2').show();
	$('#newActivity').show();
	$('.newActivity').hide();
}

function openLoginPopup()
{
	$('#fade2').show();
	$('#loginPopup').show();
	$('.loginPopup').hide();
}

function openRegisterPopup()
{
	$('#fade2').show();
	$('#registerPopup').show();
	$('.registerPopup').hide();
}

function replaceURLWithHTMLLinks(text) {
  var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
  return text.replace(exp,"<a href='$1'>$1</a>"); 
}