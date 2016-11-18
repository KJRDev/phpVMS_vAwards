<!--/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created -->
<h3><?php echo $title?></h3>
<form id="form" action="<?php echo SITE_URL?>/admin/action.php/vAwardsAdmin/allawards" method="post">
<dl>
	<dt>Name</dt>
	<dd><input name="awd_name" type="text" value="<?php echo $award->awd_name;?>" /></dd>
	
	<dt>Description</dt>
	<dd><input name="awd_desc" type="text" value="<?php echo $award->awd_desc;?>" /></dd>
    
    <dt>Type</dt>
    <dd><select name="typ_id">
		<?php
		foreach($types as $type)
		{
			if($award->typ_id == $type->typ_id)
				$sel = 'selected="selected"';
			else
				$sel = '';
				
			echo "<option value=\"{$type->typ_id}\" {$sel} >{$type->typ_name}</option>";
		}
		?>
	</select></dd>
		
	<dt>Image URL</dt>
	<dd><input name="awd_image" type="text" value="<?php echo $award->awd_image;?>" />
		<p>Enter the full URL, or path from root to the image</p>
	</dd>
	
	<dt></dt>
	<dd><input type="hidden" name="awd_id" value="<?php echo $award->awd_id;?>" />
		<input type="hidden" name="action" value="<?php echo $action;?>">
		<input type="submit" name="submit" value="<?php echo $title;?>" /></dd> 
</dl>
</form>