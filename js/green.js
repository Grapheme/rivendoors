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

$(function(){full_green();});

$(window).resize(function(){full_green();});