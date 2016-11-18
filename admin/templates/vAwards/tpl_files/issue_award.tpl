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
<form id="form" action="<?php echo SITE_URL?>/admin/action.php/vAwardsAdmin/allissuedawards" method="post">
<dl>   
    <dt>Pilot:</dt>
    <dd><select name="grt_pilotid">
		<?php
		foreach($pilots as $pilot)
		{
			$pilotcode = PilotData::GetPilotCode($pilot->code, $pilot->pilotid);		
			echo "<option value=\"{$pilot->pilotid}\" {$sel} >{$pilotcode} - {$pilot->firstname} {$pilot->lastname}</option>";
		}
		?>
	</select></dd>
    
    <dt>Award:</dt>
    <dd><select name="grt_awdid">
		<?php
		foreach($awards as $award)
		{		
			echo "<option value=\"{$award->awd_id}\" {$sel} >{$award->typ_name} - {$award->awd_name}</option>";
		}
		?>
	</select></dd>
	
	<dt></dt>
	<dd>
		<input type="hidden" name="action" value="<?php echo $action;?>">
		<input type="submit" name="submit" value="<?php echo $title;?>" /></dd> 
</dl>
</form>