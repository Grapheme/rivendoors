/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
$(function(){
	var buttons = ['bold', 'italic', '|', 'unorderedlist', 'orderedlist'];
	$("textarea.redactor").redactor({
		//buttons: buttons,
		autoresize: false,
		minHeight: true,
	});
});