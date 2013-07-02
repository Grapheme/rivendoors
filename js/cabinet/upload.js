/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
var uploadImage = uploadImage || {};
uploadImage.singlePhotoOption = {
	target: null, type: 'post', dataType:'json',
	beforeSubmit: function(formData,jqForm,options){
		if(mt.ajaxBeforeSubmit(formData,jqForm,options)){
			if($(jqForm).find('input[type="file"]').emptyValue() == false){
				var percentVal = '0%';
				$("div.bar").width(percentVal).html(percentVal);
				$("#div-upload-photo").removeClass('hidden');
			}
		}else{return false;}
	},
	uploadProgress: function(event,position,total,percentComplete){
		var percentVal = percentComplete + '%';
		$("div.bar").width(percentVal).html(percentVal);
	},
	success: function(response,statusText,xhr,jqForm){
		var percentVal = '100%';
		$("div.bar").width(percentVal).html(percentVal);
		if(response.status){
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-success');
			$("div.div-form-operation").after('<div class="msg-alert">'+response.responseText+'</div>');
			if(response.responsePhotoSrc != false){
				$("img.destination-photo").attr('src',response.responsePhotoSrc);
			}
			setTimeout(function(){mt.redirect(response.redirect);},3000);
		}else{
			$("div.bar").parents('div.progress').removeClass('progress-info active').addClass('progress-danger');
			$("div.div-form-operation").after('<div class="msg-alert error">'+response.responseText+'</div>');
		}
	}
}