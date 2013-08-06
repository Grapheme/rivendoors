<?=form_open(ADMIN_START_PAGE.'/page/insert',array('class'=>'form-manage-pages')); ?>
	<div class="control-group">
		<label>Title страницы</label>
		<input type="text" name="page_title" class="span9" value="" placeholder="Title страницы" />
		<label>Description страницы</label>
		<textarea rows="4" name="page_description" class="span9" placeholder="Description страницы"></textarea>
		<label>URL страницы</label>
		<input type="text" name="url" class="span6 valid-required" placeholder="URL страницы" value="" />
		<label>H1</label>
		<input type="text" name="h1" class="span6" placeholder="H1 страницы" value="" />
	</div>
	<hr/>
	<div class="control-group clearfix">
		<label>Содержимое страницы</label>
		<textarea rows="10" class="redactor" name="content"></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>