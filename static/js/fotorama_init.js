$(function(){
	
	/*var win_height = $(window).height();	
	var main_block_height = $('.block-1').height();
	var page_desc_height = $('.page-description-block').height();
	var current_height = ( main_block_height > page_desc_height ) ? main_block_height : page_desc_height;
	
	$(window).resize( function() {
		win_height = $(window).height();
		main_block_height = $('.block-1').height();
		page_desc_height = $('.page-description-block').height();		
		current_height = ( main_block_height > page_desc_height ) ? main_block_height : page_desc_height;			
		$('.about-company-slideshow').height(current_height);
		$('.__fotorama').fotorama({
			height: win_height
		});
	});
	
		*/
			
	var page_desc_height = $('.page-description-block').height() + 21;	
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