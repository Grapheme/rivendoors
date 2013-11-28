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
	<div class="wrapper">
		<div class="wrapper-component block-1 about-page-block-1">
			<div class="page-header"><a href="<?=site_url('');?>"></a>Riven Doors</div>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
		<div class="page-description-block description-new">
			<!--<h1><?=$single['h1'];?></h1>-->
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
		<div class="container-carousel-new">
			<div class="tags-container" style="display:none;">
				<ul class="tags-list clearfix">
					<li class="tags-item"><a href="#" class="active-tag">Все</a></li>
					<li class="tags-item"><a href="#">Классика</a></li>
					<li class="tags-item"><a href="#">Модерн</a></li>
					<li class="tags-item"><a href="#">Раздвижные двери</a></li>
				</ul>
			</div>
			<div class="afterfade-block">
				<div class="header-after-fade"><?=$single['title'];?></div>
				<div class="production-after-fade"><?=$single['comment'];?></div>
			</div>
			<div class="green-cross-on-fade"></div>
			<div class="slider-container">
			<?php if(empty($images) == FALSE):?>
				<?php
					$carousel1 = count($images);
					$carousel2 = 0;
					if(count($images) > 8):
						$carousel1 = round(count($images)/2);
						$carousel2 = count($images);
					endif;
				?>
				<div class="jcarousel">
					<ul>
					<?php for($i=0;$i<$carousel1;$i++):?>
						<li>
							<div class="jcarousel-img-container">
								<img height="450" src="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="<?=$images[$i]['caption']?>">
								<a class="carousel-overlay <?=($carousel2)? 'fancybox': 'hidden';?>" rel="gallery" href="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" data-fancybox-title="<span class='fancy_header'><?=htmlspecialchars($images[$i]['caption']);?></span><span class='fancy_body'><?=htmlspecialchars($images[$i]['description'])?></span>"></a>
								<span class="img-caption"><?=$images[$i]['caption']?></span>
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
								<img height="450" src="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" alt="<?=$images[$i]['caption']?>">
								<a class="carousel-overlay fancybox" rel="gallery" href="<?=site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$images[$i]['id'])?>" data-fancybox-title="<span class='fancy_header'><?=htmlspecialchars($images[$i]['caption']);?></span><span class='fancy_body'><?=htmlspecialchars($images[$i]['description'])?></span>"></a>
								<span class="img-caption"><?=$images[$i]['caption']?></span>
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
	<?php $this->load->view("guests_interface/includes/yandex-metrika");?>
</body>
</html>