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
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<div class="wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<h1 class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</h1>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="wrapper-component page-description-block can-fade">
			<h2 class="detailed-description-header">
		<?php if(!empty($single['logo'])):?>
			<img src="<?=site_url($single['logo']);?>">
		<?php else:?>
			<?=$single['title'];?>
		<?php endif;?>
			</h2>
			<div class="production"><?=$single['comment'];?></div>
			<div class="about-page-text"><?=$single['description'];?></div>
			<div class="red-cross"></div>
		</div>
		<div class="simple-page-slideshow">
			<div class="afterfade-block">
				<div class="header-after-fade"><?=$single['title'];?></div>
				<div class="production-after-fade"><?=$single['comment'];?></div>
			</div>
			<div class="green-cross-on-fade"></div>
			<div class="slider-container">
			<?php if(empty($images) == FALSE):?>
				<div class="jcarousel">
					<ul>
					<?php for($i=0;$i<count($images);$i++):?>
						<li>
							<div class="jcarousel-img-container">
								<img height="450" src="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="<?=$images[$i]['caption']?>">
							</div>
							<div class="img-caption"><?=$images[$i]['caption']?></div>
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
	<?php $this->load->view('guests_interface/includes/google-analytic');?>
</body>
</html>