<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("admin_interface/includes/head");?>

<?php if($this->input->get('id') === FALSE && $this->input->get('step') === FALSE):?>
<link rel="stylesheet" href="<?=site_url('css/redactor.css');?>" />
<?php elseif($this->input->get('id') !== FALSE && $this->input->get('step') == 2):?>
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
					<li class="active">Добавление производителя</li>
				</ul>
				<div class="clear"></div>
			<?php if($this->input->get('id') === FALSE && $this->input->get('step') === FALSE):?>
				<div class="inline">
					<?php $this->load->view('html/select-categories');?>
				</div>
				<p class="text-info">Шаг №1: Текстовая информация</p><hr/>
				<?php $this->load->view('admin_interface/forms/add-manufacturer');?>
			<?php elseif($this->input->get('id') !== FALSE && $this->input->get('step') == 2):?>
				<p class="text-info">Шаг №2: Загрузка изображений</p><hr/>
				<?php $this->load->view('admin_interface/forms/images-manufacturer');?>
				<a class="btn btn-info" href="<?=site_url(ADMIN_START_PAGE.'/manufacturers/add?category='.$this->input->get('category').'&id='.$this->input->get('id').'&step=3');?>">Подписи</a>
				<a class="btn btn-success" href="<?=site_url(ADMIN_START_PAGE.'/manufacturers?category='.$this->input->get('category'));?>">Завершить</a>
			<?php elseif($this->input->get('id') !== FALSE && $this->input->get('step') == 3):?>
				<p class="text-info">Шаг №3: Подписи к изображениям</p><hr/>
				<?php $this->load->view('admin_interface/forms/images-captions');?>
				<a class="btn btn-success" href="<?=site_url(ADMIN_START_PAGE.'/manufacturers?category='.$this->input->get('category'));?>">Завершить</a>
			<?php endif;?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view("admin_interface/includes/footer");?>
	<?php $this->load->view("admin_interface/includes/scripts");?>

<?php if($this->input->get('id') === FALSE && $this->input->get('step') === FALSE):?>
<script type="text/javascript" src="<?=site_url('js/vendor/redactor.min.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/redactor-config.js');?>"></script>
<?php elseif($this->input->get('id') !== FALSE && $this->input->get('step') == 2):?>
<script type="text/javascript" src="<?=site_url('js/libs/dropzone.js');?>"></script>
<?php endif;?>
<script type="text/javascript" src="<?=site_url('js/cabinet/upload.js');?>"></script>
<script type="text/javascript" src="<?=site_url('js/cabinet/admin.js');?>"></script>
</body>
</html>