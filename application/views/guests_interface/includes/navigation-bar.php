<nav id="main-navigation">	
    <div class="scroll-pane-container">
		<ul class="navigation-list scroll-pane">
			<li class="navigation-list-item item-1">
				<a href="<?=site_url('about');?>" class="<?=($this->uri->segment(1) == 'about')? 'active-green-link': '';?>">О компании</a>
			</li>
			<li class="navigation-list-item item-3">
				<a href="<?=site_url('mejkomnatnie-dveri')?>" class="visible-sub-list">Межкомнатные двери</a>
				<ul class="subnavigation-list <?php if($this->uri->segment(1) == 'mejkomnatnie-dveri') echo 'active'; ?>">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 3):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>" class="<?=($manufacturers[$i]['link'] == uri_string() )? 'active no-clickable':'';?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			</li>
			<li class="navigation-list-item item-4">
				<a href="<?=site_url('dekor')?>" class="visible-sub-list <?=($this->uri->segment(1) == 'dekor')? 'active-green-link': '';?>">Декор</a>
				<ul class="subnavigation-list <?php if($this->uri->segment(1) == 'dekor') echo 'active'; ?>">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 4):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>" class="<?=($manufacturers[$i]['link'] == uri_string() )? 'active no-clickable':'';?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			</li>
			<li class="navigation-list-item item-5">
				<a href="<?=site_url('parket')?>" class="visible-sub-list <?=($this->uri->segment(1) == 'parket')? 'active-green-link': '';?>">Паркет</a>
				<ul class="subnavigation-list <?php if($this->uri->segment(1) == 'parket') echo 'active'; ?>">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 5):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>" class="<?=($manufacturers[$i]['link'] == uri_string() )? 'active no-clickable':'';?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			</li>
			<li class="navigation-list-item item-6">
				<a href="<?=site_url('contacts');?>" class="<?=($this->uri->segment(1) == 'contacts')? 'active-green-link': '';?>">Контакты</a>
			</li>
		</ul>
	</div>
</nav>