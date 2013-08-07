$(document).ready(function () {	
	
	$('.jcarousel-img-container > img').load( function() {
		var imgWidth = 0;
		$('.jcarousel-img-container > img').each( function() {
			imgWidth += $(this).width();
		});
		if ( imgWidth <= ($(window).width() * 0.6 )) {
			$('.jcarousel-next').hide();
		};
	});
	
	/* Same height  */	
	$('.about-company-slideshow').height($('.block-1').height());	
	$('.jcarousel').height($('.page-description-block').height() * 0.8);	
	$('.jcarousel-img-container').height($('.page-description-block').height() * 0.74 );
	$('.jcarousel-img-container img').height($('.page-description-block').height() * 0.8 - 36);
	$('.active').parent().find('a[href$="#"]').css({ 'color': '#AEAD3A' });
	$('ul.active').show();
	/*$('.fb-like').hide();
	/* Only for wide screen*/
	
	if ($(window).width() > 768){
	var scrollMaxHeight = $('.block-1').height() - $('.page-header').height() - $('footer').height() * 3 - 84;
	var scrollHeight = $('.scroll-pane').height();	
	var navHeight = $('.scroll-pane').height();	
	if (scrollHeight > scrollMaxHeight) {
		$('.scroll-pane').height(scrollMaxHeight);
			$(function() {
			$('.scroll-pane').jScrollPane({
								showArrows: true,
								verticalDragMaxHeight: 40
				});
			});
		}	
	};
	if ($('.page-description-block').width() == 256 && ($(window).width() > 768))
		{
			$('.about-company-slideshow').css({ left: '512px' });
			$('.about-company-slideshow').width($(window).width() - 512);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
			$('.about-page-description-block').css({ left: '256px' });
			$('.can-fade').css({ left: '256px' });			
			$('.simple-page-slideshow').width($(window).width() - 512);
			$('.simple-page-slideshow').css({ left: '512px' });
			$('.contacts-map').width($(window).width() - 512);
		}
	else if($('.page-description-block').width() == 340 && ($(window).width() > 768)) 
		{
			$('.about-company-slideshow').css({ left: '680px' });
			$('.about-company-slideshow').width($(window).width() - 680);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
			$('.about-page-description-block').css({ left: '340px' });
			$('.can-fade').css({ left: '340px' });			
			$('.simple-page-slideshow').width($(window).width() - 680);
			$('.simple-page-slideshow').css({ left: '680px' });
			$('.contacts-map').width($(window).width() - 680);
		}	
	else if ($(window).width() > 768)
		{
			$('.about-company-slideshow').css({ left: '40%' });
			$('.about-company-slideshow').width($(window).width() * 0.6);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
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
		scrollMaxHeight = $('.block-1').height() - $('.page-header').height() - $('footer').height() * 3 - 84;		
		if ($(window).width() > 768){
			 
			if (scrollHeight > scrollMaxHeight) {
				$('.scroll-pane').height(scrollMaxHeight);
				$('.scroll-pane').jScrollPane({
					showArrows: true,
					verticalDragMaxHeight: 40
				});				
			}
			/*else {
				$('.scroll-pane').height(navHeight);
				$('.scroll-pane').jScrollPane({
							showArrows: true,
							verticalDragMaxHeight: 40
				});
			}	*/
		};
		
		$('.about-company-slideshow').height($('.page-description-block').height());	
		$('.jcarousel').height($('.page-description-block').height() * 0.8);	
		$('.jcarousel-img-container').height($('.page-description-block').height() * 0.74 );
		$('.jcarousel-img-container img').height($('.page-description-block').height() * 0.8 - 36);
		
		/* Contacts, about and sample page resize block */
		
		if ($('.page-description-block').width() == 256 && ($(window).width() > 768))
		{
			$('.about-company-slideshow').css({ left: '512px' });
			$('.about-company-slideshow').width($(window).width() - 512);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
			$('.about-page-description-block').css({ left: '256px' });
			$('.can-fade').css({ left: '256px' });			
			$('.simple-page-slideshow').width($(window).width() - 512);
			$('.simple-page-slideshow').css({ left: '512px' });
			$('.contacts-map').width($(window).width() - 512);
		}
	else if($('.page-description-block').width() == 340 && ($(window).width() > 768)) 
		{
			$('.about-company-slideshow').css({ left: '680px' });
			$('.about-company-slideshow').width($(window).width() - 680);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
			$('.about-page-description-block').css({ left: '340px' });
			$('.can-fade').css({ left: '340px' });			
			$('.simple-page-slideshow').width($(window).width() - 680);
			$('.simple-page-slideshow').css({ left: '680px' });
			$('.contacts-map').width($(window).width() - 680);
		}	
	else if ($(window).width() > 768)
		{
			$('.about-company-slideshow').css({ left: '40%' });
			$('.about-company-slideshow').width($(window).width() * 0.6);
			/*$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);*/
			$('.about-page-description-block').css({ left: '20%' });
			$('.can-fade').css({ left: '20%' });
			$('.simple-page-slideshow').width($(window).width() * 0.6);
			$('.simple-page-slideshow').css({ left: '40%' });
			$('.contacts-map').width($(window).width() * 0.6);
		};
		
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
		if ($(window).width() > 768) {
			$('.__fotorama').trigger('rescale', [false, $('.block-1').height(), 700/467, 333]);
		}
		/*$('.__fotorama').trigger('rescale', [false, $('.page-description-block').height(), 700/467, 333]);*/
		$('.about-page-text, .production').width($('.page-description-block').width() - 40);
		
		if ($(window).width() < 750) {
			$(function() {		
				/*$('.wrapper').height( $(document).height());*/
			
				detFooter = $('footer').detach();	
				$('.wrapper').append(detFooter);
				$('.__fotorama').trigger('rescale', [false, '18em', 700/467, 333]);			
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
	
	$('.navigation-list-item > a').click( function() {
		
		scrollMaxHeight = $('.block-1').height() - $('.page-header').height() - $('footer').height() * 3 - 84;		
		if ($(window).width() > 768){
			 
			if (scrollHeight > scrollMaxHeight) {
				$('.scroll-pane').height(scrollMaxHeight);
				$('.scroll-pane').jScrollPane({
					showArrows: true,
					verticalDragMaxHeight: 40
				});				
			}
			/*else {
				$('.scroll-pane').height(navHeight);
				$('.scroll-pane').jScrollPane({
							showArrows: true,
							verticalDragMaxHeight: 40
				});
			}	*/
		};
		
		$('.active').slideUp( 1000 );
		$('.active').removeClass('active');
		if ($(this).hasClass('visible-sub-list')) {
			$(this).removeClass('visible-sub-list');
			$(this).parent().find('.subnavigation-list').slideToggle( 1000 );			
		}
		else {
			if ( $('.visible-sub-list')[0] ) { /* if exists case */				
				$('.visible-sub-list').parent().find('.subnavigation-list').slideToggle( 1000 );	
				$('.visible-sub-list').removeClass('visible-sub-list');
				$(this).addClass('visible-sub-list').parent().find('.subnavigation-list').delay( 1000 ).slideToggle( 1000 );
			}
			else {
				$(this).addClass('visible-sub-list').parent().find('.subnavigation-list').slideToggle( 1000 );
			}				
			
		}	
	});
	
	$('.about-page-text, .production').width($('.page-description-block').width() - 40);
	
	$('.red-cross').click( function(){
		$('.can-fade').css({ 'min-width': '0px'});
		$('.can-fade').animate({width: 'toggle'}, 500);	
		$('.green-cross-on-fade').css({'opacity' : '1', 'z-index' : '9999'});
		
		if ($('.page-description-block').width() == 256){
			$('.simple-page-slideshow').animate({left: '256px', width: $(window).width() - 256}, 500);
		}
		else if($('.page-description-block').width() == 340) {
			$('.simple-page-slideshow').animate({left: '340px', width: $(window).width() - 340}, 500);
		}	
		else {
			$('.simple-page-slideshow').animate({left: '20%', width: '80%'}, 500);
		}		
			
		$('.afterfade-block').toggle();
	});
	$('.green-cross-on-fade').click(function () { 
		$(this).css({'opacity' : '0', 'z-index' : '0'});
		$('.can-fade').animate({width: 'toggle'}, 400);
		
		if ($('.block-1').width() == 256){
			$('.simple-page-slideshow').animate({left: '512px', width: $(window).width() - 512}, 500);
		}
		else if($('.block-1').width() == 340) {
			$('.simple-page-slideshow').animate({left: '680px', width: $(window).width() - 680}, 500);
		}	
		else {
			$('.simple-page-slideshow').animate({left: '40%', width: '60%'}, 500);
		}			
		
		$('.afterfade-block').toggle();
		/*$('.can-fade').css({ 'min-width': '256px'});*/
	});
	
	/* ======================================================================================
	 * Social likes onclick
	   ======================================================================================*/
	
	$('.like-button>a').click( function() {
		
		if ($(this).parent().css('float') == 'left') {
			$(this).parent().css({ 'float': 'none' });
			$('.facebook-like').toggle();
			/*$('.facebook-like').css({ 'float': 'left' });*/
			$('.vkontakte-like').toggle();
			/*$('.vkontakte-like').css({ 'float': 'left' });*/
		}
		else {
			$(this).parent().css({ 'float': 'left' });
			$('.facebook-like').toggle();
			/*$('.facebook-like').css({ 'float': 'left' });*/
			$('.vkontakte-like').toggle();
			/*$('.vkontakte-like').css({ 'float': 'left' });*/
		}
	})
	
	/* =======================================================================================
	 * Scripts for media - 320px
	   ======================================================================================= */
	if ($(window).width() <= 768) {
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
		
	if ($(window).width() <= 768) {		
		
		
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
