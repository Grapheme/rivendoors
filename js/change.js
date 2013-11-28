// Функция для определения отступа карусели и ее ширины
function carouselPosition() {

		$('.container-carousel-new').css({
				
				'left': $('.block-1').width(),
				'width': $(window).width() - $('.block-1').width(),
				'top': 0
		});
}

//Функция для определения отступа для блока описания
function aboutPosition() {

		$('.description-new').css({
		
				'left': $('.block-1').width(),
				'top': 0,
				'min-height': $('.block-1').height()
		
		});
}

//Функция для страницы без изображений
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

$(document).ready(function(){
	if(window.innerWidth > 768) {
		carouselPosition();
		aboutPosition();
		full_green();
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
		full_green();
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
	$('.description-new').fadeOut('fast');
	$('.green-cross-on-fade').css({
		'opacity': 1
	});
});

$('.green-cross-on-fade').click(function(){
	$('.description-new').fadeIn('fast');
});