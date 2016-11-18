<!--/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created -->
<h3>All Award Types</h3>
<?php
if(!$alltypes)
{
	echo '<p id="error">No Award Types Has Been Added</p>';
	return;
}
?>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Award Type Name</th>
	<th>Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($alltypes as $type)
{
?>
<tr>
	<td align="center"><?php echo $type->typ_name; ?></td>
	<td align="center" width="1%" nowrap>
	<button id="dialog" class="jqModal {button:{icons:{primary:'ui-icon-wrench'}}}" 
		href="<?php echo adminaction('/vAwardsAdmin/editawardtype?typ_id='.$type->typ_id);?>">
		Edit</button>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>