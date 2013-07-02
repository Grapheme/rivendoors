<select autocomplete="off" class="select-categories" name="category">
<?php foreach($this->categories as $key => $value):?>
	<option value="<?=$key;?>" <?=($this->input->get('category') == $key)?'selected="selected"':'';?>><?=$value;?></option>
<?php endforeach;?>
</select>