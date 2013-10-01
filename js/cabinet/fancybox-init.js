$(document).ready(function() {
	$('.fancybox').fancybox({
			prevEffect      : 'fade',
			nextEffect      : 'fade',
			openEffect:              'fade' ,
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
});