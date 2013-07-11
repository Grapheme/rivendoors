$(function(){
	$('.jcarousel').jcarousel();
	$('.jcarousel-prev').jcarouselControl({target : '-=1'});
	$('.jcarousel-next').jcarouselControl({target : '+=1'});
	$('.jcarousel-prev').on('inactive.jcarouselcontrol', function(){$(this).css({ opacity: '0.2' });});
	$('.jcarousel-prev').on('active.jcarouselcontrol', function(){$(this).css({ opacity: '1' });});
	$('.jcarousel-next').on('inactive.jcarouselcontrol', function(){$(this).css({ opacity: '0.2' });});
	$('.jcarousel-next').on('active.jcarouselcontrol', function(){$(this).css({ opacity: '1' });});
});