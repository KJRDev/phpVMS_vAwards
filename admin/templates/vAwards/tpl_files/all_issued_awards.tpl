<!--/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created -->
<h3>All Issued Awards</h3>
<?php
if(!$allissuedaward)
{
	echo '<p id="error">No Award Has Been Issued Yet!</p>';
	return;
}
?>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Pilot Info</th>
	<th>Award Type - Award Name</th>
    <th>Award Granted Date</th>
	<th>Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($allissuedaward as $issue)
{
$pilotcode = PilotData::GetPilotCode($issue->code, $issue->pilotid);
?>
<tr id="row<?php echo $issue->grt_id;?>">
	<td align="center"><?php echo $pilotcode.' '.$issue->firstname.' '.$issue->lastname;?></td>
    <td align="center"><?php echo $issue->typ_name.' - '.$issue->awd_name;?></td>
    <td align="center"><?php echo date(DATE_FORMAT, $issue->grt_dategrant);?></td>
   	<td align="center" width="1%" nowrap>
    <button href="<?php echo SITE_URL?>/admin/action.php/vAwardsAdmin/allissuedawards" action="deleteissuedaward" 
			id="<?php echo $issue->grt_id;?>" class="deleteitem {button:{icons:{primary:'ui-icon-trash'}}}">
			Delete</button>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>