<?=form_open(ADMIN_START_PAGE.'/page/'.$this->uri->segment(3).'/update?id='.$content['id'],array('class'=>'form-manage-pages')); ?>
	<input type="hidden" value="<?=$content['id']?>" name="id"/>
	<div class="control-group clearfix">
		<textarea rows="10" class="valid-required redactor" name="content"><?=$content['content'];?></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>