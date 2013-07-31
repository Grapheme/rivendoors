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
		setTimeout(function(){$(_form).ajaxSubmit(uploadImage.singlePhotoOption);},500);
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
	$("button.remove-pages").click(function(){
		if(!confirm('Удалить страницу?')){return false;}
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
	$("button.btn-image-caption").click(function(){
		var _this = this;
		var itemID = $(this).attr('data-item');
		var caption = $(this).siblings('input.image-caption').val().trim();
		var action = $(this).parents('ul.resources-items').attr('data-action');
		$.ajax({
			url: action,type: 'POST',dataType: 'json',data:{'id':itemID,'caption':caption},
			beforeSend: function(){
				$(_this).addClass('loading');
			},
			success: function(response,textStatus,xhr){
				$(_this).removeClass('loading');
				if(response.status){
					$(_this).html('OK').removeClass('btn-info').addClass('btn-success');
				}else{
					$(_this).html('NOT').removeClass('btn-info').addClass('btn-danger');
				}
			},
			error: function(xhr,textStatus,errorThrown){
				$(_this).removeClass('loading');
				$(_this).html('ERR').removeClass('btn-info').addClass('btn-danger');
			}
		});
	});
})(window.jQuery);