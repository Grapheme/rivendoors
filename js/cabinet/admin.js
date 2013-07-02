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
	$("form.form-manage-manufacturer .btn-submit").click(function(){
		var _form = $("form.form-manage-manufacturer");
		$(this).addClass('loading');
		var redactorData = $("textarea.redactor").redactor('get');
		$(_form).find("textarea.redactor").html(redactorData);
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
				setTimeout(function(){mt.redirect(response.redirect);},2000);
			}else{
				$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
			}
		}
		setTimeout(function(){$(_form).ajaxSubmit(options);},500);
		return false;
	});
	$("select.select-categories").change(function(){
		var url = mt.currentURL.replace(/category=(\d+)/,'category='+$(this).val());
		mt.redirect(url);
	});
	$("button.remove-manufacturer").click(function(){
		var _this = this;
		var itemID = $(this).attr('data-item');
		var action = $(this).parents('table').attr('data-action');
		$.ajax({
			url: action,type: 'POST',dataType: 'json',data:{'id':itemID},
			beforeSend: function(){
				$("div.result-request").html('');
			},
			success: function(response,textStatus,xhr){
				if(response.status){
					$(_this).parents('tr').remove();
				}else{
					$("div.result-request").html(response.responseText);
				}
			},
			error: function(xhr,textStatus,errorThrown){}
		});
	});
})(window.jQuery);