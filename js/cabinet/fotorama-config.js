$(function(){
	
	var win_height = $(window).height();
	
	$(window).resize( function() {
		win_height = $(window).height();
		$('.about-company-slideshow').height(win_height);
		$('.__fotorama').fotorama({
			height: win_height
		});
	});
	
		
	$('.__fotorama').fotorama({
		nav: 'dots', 
		transition: 'fade',
		autoplay: 'false',
		margin: 0,
		minPadding: 0,
		loop: true,
		cropToFit: true,
		width: '100%',
		height: win_height/*,
		arrowNext: '<div class="arrows right_arrow"></div>',
		arrowPrev: '<div class="arrows left_arrow"></div>'*/
	});	
	
});