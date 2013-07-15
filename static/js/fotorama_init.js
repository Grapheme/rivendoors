$(function(){
			
	var page_desc_height = $('.page-description-block').height() + 21;	
	$('.__fotorama').fotorama({
		nav: 'dots', 
		transition: 'fade',
		autoplay: true,			
		loop: true,		
		cropToFit: true,
		zoomToFit: true,
		width: '100%',
		/*minHeight: win_height,*/
		height: $(window).height(),
		arrows: false		
		/*,
		arrowNext: '<div class="arrows right_arrow"></div>',
		arrowPrev: '<div class="arrows left_arrow"></div>'*/
	});		
});