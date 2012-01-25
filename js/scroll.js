/*  if ($('#activity-stream').size()) {
  	$('#scrolls ').append('<a href="#" class="scrollUp">&#9650;</a>');
  	$('#scrolls').append('<a href="#" class="scrollDown">&#9660;</a>');
  		
  	var nID = document.location.hash;
  	if ( nID ) {
  		setTimeout(function(){
  			$('body').scrollTop(0); $('div').scrollTop(0);
  				
  			var topPosition = $(nID).position().top;
  			currScroll = -topPosition;
  			updateScrollUpdate();
  		}, 500);
  	}
  		
  	$('.activity-header p').click(function(){
  		var topPosition = $(this).position().top;
  		currScroll = -topPosition-70;
  		updateScrollUpdate();
  	});
  		
  	maxScroll = $('#activity-stream').height()-410;
		$('.scrollUp').click(function(){
			$('#activity-stream').scrollTop(0);
			currScroll += 400;
			updateScrollUpdate();
		});
		
		if ( maxScroll < 0 ) {
			$('.scrollDown').hide();
		}
		
		$('.scrollDown').click(function(){
			$('#activity-stream').scrollTop(0);
			currScroll -= 400;
			updateScrollUpdate();
		});
	}

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
}*/