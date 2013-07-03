<nav id="main-navigation">
	<ul class="navigation-list">
		<li class="navigation-list-item item-1">
			<a href="<?=site_url('');?>">Главная</a>
		</li>
		<li class="navigation-list-item item-2">
			<a href="<?=site_url('about');?>">О компании</a>
		</li>
		<li class="navigation-list-item item-3">
			<a href="<?=site_url('entrance-doors');?>">Входные двери</a>
			<?php if($this->uri->segment(1) == 'entrance-doors'):?>
				<ul class="subnavigation-list">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 2):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			<?php endif;?>
		</li>
		<li class="navigation-list-item item-4">
			<a href="<?=site_url('interior-doors');?>">Межкомнатные двери</a>
			<?php if($this->uri->segment(1) == 'interior-doors'):?>
				<ul class="subnavigation-list">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 3):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			<?php endif;?>
		</li>
		<li class="navigation-list-item item-5">
			<a href="<?=site_url('dekor');?>">Декор</a>
			<?php if($this->uri->segment(1) == 'dekor'):?>
				<ul class="subnavigation-list">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 4):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			<?php endif;?>
		</li>
		<li class="navigation-list-item item-6">
			<a href="<?=site_url('parket');?>">Паркет</a>
			<?php if($this->uri->segment(1) == 'parket'):?>
				<ul class="subnavigation-list">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 5):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($this->uri->segment(1).'/manufacturer/'.$this->translite($pagevar['manufacturers'][$i]['title']).'?id='.$pagevar['manufacturers'][$i]['id']);?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			<?php endif;?>
		</li>
		<li class="navigation-list-item item-7">
			<a href="<?=site_url('contacts');?>">Контакты</a>
		</li>
	</ul>
</nav>