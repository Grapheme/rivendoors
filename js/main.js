var GOLDEN_RATIO = 1.6180339887;
var $aboutCompanySH = $('.about-company-slideshow');
var $jCarouselImgCont = $('.jcarousel-img-container');
var $jCarousel1 = $('.jcarousel');
var $jCarousel2 = $('.jcarousel2');
var windowObj = $(window);	
var $simplePageSlideshow = $('.simple-page-slideshow');
var $pageDescriptionBlock = $('.page-description-block');
var $contactsBlock = $('.wrapper-component.page-description-block.contacts-description-block');
var $aboutCompanySlideshow = $('.about-company-slideshow');
var $block1 = $('.block-1');
var scrollInitHeight = $('.scroll-pane').height();

/* function for smart init carousel controls
 * 
 */
function initCarouselControls() {
	var imgWidth = 0;		
	$('.jcarousel-img-container > img').load( function() {		
		$(this).each( function(){
			imgWidth += $(this).width();		
			if ( imgWidth < (windowObj.width() * 0.6 )) {
				$('.jcarousel-next').fadeOut( 800 );
			} else {
				$('.jcarousel-next').fadeIn( 800 );
			}
		});		
	});
};
/* function for scrollpane init
 * 
 */ 	
function scrollPaneInit() {
	var __pane = $('.scroll-pane').jScrollPane({
		showArrows: true,
		verticalDragMaxHeight: 40
	});
	return __pane.data('jsp');	
};
/* function for calc measurement of wrapper blocks
 * 
 */
function calcWrapperParts() {

	if ($('.page-description-block').width() == 256 && (windowObj.width() > 768))
	{
		$aboutCompanySH.css({ left: '512px' }).width(windowObj.width() - 512);
		$('.about-page-description-block').css({ left: '256px' });
		$('.can-fade').css({ left: '256px' });		
		if( $('.can-fade').is(':visible')){
			$simplePageSlideshow.width(windowObj.width() - 512).css({ left: '512px' });
		}
		$('.contacts-map').width(windowObj.width() - 512);
	}
	else if( $pageDescriptionBlock.width() == 340 && ($(window).width() > 768)) 
	{
		$aboutCompanySH.css({ left: '680px' }).width(windowObj.width() - 680);
		$('.about-page-description-block').css({ left: '340px' });
		$('.can-fade').css({ left: '340px' });			
		if( $('.can-fade').is(':visible')){
			$simplePageSlideshow.width(windowObj.width() - 680).css({ left: '680px' });
		}
		$('.contacts-map').width(windowObj.width() - 679);
	}	
	else if ($(window).width() > 768)
	{
		$aboutCompanySH.css({ left: '40%' }).width(windowObj.width() * 0.6);
		$('.about-page-description-block').css({ left: '20%' });
		$('.can-fade').css({ left: '20%' });
		if( $('.can-fade').is(':visible')){
			$simplePageSlideshow.width(windowObj.width() * 0.6).css({ left: '40%' });
		}
		$('.contacts-map').width(windowObj.width() * 0.6);
	};
};

function full_green() {
	if($('.slider-container').height() == 0) 
	{
		var $green_width = $(window).width() - $('.about-page-block-1').width();
		if($(window).width() > 767) 
		{ 
			$('.page-description-block').width($green_width).css({'left' : $('.about-page-block-1').width(), 'max-width' : 'none'});
		} else
		{
			$('.page-description-block').width('auto');
		}
		$('.about-page-text').width('auto');
		if($(window).width() > 500) {
			$('body').css('overflow-x', 'hidden');
		} else {
			$('body').css('overflow-x', 'visible');
		}
	}
}
/* Function for calc same heights
 * 
 */
