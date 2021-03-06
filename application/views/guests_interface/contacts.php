<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	<link rel="stylesheet" href="<?=base_url('css/fotorama.css');?>">
	<link rel="stylesheet" href="<?=base_url('css/jquery.jscrollpane.css');?>">

	<!--<link rel="stylesheet" href="<?=base_url('css/fotorama-config.css');?>">-->
</head>
<body>
	<?php $this->load->view('guests_interface/includes/ie7');?>
	<div class="wrapper">
		<div class="wrapper-component block-1">
			<div class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</div>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="wrapper-component page-description-block contacts-description-block">
			<div class="contacts-page-text">
				<h1 class="hidden">���������� ������ ��������</h1>
				<?=$content['content'];?>
				<p><?=safe_mailto('rivendoors@yandex.ru','rivendoors@yandex.ru','class="contact-mail"');?></p>
			</div>
		</div>
		<div class="contacts-map">
			<div id="map-canvas"></div>
		</div>
	</div>
	<div class="mobile-footer">
		<?php $this->load->view('guests_interface/includes/footer');?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<?php $this->load->view("guests_interface/includes/yandex-metrika");?>
	<?php $this->load->view('guests_interface/includes/google-maps');?>
</body>
</html>