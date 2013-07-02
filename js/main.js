/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

var rivD = rivD || {};
rivD.h_init = function() {
	rivD.wh = $(window).height();
	rivD.block1_h = $('.block1').height();
}

$(document).ready(function () {
	$('.can-fade').click( function(){
		$(this).animate({width: 'toggle'}, 500);
	});
	$('.block-2, .block-3, .block-4, .block-5').click( function(){
		if ($(this).hasClass('checkedDiv')){
			$(this).removeClass('checkedDiv');
			if($(this).hasClass('block-5')){
				$(this).find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$(this).find('.block-description').delay(350).hide('slide', {direction:'right'}, 250);
			}else{
				$(this).find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$(this).find('.block-description').animate({width: 'toggle'}, 500);
			}
		}else{
			if($('.checkedDiv').hasClass('block-5')){
				$('.checkedDiv').find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$('.checkedDiv').find('.block-description').delay(350).hide('slide', {direction:'right'}, 250);
				$('.checkedDiv').removeClass('checkedDiv');
			}else{
				$('.checkedDiv').find('.block-name').delay(350).animate({width: '95%', left: '2.5%', backgroundColor: '#fff', color: '#562024' }, 250);
				$('.checkedDiv').find('.block-description').animate({width: 'toggle'}, 500);
				$('.checkedDiv').removeClass('checkedDiv');
			}
			$(this).addClass('checkedDiv');
			if ($(this).hasClass('block-5')){
				$(this).find('.block-name').animate({width: '100%', left: '0', backgroundColor: '#aead3a', color: "#fff"}, 250);
				$(this).find('.block-description').delay(175).show('slide', {direction:'right'}, 250);
			}else {
				$(this).find('.block-name').animate({width: '100%', left: '0', backgroundColor: '#aead3a', color: "#fff"}, 250);
				$(this).find('.block-description').delay(175).animate({width: 'toggle'}, 500);
			}
		};
	});
});
