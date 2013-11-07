<?=form_open(ADMIN_START_PAGE.'/manufacturers/update'.getUrlLink(),array('class'=>'form-manage-manufacturer')); ?>
	<div class="control-group">
		<label>Title страницы</label>
		<input type="text" name="page_title" class="span9" value="<?=$manufacturer['page_title'];?>" placeholder="Title страницы" />
		<label>Description страницы</label>
		<textarea name="page_description" class="span9" placeholder="Description страницы"><?=$manufacturer['page_description'];?></textarea>
		<label>H1</label>
		<input type="text" name="h1" class="span6" placeholder="H1 страницы" value="<?=$manufacturer['h1'];?>" />
	</div>
	<hr/>
	<div class="control-group">
		<label>Название</label>
		<input type="text" name="title" class="span3 valid-required" value="<?=$manufacturer['title'];?>" placeholder="Название" />
		<label>Производство</label>
		<input type="text" name="comment" class="span3 valid-required" value="<?=$manufacturer['comment'];?>" placeholder="Производство" />
	</div>
	<?php if(!empty($manufacturer['logo'])):?>
	<div class="controls clearfix">
		<img class="destination-photo img-polaroid" src="<?=base_url($manufacturer['logo']);?>" />
	</div>
	<?php endif;?>
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
	<?php if(!empty($manufacturer['image'])):?>
	<div class="controls clearfix">
		<img class="destination-photo img-polaroid" src="<?=base_url($manufacturer['image']);?>" />
	</div>
	<?php endif;?>
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
		<textarea rows="8" class="redactor valid-required" name="description"><?=$manufacturer['description'];?></textarea>
	</div>
	<div class="div-form-operation">
		<label>Описание</label>
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>