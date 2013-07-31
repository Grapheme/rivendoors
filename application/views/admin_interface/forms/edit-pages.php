<?=form_open(ADMIN_START_PAGE.'/page/update?id='.$content['id'],array('class'=>'form-manage-pages')); ?>
	<div class="control-group">
		<input type="text" name="page_title" class="span9" value="<?=$content['page_title'];?>" placeholder="Title страницы" />
		<textarea rows="4" name="page_description" class="span9" placeholder="Description страницы"><?=$content['page_description'];?></textarea>
		<input type="text" name="url" class="span6 valid-required" placeholder="URL страницы" value="<?=$content['url'];?>" />
	</div>
	<hr/>
	<div class="control-group clearfix">
		<textarea rows="10" class="redactor" name="content"><?=$content['content'];?></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>