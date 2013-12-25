<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
</head>
<body>
	<?php $this->load->view('guests_interface/includes/ie7');?>
	<div class="wrapper index-wrapper">
		<div class="wrapper-component block-1">
			<h1 class="page-header">Riven Doors</h1>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
	<?php foreach($this->categories as $key => $value):?>
		<div class="wrapper-component block-<?=$key;?>">
			<h2 class="block-name">
				<?php if($key == 2): ?>
					<a href="<?=base_url('about');?>">О компании</a>
				<?php else: ?>
					<?=$value;?>
				<?php endif;?>
			</h2>
			<div class="block-description <?=($key == 2)?'hidden':'';?> <?=($key<5)?'right':'left';?>">
				<ul class="block-description-list">
				<?php for($j=0;$j<count($manufacturers);$j++):?>
					<?php if($manufacturers[$j]['category'] == $key):?>
					<li class="block-description-list-item"><h3><a href="<?=site_url($manufacturers[$j]['link']);?>"><?=$manufacturers[$j]['title'];?></a></h3></li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			</div>
		</div>
	<?php endforeach;?>
	</div>
	<div class="mobile-footer">
		<?php $this->load->view('guests_interface/includes/footer');?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<script src="<?=base_url('js/vendor/jquery.color.js');?>"></script>
	<?php $this->load->view("guests_interface/includes/yandex-metrika");?>
</body>
</html>