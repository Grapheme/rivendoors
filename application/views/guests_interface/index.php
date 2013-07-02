<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<?php $this->load->view('guests_interface/includes/head');?>
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<div class="wrapper">
		<div class="wrapper-component block-1">
			<h1 class="page-header">Riven Doors</h1>
			<?php $this->load->view('guests_interface/includes/navigation-bar');?>
			<?php $this->load->view('guests_interface/includes/footer');?>
		</div>
	<?php for($i=0;$i<count($this->categories);$i++):?>
		<div class="wrapper-component block-<?=$i+2;?>">
			<div class="block-name">
				<?=$this->categories[$i];?>
				<div class="green-cross"></div>
			</div>
			<div class="block-description <?=(($i+2)<5)?'right':'left';?>">
				<ul class="block-description-list">
				<?php for($j=0;$j<count($manufacturers);$j++):?>
					<li class="block-description-list-item"><a href="<?=site_url('#');?>"><?=$manufacturers[$j]['title'];?></a></li>
				<?php endfor;?>
				</ul>
			</div>
		</div>
	<?php endfor;?>
	</div>
	<?php $this->load->view('guests_interface/includes/scripts');?>
	
	<script src="<?=base_url('js/vendor/jquery.color.js');?>"></script>
	<?php $this->load->view('guests_interface/includes/google-analytic');?>
</body>
</html>