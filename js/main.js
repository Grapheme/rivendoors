$(document).ready(function () {	
	/* Same height  */	
	if ($('.page-description-block').height() > $('.block-1').height())
	{
		$('.page-description-block').height($('.page-description-block').height());	
		$('.block-1').height($('.page-description-block').height());	
		$('.about-company-slideshow').height($('.page-description-block').height());	
		$('.__fotorama').trigger('rescale', [false, $('.page-description-block').height(), 700/467, 333]);
	}
	else {
		$('.page-description-block').height($('.block-1').height());
		$('.about-company-slideshow').height($('.block-1').height());
		$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);
	}	
	
	$(window).resize(function() {
		
		$('.block-1').height($('.page-description-block').height());
		$('.about-company-slideshow').height($('.block-1').height());
		$('.__fotorama').trigger('rescale', [false, $('.page-description-block').height(), 700/467, 333]);
		$('.about-page-text, .production').width($('.page-description-block').width() - 40);
	});	
	/* end of script */
	
	$('.about-page-text, .production').width($('.page-description-block').width() - 40);
	
	$('.red-cross').click( function(){
		$('.can-fade').animate({width: 'toggle'}, 800);	
		$('.green-cross-on-fade').css({'opacity' : '1', 'z-index' : '9999'});
		$('.simple-page-slideshow').css({width: '80%'});	
		$('.__fotorama-within-html').trigger('rescale', ['100%', $(window).height() / 100 * 80, 1.6, 1000]);
		$('.afterfade-block').toggle();
	});
	$('.green-cross-on-fade').click(function () { 
		$(this).css({'opacity' : '0', 'z-index' : '0'});
		$('.can-fade').animate({width: 'toggle'}, 800);
		$('.simple-page-slideshow').css({width: '60%'});	
		$('.__fotorama-within-html').trigger('rescale', ['100%', $(window).height() / 100 * 80, 1.6, 1000]);
		$('.afterfade-block').toggle();
	});
	/*$('.block-5').click( function() {		
		$(this).find('.block-description').delay(175).show('slide', {direction:'right'}, 250);
	});*/	
	
	/* =======================================================================================
	 * Scripts for media - 320px
	   ======================================================================================= */
	if ($(window).width() <= 335) {
		$(function() {		
			$('.wrapper').height( $(document).height() - 43);	
			$('footer').appendTo('.wrapper');
		});
	};
	
	$('.block-2, .block-3, .block-4, .block-5').click( function(){ 
		
	if ($(window).width() <= 320) {		
		
		
		if ($(this).hasClass('checkedDiv')){	
						
			$(this).removeClass('checkedDiv');
			$(this).find('.block-description').slideToggle(1000);
			$(this).animate({ 'margin-bottom': '0px' }, 400); 
			$(this).find('.block-name').animate({ backgroundColor: '#fff', color: '#562024' }, 250);
		}
		else {
			$('.checkedDiv').find('.block-description').slideToggle();
			$('.checkedDiv').animate({ 'margin-bottom': '0px' }, 400);
			$('.checkedDiv').find('.block-name').animate({ backgroundColor: '#fff', color: '#562024' }, 250);
			$('.checkedDiv').removeClass('checkedDiv');	
			$(this).addClass('checkedDiv');		
			$(this).find('.block-description').height($(this).find('.block-description-list').height());
			$(this).find('.block-name').animate({ backgroundColor: '#aead3a', color: "#fff"}, 250);	
			$(this).find('.block-description').slideToggle(1000);			
			$(this).animate({ 'margin-bottom': $(this).find('.block-description-list').height() }, 1000); 
		};	
	}	
	else {	
		if ($(this).hasClass('checkedDiv')){	
			
			$(this).removeClass('checkedDiv');	
			
			if($(this).hasClass('block-5')){
				$(this).find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$(this).find('.block-description').delay(350).hide('slide', {direction:'right'}, 250);
			}
			else{
				$(this).find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$(this).find('.block-description').animate({width: 'toggle'}, 500);					
			}
			
		}
		else {							
			
			if($('.checkedDiv').hasClass('block-5')){
				$('.checkedDiv').find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$('.checkedDiv').find('.block-description').delay(350).hide('slide', {direction:'right'}, 250);
				$('.checkedDiv').removeClass('checkedDiv');	
			}
			else{		
			$('.checkedDiv').find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
			$('.checkedDiv').find('.block-description').animate({width: 'toggle'}, 500);		
			$('.checkedDiv').removeClass('checkedDiv');				
			}
			
			$(this).addClass('checkedDiv');
			
			if ($(this).hasClass('block-5')) {
				
				$(this).find('.block-name').animate({width: '100%', left: '0', backgroundColor: '#aead3a', color: "#fff"}, 250);
				$(this).find('.block-description').delay(175).show('slide', {direction:'right'}, 250);	
							
			}
			else {		
							
				$(this).find('.block-name').animate({width: '100%', left: '0', backgroundColor: '#aead3a', color: "#fff"}, 250);	
				$(this).find('.block-description').delay(175).animate({width: 'toggle'}, 500);	
							
			}
		};		
		};		
	});
	
});
