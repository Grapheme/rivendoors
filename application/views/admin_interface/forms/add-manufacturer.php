<?=form_open(ADMIN_START_PAGE.'/manufacturers/insert'.getUrlLink(),array('class'=>'form-manage-manufacturer')); ?>
	<div class="control-group">
		<label>Title страницы</label>
		<input type="text" name="page_title" class="span9" value="" placeholder="Title страницы" />
		<label>Description страницы</label>
		<textarea name="page_description" class="span9" placeholder="Description страницы"></textarea>
		<label>H1</label>
		<input type="text" name="h1" class="span6" placeholder="H1 страницы" value="" />
	</div>
	<hr/>
	<div class="control-group">
		<label>Название</label>
		<input type="text" name="title" class="span3 valid-required" value="" placeholder="Название" />
		<label>Производство</label>
		<input type="text" name="comment" class="span3 valid-required" value="" placeholder="Производство" />
	</div>
	<div class="controls">
		<label>Логотип</label>
		<input type="file" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="controls">
		<label>Основное изображение</label>
		<input type="file" autocomplete="off" name="file_main" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="control-group clearfix">
		<label>Описание</label>
		<textarea rows="8" class="redactor valid-required" name="description"></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Добавить</button>
	</div>
<?=form_close();?>