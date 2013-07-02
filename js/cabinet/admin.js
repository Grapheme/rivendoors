/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

(function($){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
	/*-------------------------------------------------------------------- */
	$("form.form-signup-admin .btn-submit").click(function(event){
		event.stopPropagation();
		var _form = $("form.form-signup-admin");
		$(this).addClass('loading');
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				$(_form).resetForm();
				$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			}else{
				$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
			}
		}
		$(_form).ajaxSubmit(options);
		return false;
	})
	$("form.form-manage-pages .btn-submit").click(function(){
		var _form = $("form.form-manage-pages");
		$(this).addClass('loading');
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			}else{
				$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
			}
		}
		$(_form).ajaxSubmit(options);
		return false;
		
	})
})(window.jQuery);