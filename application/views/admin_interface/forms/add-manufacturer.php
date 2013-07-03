<?=form_open(ADMIN_START_PAGE.'/manufacturers/insert'.getUrlLink(),array('class'=>'form-manage-manufacturer')); ?>
	<div class="control-group">
		<input type="text" name="title" class="span3 valid-required" value="" placeholder="Название" />
		<input type="text" name="comment" class="span3 valid-required" value="" placeholder="Производство" />
	</div>
	<div class="controls">
		<input type="file" class="valid-required" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="control-group clearfix">
		<textarea rows="8" class="redactor valid-required" placeholder="Описание" name="description"></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Добавить</button>
	</div>
<?= form_close(); ?>