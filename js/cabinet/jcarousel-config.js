$(window).load(function () {
    $(".jcarousel").after('<div class="jcarousel2" class="clearfix" />').next().html($(".jcarousel").html());
	$(".jcarousel li:odd").remove();
	$(".jcarousel2 li:even").remove();
    $('.jcarousel2').height($('.block-1').height() * 0.35);	

  	$('.jcarousel').jcarousel();
	$('.jcarousel2').jcarousel();
	$('.jcarousel-prev').jcarouselControl({target : '-=1'});
	$('.jcarousel-next').jcarouselControl({target : '+=1'});
	$('.jcarousel-prev').on('inactive.jcarouselcontrol', function(){$(this).css({ opacity: '0.2' });});
	$('.jcarousel-prev').on('active.jcarouselcontrol', function(){$(this).css({ opacity: '1' });});
	$('.jcarousel-next').on('inactive.jcarouselcontrol', function(){$(this).css({ opacity: '0.2' });});
	$('.jcarousel-next').on('active.jcarouselcontrol', function(){$(this).css({ opacity: '1' });});		
});
