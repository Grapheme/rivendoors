$(document).ready(function () {	
	
	/* Same height  */	
	$('.about-company-slideshow').height($('.block-1').height());	
	$('.jcarousel').height($('.page-description-block').height() * 0.8);	
	$('.jcarousel-img-container').height($('.page-description-block').height() * 0.74 );
	$('.jcarousel-img-container img').height($('.page-description-block').height() * 0.8 - 36);
	
	if ($('.page-description-block').width() == 256)
		{
			$('.about-company-slideshow').css({ left: '512px' });
			$('.about-page-description-block').css({ left: '256px' });
			$('.can-fade').css({ left: '256px' });			
			$('.simple-page-slideshow').width($(window).width() - 512);
			$('.simple-page-slideshow').css({ left: '512px' });
			$('.contacts-map').width($(window).width() - 512);
		}
	else if($('.page-description-block').width() == 340) 
		{
			$('.about-company-slideshow').css({ left: '680px' });
			$('.about-page-description-block').css({ left: '340px' });
			$('.can-fade').css({ left: '340px' });			
			$('.simple-page-slideshow').width($(window).width() - 680);
			$('.simple-page-slideshow').css({ left: '680px' });
			$('.contacts-map').width($(window).width() - 680);
		}	
	else 
		{
			$('.about-company-slideshow').css({ left: '40%' });
			$('.about-page-description-block').css({ left: '20%' });
			$('.can-fade').css({ left: '20%' });
			$('.simple-page-slideshow').width($(window).width() * 0.6);
			$('.simple-page-slideshow').css({ left: '40%' });
			$('.contacts-map').width($(window).width() * 0.6);
		};
	
	var detFooter;
	var totalWidth = 0;
	var elemsCount = 0;
	var windowWidth = $('.slider-container').width();
		
	if ($(window).height() > ($('.page-description-block').height() + 15))
	{		
		$('.page-description-block').height($(window).height());
	}
	else 
	{
		$('.page-description-block').css({ height: 'auto' });
	}	
		
	$(window).resize(function() {
		$('.about-company-slideshow').height($('.page-description-block').height());	
		$('.jcarousel').height($('.page-description-block').height() * 0.8);	
		$('.jcarousel-img-container').height($('.page-description-block').height() * 0.74 );
		$('.jcarousel-img-container img').height($('.page-description-block').height() * 0.8 - 36);
		
		/* Contacts, about and sample page resize block */
		
		if ($('.page-description-block').width() == 256)
		{
			$('.about-company-slideshow').css({ left: '512px' });
			$('.about-page-description-block').css({ left: '256px', height: 'auto' });
			$('.can-fade').css({ left: '256px' });			
			$('.simple-page-slideshow').width($(window).width() - 512);
			$('.simple-page-slideshow').css({ left: '512px' });
			$('.contacts-map').width($(window).width() - 512);
		}
		else if ($('.page-description-block').width() == 340) 
		{
			$('.about-company-slideshow').css({ left: '680px' });
			$('.about-page-description-block').css({ left: '340px' });
			$('.can-fade').css({ left: '340px' });			
			$('.simple-page-slideshow').width($(window).width() - 680);
			$('.simple-page-slideshow').css({ left: '680px' });
			$('.contacts-map').width($(window).width() - 68);
		}		
		else 
		{
			$('.about-company-slideshow').css({ left: '40%' });
			$('.about-page-description-block').css({ left: '20%', height: 'auto' });
			$('.can-fade').css({ left: '20%' });
			$('.simple-page-slideshow').width($(window).width() * 0.6);
			$('.simple-page-slideshow').css({ left: '40%' });
			$('.contacts-map').width($(window).width() * 0.6);
		}
		
		if ($(window).height() > $('.page-description-block').height())
		{
			$('.page-description-block').height($(window).height());
		}
		if ($(window).height() > $('.wrapper-component.page-description-block.contacts-description-block').height())
		{
			$('.wrapper-component.page-description-block.contacts-description-block').height($(window).height());
		}
		else {
			$('.wrapper-component.page-description-block.contacts-description-block').css({ height: 'auto'});	
		}
		
		$('.about-company-slideshow').height($('.block-1').height());
		$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);
		/*$('.__fotorama').trigger('rescale', [false, $('.page-description-block').height(), 700/467, 333]);*/
		$('.about-page-text, .production').width($('.page-description-block').width() - 40);
		
		if ($(window).width() <= 463) {
			$(function() {		
				/*$('.wrapper').height( $(document).height());*/
			
				detFooter = $('footer').detach();	
				$('.wrapper').append(detFooter);
				$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);			
				$('footer').css({ visibility: 'visible' });
			});
		}
		else {
			$(function() {
				detFooter = $('footer').detach();
				$('.block-1').append(detFooter);
				/*$('.wrapper').css({ height: '100%' });*/
		});
		};
	});	
	/* end of script */
	
	/*$('.navigation-list-item').click( function() {
		if ($(this).hasClass('visible-sub-list')) {
			$(this).removeClass('visible-sub-list');
			$(this).find('.subnavigation-list').slideToggle( 1000 );			
		}
		else {
			$('.visible-sub-list').find('.subnavigation-list').slideToggle( 1000 );	
			$('.visible-sub-list').removeClass('visible-sub-list');
			$(this).addClass('visible-sub-list').find('.subnavigation-list').slideToggle( 1000 );
		}	
	});*/
	
	$('.about-page-text, .production').width($('.page-description-block').width() - 40);
	
	$('.red-cross').click( function(){
		$('.can-fade').css({ 'min-width': '0px'});
		$('.can-fade').animate({width: 'toggle'}, 400);	
		$('.green-cross-on-fade').css({'opacity' : '1', 'z-index' : '9999'});
		$('.simple-page-slideshow').animate({left: '20%', width: '80%'}, 400);	
		$('.afterfade-block').toggle();
	});
	$('.green-cross-on-fade').click(function () { 
		$(this).css({'opacity' : '0', 'z-index' : '0'});
		$('.can-fade').animate({width: 'toggle'}, 400);
		$('.simple-page-slideshow').animate({left: '40%', width: '60%'}, 400);
		$('.afterfade-block').toggle();
		/*$('.can-fade').css({ 'min-width': '256px'});*/
	});
	
	/* =======================================================================================
	 * Scripts for media - 320px
	   ======================================================================================= */
	if ($(window).width() <= 463) {
		$(function() {		
			/*$('.wrapper').height( $(document).height());*/
			
			detFooter = $('footer').detach();	
			$('.wrapper').append(detFooter);
			
			$('footer').css({ visibility: 'visible' });
			$('.__fotorama').trigger('rescale', [false, $('.about-company-slideshow').height(), 700/467, 333]);
		});
	}
	else {
		$(function() {
			detFooter = $('footer').detach();
			$('.block-1').append(detFooter);
		});
	};
	
	$('.block-2, .block-3, .block-4, .block-5').click( function(){ 
		
	if ($(window).width() <= 480) {		
		
		
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
			$(this).animate({ 'margin-bottom': $(this).find('.block-description-list').height()}, 1000); 
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
