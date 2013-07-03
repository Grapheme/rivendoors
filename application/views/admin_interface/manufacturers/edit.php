<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("admin_interface/includes/head");?>

<?php if($this->input->get('mode') === 'text'):?>
<link rel="stylesheet" href="<?=site_url('css/redactor.css');?>" />
<?php elseif($this->input->get('mode') === 'image'):?>
<link rel="stylesheet" href="<?=base_url('css/uploadzone.css');?>" />
<?php endif;?>
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
					<li><a href="<?=site_url(ADMIN_START_PAGE.'/manufacturers?category='.$this->input->get('category'));?>">Производители</a> <span class="divider">/</span></li>
					<li class="active">Редактирование производителя</li>
				</ul>
				<div class="clear"></div>
				<div class="clearfix">
					<ul class="nav nav-tabs">
						<li <?=($this->input->get('mode') == 'text')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/manufacturers/edit?mode=text&category='.$this->input->get('category').'&id='.$this->input->get('id'));?>">Текстовая информация</a></li>
						<li <?=($this->input->get('mode') == 'image')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/manufacturers/edit?mode=image&category='.$this->input->get('category').'&id='.$this->input->get('id'));?>">Изображения</a></li>
						<li <?=($this->input->get('mode') == 'caption')?'class="active"':''?>><a href="<?=site_url(ADMIN_START_PAGE.'/manufacturers/edit?mode=caption&category='.$this->input->get('category').'&id='.$this->input->get('id'));?>">Подписи</a></li>
					</ul>
				</div>
			<?php if($this->input->get('mode') === 'text'):?>
				<?php $this->load->view('admin_interface/forms/edit-manufacturer');?>
			<?php elseif($this->input->get('mode') === 'image'):?>
				<?php $this->load->view('admin_interface/forms/images-manufacturer');?>
			<?php elseif($this->input->get('mode') === 'caption'):?>
				<?php $this->load->view('admin_interface/forms/images-captions');?>
			<?php endif;?>
				<a class="btn btn-success" href="<?=site_url(ADMIN_START_PAGE.'/manufacturers?category='.$this->input->get('category'));?>">Завершить</a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>

<?php if($this->input->get('mode') === 'text'):?>
<script type="text/javascript" src="<?=site_url('js/vendor/redactor.min.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/redactor-config.js');?>"></script>
<?php elseif($this->input->get('mode') === 'image'):?>
<script type="text/javascript" src="<?=site_url('js/libs/dropzone.js');?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?=site_url('js/cabinet/upload.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
</body>
</html>