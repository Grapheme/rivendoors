<?php
  if ($this->uri->segment(1) == 'mejkomnatnie-dveri') {
	  $sortMans[0] = $manufacturers[4];	  
	  $sortMans[1] = $manufacturers[0];	  
	  $sortMans[2] = $manufacturers[5];	  
	  $sortMans[3] = $manufacturers[1];	  
	  $sortMans[4] = $manufacturers[6];	  
	  $sortMans[5] = $manufacturers[2];	  
	  $sortMans[6] = $manufacturers[7];	  
	  $sortMans[7] = $manufacturers[3];
	  
	  $manufacturers = $sortMans;
  }
;?>
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
			<?php if(!empty($manufacturers)):?>
				<ul class="subnavigation-list <?php if($this->uri->segment(1) == 'parket') echo 'active'; ?>">
				<?php for($i=0;$i<count($manufacturers);$i++):?>
					<?php if($manufacturers[$i]['category'] == 5):?>
					<li class="subnavigation-list-item">
						<a href="<?=site_url($manufacturers[$i]['link']);?>" class="<?=($manufacturers[$i]['link'] == uri_string() )? 'active no-clickable':'';?>"><?=$manufacturers[$i]['title'];?></a>
					</li>
					<?php endif;?>
				<?php endfor;?>
				</ul>
			<?php endif;?>
			</li>
			<li class="navigation-list-item item-6">
				<a href="<?=site_url('laminat/parketoff');?>" class="<?=(uri_string() == 'laminat/parketoff')? 'active-green-link':'';?>">Ламинат</a>
			</li>
			<li class="navigation-list-item item-7">
				<a href="<?=site_url('contacts');?>" class="<?=($this->uri->segment(1) == 'contacts')? 'active-green-link': '';?>">Контакты</a>
			</li>
		</ul>
	</div>
</nav>