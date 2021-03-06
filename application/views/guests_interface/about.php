<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	
	<!--<link rel="stylesheet" href="<?=base_url('css/fotorama-config.css');?>">-->
</head>
<body>
	<?php $this->load->view('guests_interface/includes/ie7');?>
	<div class="wrapper about-page-wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<div class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</div>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="wrapper-component page-description-block about-page-description-block">
			<h1 class="hidden">О компании Rivendoors</h1>
			<div class="page-desc-header">О компании</div>
			<div class="about-page-text">
				<?=$content['content'];?>
			</div>
		</div>
		<div class="about-company-slideshow">
		<?php if(empty($images) == FALSE):?>
			<div class="__fotorama">
			<?php for($i=0;$i<count($images);$i++):?>
				<img src="<?=site_url('page/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="Riven doors">
			<?php endfor;?>
			</div>
		<?php endif;?>
		</div>
	</div>
	<div class="mobile-footer">
		<?php $this->load->view('guests_interface/includes/footer');?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<script src="<?=base_url('js/vendor/fotorama.js');?>"></script>
	<script src="<?=base_url('js/cabinet/fotorama-config.js');?>"></script>
	<?php $this->load->view("guests_interface/includes/yandex-metrika");?>
</body>
</html>