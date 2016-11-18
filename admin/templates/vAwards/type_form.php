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
<form id="form" action="<?php echo SITE_URL?>/admin/action.php/vAwardsAdmin/allawardtypes" method="post">
<dl>
	<dt>Name</dt>
	<dd><input name="typ_name" type="text" value="<?php echo $type->typ_name;?>" /></dd>
	
	<dt></dt>
	<dd><input type="hidden" name="typ_id" value="<?php echo $type->typ_id;?>" />
		<input type="hidden" name="action" value="<?php echo $action;?>">
		<input type="submit" name="submit" value="<?php echo $title;?>" /></dd> 
</dl>
</form>