function calcSameHeight(){	
	var $block1Height = $block1.height();		
	if ( $jCarouselImgCont.find('img').length > 10 ) {
		$aboutCompanySH.height( $block1Height );	
		$jCarousel1.add( $jCarousel2 ).height( $block1Height * 0.4);
		$jCarouselImgCont.height( $block1Height * 0.8 / 2 ).find('img').height( $block1Height * 0.8 / 2 );
	}
	else {
		$aboutCompanySH.height( $block1Height );	
		$jCarousel1.add( $jCarousel2 ).height( $block1Height * 0.8);
		$jCarouselImgCont.height( $block1Height * 0.74 ).find('img').height( $block1Height * 0.8 - 36);
	}
};
/* function for calc categories same height
 * 
 */
function calcCatSameHeight() {
	var $block1Height = $block1.height();
	$('.jcarousel-prev, .jcarousel-next').css({ 'top': '50%', 'margin-top': '-15px' });
	$simplePageSlideshow.css({ 'top' : '0' });
	
	if ( $jCarouselImgCont.find('img').length > 10 ) {
		$aboutCompanySH.height( $block1Height );	
		$jCarousel1.add( $jCarousel2 ).height( $block1Height * 0.5);
		$jCarouselImgCont.height( $block1Height * 1 / 2 ).find('img').height( $block1Height * 1 / 2 ).width( $(this).height()/GOLDEN_RATIO / 2 );
	}
	else {
		$aboutCompanySH.height( $block1Height );	
		$jCarousel1.add( $jCarousel2 ).height( $block1Height );
		$jCarouselImgCont.height( $block1Height ).find('img').height( $block1Height ).width( $(this).height()/GOLDEN_RATIO );
	}
}
/* function for calculation nav max height
 * 
 */	
function calcPanMaxHeight(api, initHeight) {
	 if(windowObj.width() <= 768) { $('.scroll-pane').height(initHeight); return; }
	 var scrollMaxHeight = calcScrollMaxHeight();			
	 if (initHeight > scrollMaxHeight) {
	 	$('.scroll-pane').height(scrollMaxHeight);	
	 } 
	 else {
	     $('.scroll-pane').height(initHeight);	
	 }
	 api.reinitialise();
};	
function calcScrollMaxHeight() {
	return $('.block-1').height() - $('.page-header').height() - $('footer').height() * 3;	
}
function alignDescriptionBlock() {
	if (windowObj.height() > $pageDescriptionBlock.height()) $pageDescriptionBlock.height(windowObj.height());
}
function alignCompanySlideshow() {
	$aboutCompanySlideshow.height($('.block-1').height());
}
function contactsBlockAlign() {
	
	if ( windowObj.height() > $contactsBlock.height() )
		{
			$contactsBlock.height( windowObj.height() );
		}
		else {
			$contactsBlock.css({ height: 'auto'});	
		}
}
function calcListHeight(api) {
	var scrollMaxHeight,
		listHeight = 0;
	if (windowObj.width() > 768){		
		$('.navigation-list-item').each( function() {
			listHeight += $(this).height();
		});		
		scrollMaxHeight = calcScrollMaxHeight();			
		if ( scrollMaxHeight > listHeight) {
			$('.scroll-pane').animate({ height: listHeight + 36}, 400, function(){ api.reinitialise(); });
		}
		else {
			$('.scroll-pane').animate({ height: scrollMaxHeight + 36}, 400, function(){ api.reinitialise(); });
		}
	}
}
function alignCatsBlock() {
	if( $('.category-wrapper')[0] ) {		
		$('.green-cross-on-fade').css({'opacity' : '1', 'z-index' : '9999'});
		
		if ( $pageDescriptionBlock.width() == 256){
			$simplePageSlideshow.animate({left: '256px', width: $(window).width() - 256}, 500);
		}
		else if( $pageDescriptionBlock.width() == 340) {
			$simplePageSlideshow.animate({left: '340px', width: $(window).width() - 340}, 500);
		}	
		else {
			$simplePageSlideshow.animate({left: '20%', width: '80%'}, 500);
		}	
	}
}

