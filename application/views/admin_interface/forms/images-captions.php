<ul class="resources-items clearfix" data-action="<?=site_url(ADMIN_START_PAGE.'/manufacturers/caption/resource');?>">
<?php for($i=0;$i<count($images);$i++):?>
	<li class="span2">
		<img class="img-rounded" src="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="">
		<input type="text" name="caption" class="image-caption" value="<?=$images[$i]['caption'];?>" />
		<textarea name="description" class="image-description"><?=$images[$i]['description'];?></textarea>
		<button data-item="<?=$images[$i]['id'];?>" class="btn btn-info btn-image-caption"><i class="icon-ok"></i></button>
	</li>
<?php endfor;?>
</ul>