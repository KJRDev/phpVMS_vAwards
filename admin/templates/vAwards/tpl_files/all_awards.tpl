<!--/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created -->
<h3>All Awards</h3>
<?php
if(!$allawards)
{
	echo '<p id="error">No Award Has Been Added</p>';
	return;
}
?>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Award Name</th>
	<th>Award Type</th>
    <th>Award Desc.</th>
    <th>Award Image</th>
	<th>Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($allawards as $award)
{
?>
<tr>
	<td align="center"><?php echo $award->awd_name;?></td>
    <td align="center"><?php echo $award->typ_name;?></td>
    <td align="center"><?php echo $award->awd_desc;?></td>
    <td align="center"><img src="<?php echo $award->awd_image;?>" /></td>
	<td align="center" width="1%" nowrap>
	<button id="dialog" class="jqModal {button:{icons:{primary:'ui-icon-wrench'}}}" 
		href="<?php echo adminaction('/vAwardsAdmin/editaward?awd_id='.$award->awd_id);?>">
		Edit</button>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>