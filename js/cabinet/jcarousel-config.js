$(function(){	
	/* Set items width before carousel initialization*/
	
	function setLiWidth() {
		$('#foo li').each( function(){
			$(this).width( $(this).height() / 1.61 ).css({ overflow: 'hidden' });
		});
	}
	
	function carouselInit() {
		setLiWidth();
		$("#foo").after('<ul id="fooX" class="clearfix" />').next().html($("#foo").html());
		$("#foo li:odd").remove();
		$("#fooX li:even").remove();
		$("#foo").carouFredSel({
			width: '100%',
			align: 'left',
			auto: false,
			circular: false,
			infinite: false,
	    	prev : {
				button : $('.jcarousel-prev'),
				key: 'left'
			},
			next : {
				button : $('.jcarousel-next'),
				key: 'right'
				
			},
			items : { 
				visible : {
					min: 1,
					max: 10
				} 
			},
			synchronise : "#fooX"
		});
		
		$("#fooX").carouFredSel({
			width: '100%',
			align: 'left',
			auto: false,
			circular: false,
			infinite: false
		});
		
		$('.fancybox').fancybox({
			maxHeight: 500,
			padding: 0,
			'autoScale' : false, 
			'type' : 'image',
			helpers		: {
				title	: { type : 'inside', position: 'top' }
			},
			items : {
		        height : "100%",
		        visible : {
		            min : 1,
		            max : 10
		        }
	    	}
		});
	}
	/*setLiWidth();*/
	carouselInit();
});