$(document).ready(function () {
	initCarouselControls();
	var api = scrollPaneInit();	
	calcPanMaxHeight(api, scrollInitHeight);			
	calcWrapperParts();	
	alignCatsBlock();
	/*initCarouselControls();	*/
	( $('.categories-container')[0] )? calcCatSameHeight(): calcSameHeight();	 	
	$('.active').parent().find('a[href$="#"]').css({ 'color': '#AEAD3A' });
	$('ul.active').show();
		
	var detFooter;
	var totalWidth = 0;
	var elemsCount = 0;
	var windowWidth = $('.slider-container').width();
		
	if (windowObj.height() > ($('.page-description-block').height() + 15))
	{		
		$('.page-description-block').height(windowObj.height());
	}
	else 
	{
		$('.page-description-block').css({ height: 'auto' });
	}
	if (windowObj.width() <= 768) {
		$aboutCompanySlideshow.height(288);
		$('.__fotorama').trigger('rescale', [false, $aboutCompanySlideshow.height(), 700/467, 333]);		
	};
	
	full_green();	
});	

windowObj.resize(function() {
	
	var api = scrollPaneInit(); 		
	calcPanMaxHeight(api, scrollInitHeight);
	
	calcWrapperParts();			
	( $('.categories-container')[0] )? calcCatSameHeight(): calcSameHeight();	
	alignDescriptionBlock();
	contactsBlockAlign();
	alignCompanySlideshow();	
	if (windowObj.width() > 768) {		
		$('.__fotorama').trigger('rescale', [false, $('.block-1').height()]);
	}
	$('.about-page-text, .production').width($('.page-description-block').width() - 40);	
	if (windowObj.width() <= 768) {
		$aboutCompanySlideshow.height(288);
		$('.__fotorama').trigger('rescale', [false, $aboutCompanySlideshow.height(), 700/467, 333]);	
		calcPanMaxHeight(api, scrollInitHeight);			
	};
	
	full_green();
});	
	/* end of script */	
	

	
	$('.about-page-text, .production').width( $pageDescriptionBlock.width() - 40);
	
	$('.red-cross').click( function(){
		$('.can-fade').css({ 'min-width': '0px'});
		$('.can-fade').animate({width: 'toggle'}, 500);	
		$('.green-cross-on-fade').css({'opacity' : '1', 'z-index' : '9999'});
		
		if ( $pageDescriptionBlock.width() == 256){
			$simplePageSlideshow.animate({left: '256px', width: $(window).width() - 256}, 500);
		}
		else if( $pageDescriptionBlock.width() == 340) {
			$simplePageSlideshow.animate({left: '340px', width: $(window).width() - 340}, 500);
		}	
		else {
			$simplePageSlideshow.animate({left: '20%', width: '80%'}, 500);
		}		
			
		$('.afterfade-block').toggle();
	});
	$('.green-cross-on-fade').click(function () { 
		$(this).css({'opacity' : '0', 'z-index' : '0'});
		$('.can-fade').animate({width: 'toggle'}, 400);
		
		if ($('.block-1').width() == 256){
			$simplePageSlideshow.animate({left: '512px', width: $(window).width() - 512}, 500);
		}
		else if($('.block-1').width() == 340) {
			$simplePageSlideshow.animate({left: '680px', width: $(window).width() - 680}, 500);
		}	
		else {
			$simplePageSlideshow.animate({left: '40%', width: '60%'}, 500);
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
	});
	

	if ($(window).width() <= 768) {		
		$('.__fotorama').trigger('rescale', [false, $('.about-company-slideshow').height(), 700/467, 333]);
	};
	
/*index blocks onclick event*/	
	
$('.block-2, .block-3, .block-4, .block-5').click( function(event){ 
		
	$('.block-description-list-item h3 > a').click(function(event){
		event.stopPropagation();	
	}); 	
		
	if (windowObj.width() <= 768) {		
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
	

