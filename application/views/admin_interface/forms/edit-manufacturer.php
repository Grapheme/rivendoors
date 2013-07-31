<?=form_open(ADMIN_START_PAGE.'/manufacturers/update'.getUrlLink(),array('class'=>'form-manage-manufacturer')); ?>
	<div class="control-group">
		<input type="text" name="page_title" class="span9" value="<?=$manufacturer['page_title'];?>" placeholder="Title страницы" />
		<textarea name="page_description" class="span9" placeholder="Description страницы"><?=$manufacturer['page_description'];?></textarea>
	</div>
	<hr/>
	<div class="control-group">
		<input type="text" name="title" class="span3 valid-required" value="<?=$manufacturer['title'];?>" placeholder="Название" />
		<input type="text" name="comment" class="span3 valid-required" value="<?=$manufacturer['comment'];?>" placeholder="Производство" />
	</div>
	<?php if(!empty($manufacturer['logo'])):?>
	<div class="controls clearfix">
		<img class="destination-photo img-polaroid" src="<?=site_url($manufacturer['logo']);?>" />
	</div>
	<?php endif;?>
	<div class="controls">
		<input type="file" autocomplete="off" name="file" size="52">
		<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
		<div id="div-upload-photo" class="bar-file-upload hidden">
			<div class="progress progress-info progress-striped active">
				<div class="bar" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="control-group clearfix">
		<textarea rows="8" class="redactor valid-required" placeholder="Описание" name="description"><?=$manufacturer['description'];?></textarea>
	</div>
	<div class="div-form-operation">
		<button type="submit" value="" name="submit" class="btn btn-submit no-clickable btn-loading">Сохранить</button>
	</div>
<?= form_close(); ?>