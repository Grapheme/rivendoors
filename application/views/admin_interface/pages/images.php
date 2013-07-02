<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("admin_interface/includes/head");?>

<link rel="stylesheet" href="<?=base_url('css/uploadzone.css');?>" />
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<?php $this->load->view("admin_interface/includes/navbar");?>
	<div class="container">
		<div class="row">
			<div class="span3">
				<?php $this->load->view("admin_interface/includes/sidebar");?>
			</div>
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="<?=site_url(ADMIN_START_PAGE);?>">Панель управления</a> <span class="divider">/</span></li>
					<li>Страницы<span class="divider">/</span></li>
					<li class="active"><?=$pageTitle;?> (Рисунки)</li>
				</ul>
				<div class="clearfix">
					<ul class="nav nav-tabs">
						<li><a href="<?=site_url(ADMIN_START_PAGE.'/page/about?mode=text');?>" >Редактирование страницы</a></li>
						<li class="active"><a href="" class="no-clickable">Изображения страницы</a></li>
					</ul>
				</div>
				<ul class="resources-items clearfix" data-action="<?=site_url(ADMIN_START_PAGE.'/page/remove/resource');?>">
				<?php for($i=0;$i<count($images);$i++):?>
					<li class="span2">
						<img class="img-rounded" src="<?=site_url('page/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="">
						<a href="" data-resource-id="<?=$images[$i]['id']?>" class="no-clickable delete-resource-item">&times;</a>
					</li>
				<?php endfor;?>
				</ul>
				<?=$this->load->view('html/zone-upload-file',array('action'=>site_url(ADMIN_START_PAGE.'/page/'.$this->uri->segment(3).'/upload/resource?id='.$content['id'])));?>
			</div>
		</div>
	</div>
	
	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>

<script type="text/javascript" src="<?=site_url('js/libs/bootstrap.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/libs/dropzone.js');?>"></script>
</body>
</html>