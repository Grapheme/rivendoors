/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
$(function(){
	var buttons = ['bold', 'italic', '|', 'unorderedlist', 'orderedlist'];
	$("textarea.redactor").redactor({
		focus: true,
		buttons: buttons,
		autoresize: false,
		minHeight: true,
	});
});