// Функция для определения отступа карусели и ее ширины
function carouselPosition() {

		$('.container-carousel-new').css({
				
				'left': $('.block-1').width()+2,
				'width': $(window).width() - $('.block-1').width()
		});
		$('.slider-center').css({
				
				'top':'12.5%'
		});
		
}

//Функция для определения отступа для блока описания
function aboutPosition() {

		$('.description-new').css({
		
				'left': $('.block-1').width()+2,
				'top': 0,
				'min-height': $('.block-1').height()
		
		});
}

$(document).ready(function(){
	if(window.innerWidth > 768) {
		carouselPosition();
		aboutPosition();
	} else {
		$('.page-description-block').addClass('can-fade');
		$('.page-description-block').addClass('wrapper-component');
		$('.page-description-block').removeClass('description-new');
		
		$('.container-carousel-new').addClass('simple-page-slideshow');
		$('.container-carousel-new').removeClass('container-carousel-new');
	}
});

$(window).resize(function(){
	if(window.innerWidth > 768) {
		$('.page-description-block').removeClass('can-fade');
		$('.page-description-block').removeClass('wrapper-component');
		$('.page-description-block').addClass('description-new');
		
		$('.simple-page-slideshow').addClass('container-carousel-new');
		$('.simple-page-slideshow').removeClass('simple-page-slideshow');
		carouselPosition();
		aboutPosition();
	} else {
		$('.page-description-block').addClass('can-fade');
		$('.page-description-block').addClass('wrapper-component');
		$('.page-description-block').removeClass('description-new');
		
		$('.container-carousel-new').addClass('simple-page-slideshow');
		$('.container-carousel-new').removeClass('container-carousel-new');

		$('.description-new').css({
				
				'left': 0,
				'top': $('.block-1').height(),
				'min-height': '0px',
				'height': 'auto'
		});
		$('.container-carousel-new').css({
		
				'left': 0,
				'width': '100%',
				'top': $('.block-1').height() + $('.description-new').height()
		});
	}
});

$('.red-cross').click(function(){
	$('.description-new').hide('slide', {direction: 'left'}, 500);
	$('.green-cross-on-fade').css({
		'opacity': 1
	});
});

$('.green-cross-on-fade').click(function(){
	$('.description-new').show('slide', {direction: 'left'}, 500);
});