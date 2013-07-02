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
	var page_desc_height = $('.page-description-block').height();	
	$('.__fotorama').fotorama({
		nav: 'dots', 
		transition: 'fade',
		autoplay: 'false',
		margin: 0,
		minPadding: 0,
		loop: true,		
		cropToFit: true,
		width: '100%',
		/*minHeight: win_height,*/
		height: page_desc_height,
		arrows: false		
		/*,
		arrowNext: '<div class="arrows right_arrow"></div>',
		arrowPrev: '<div class="arrows left_arrow"></div>'*/
	});	
	
});