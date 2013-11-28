<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>	
	<link rel="stylesheet" href="<?=base_url('css/jquery.jscrollpane.css');?>">
	<link rel="stylesheet" href="<?=base_url('css/jquery.fancybox.css');?>">
</head>
<body>
	<?php $this->load->view('guests_interface/includes/ie7');?>
	<div class="wrapper category-wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<div class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</div>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="page-description-block description-new">
			<span>&nbsp;</span>
			<div class="production"><?=$content['title'];?></div>
			<div class="about-page-text"><?=$content['content'];?></div>
			<div class="red-cross"></div>
		</div>
		<div class="container-carousel-new">
			<div class="green-cross-on-fade"></div>
			<?php if(empty($manufacturers) == FALSE):?>
				<?php
					$carousel1 = count($manufacturers);
					$carousel2 = 0;
					if(count($manufacturers) > 8):
						$carousel1 = round(count($manufacturers)/2);
						$carousel2 = count($manufacturers);
					endif;
				?>
				<div class="jcarousel categories-container">
					<ul>
					<?php for($i=0;$i<$carousel1;$i++):?>
						<li>
							<div class="jcarousel-img-container">
								<img  src="<?=base_url($manufacturers[$i]['image'])?>" alt="<?=$manufacturers[$i]['title']?>">
								<h2 class="block-name"><a href="<?=site_url($manufacturers[$i]['link']);?>"><div class="inline-name"><?=$manufacturers[$i]['title'];?></div></a></h2>
							</div>
						</li>
					<?php endfor;?>
					</ul>
				</div>
				<?php if($carousel2 > 0):?>
				<div class="jcarousel2">
					<ul>
					<?php for($i=$carousel1;$i<$carousel2;$i++):?>
						<li>
							<div class="jcarousel-img-container">
								<img  src="<?=base_url($manufacturers[$i]['image'])?>" alt="<?=$manufacturers[$i]['title']?>">
								<h2 class="block-name"><a href="<?=site_url($manufacturers[$i]['link'])?>"><div class="inline-name"><?=$manufacturers[$i]['title'];?></div></a></h2>
							</div>
						</li>
					<?php endfor;?>
					</ul>
				</div>
				<?php endif;?>
				<a class="jcarousel-prev" href="#"></a>
				<a class="jcarousel-next" href="#"></a>
			<?php endif;?>
		</div>
	</div>
	<div class="mobile-footer new-footer">
		<?php $this->load->view('guests_interface/includes/footer');?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	<script src="<?=base_url('js/vendor/jquery.fancybox.pack.js');?>"></script>
	<script src="<?=base_url('js/cabinet/fancybox-init.js');?>"></script>
	<script src="<?=base_url('js/vendor/jquery.jcarousel.min.js');?>"></script>
	<script src="<?=base_url('js/cabinet/jcarousel-config.js');?>"></script>
	<script src="<?=base_url('js/change.js');?>"></script>
	<script>
		$(function(){$('.description-new').hide();$('.red-cross').click();});
	</script>	
	<?php $this->load->view("guests_interface/includes/yandex-metrika");?>
</body>
</html>