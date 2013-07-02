<?=form_open(ADMIN_START_PAGE.'/manufacturers/update'.getUrlLink(),array('class'=>'form-manage-manufacturer')); ?>
	<div class="control-group">
		<input type="text" name="title" class="span3 valid-required" value="<?=$manufacturer['title'];?>" placeholder="Название" />
		<input type="text" name="comment" class="span3 valid-required" value="<?=$manufacturer['comment'];?>" placeholder="Производство" />
	</div>
	<div class="control-group clearfix">
		<textarea rows="8" class="redactor valid-required" placeholder="Описание" name="description"><?=$manufacturer['description'];?></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>