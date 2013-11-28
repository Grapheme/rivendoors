<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
	
	<link rel="stylesheet" href="<?=base_url('css/jquery.jscrollpane.css');?>">
</head>
<body>
	<?php $this->load->view('guests_interface/includes/ie7');?>
	<div class="wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<h1 class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</h1>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="wrapper-component page-description-block can-fade">
		<span>&nbsp;</span>
			<h1><?=$content['h1'];?></h1>
			<div class="production"></div>
			<div class="about-page-text"><?=$content['content'];?></div>
		</div>
		<div class="simple-page-slideshow">
			<div class="green-cross-on-fade"></div>
			<div class="slider-container">
			<?php if(empty($images) == FALSE):?>
				<div class="jcarousel">
					<ul>
					<?php for($i=0;$i<count($images);$i++):?>
						<li>
							<div class="jcarousel-img-container">
								<img src="<?=site_url('page/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="Riven doors">
							</div>
							<div class="img-caption"></div>
						</li>
					<?php endfor;?>
					</ul>
				</div>
				<a class="jcarousel-prev" href="#"></a>
				<a class="jcarousel-next" href="#"></a>
			<?php endif;?>
			</div>
		</div>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<script src="<?=base_url('js/vendor/jquery.jcarousel.min.js');?>"></script>
	<script src="<?=base_url('js/cabinet/jcarousel-config.js');?>"></script>
	<script src="<?=base_url('js/green.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-analytic');?>
</body>
</html>