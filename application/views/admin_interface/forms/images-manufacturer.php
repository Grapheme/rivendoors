<ul class="resources-items clearfix" data-action="<?=site_url(ADMIN_START_PAGE.'/page/remove/resource');?>">
<?php for($i=0;$i<count($images);$i++):?>
	<li class="span2">
		<img class="img-rounded" src="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="">
		<a href="" data-resource-id="<?=$images[$i]['id']?>" class="no-clickable delete-resource-item">&times;</a>
	</li>
<?php endfor;?>
</ul>
<?=$this->load->view('html/zone-upload-file',array('action'=>site_url(ADMIN_START_PAGE.'/manufacturers/upload/resource?id='.$this->input->get('id'))));?>