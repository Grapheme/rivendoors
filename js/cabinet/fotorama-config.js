$(function(){
			
	var page_desc_height = $('.page-description-block').height();	
	$('.__fotorama').fotorama({
		nav: 'dots', 
		transition: 'fade',
		autoplay: 'false',			
		loop: true,		
		cropToFit: true,
		zoomToFit: true,
		width: '100%',
		/*minHeight: win_height,*/
		height: page_desc_height,
		arrows: false		
		/*,
		arrowNext: '<div class="arrows right_arrow"></div>',
		arrowPrev: '<div class="arrows left_arrow"></div>'*/
	});	
	
	$('.__fotorama-within-html').fotorama({	
		nav: 'none',	
		transition: 'slide',
		autoplay: 'false',
		margin: 0,
		caption: 'simple',
		alwaysPadding: true,
		minPadding: 30,
		loop: true,		
		cropToFit: true,
		zoomToFit: true,
		width: '100%',
		/*minHeight: win_height,*/
		height: '100%',
		arrows: true,
		arrowNext: '<div class="right_arrow"></div>',
		arrowPrev: '<div class="left_arrow"></div>'
	});	
	
});