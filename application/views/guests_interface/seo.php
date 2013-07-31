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
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<div class="wrapper about-page-wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<h1 class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</h1>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="page-text">
			<?=$content['content'];?>
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<script src="<?=base_url('js/vendor/fotorama.js');?>"></script>
	<script src="<?=base_url('js/cabinet/fotorama-config.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-analytic');?>
</body>
</html>