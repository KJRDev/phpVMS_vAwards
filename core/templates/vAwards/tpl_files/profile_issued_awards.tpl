<?php 
if(!$allawardtpes)
{
	echo 'There is no awards available!';
	return;
}
foreach($allawardtpes as $type)
{
?>
<h3><?php echo $type->typ_name;?></h3>
<?php
	$allissuedawards = vAwardsData::GetAllIssuedAward($pilotid, $type->typ_id);
	if(!$allissuedawards)
	{
		echo 'No Awards Granted';
		$allissuedawards = array();
	}
	foreach($allissuedawards as $award)
	{
?>
<?php if(!empty($award->awd_image))
{
?>
<img src="<?php echo $award->awd_image;?>" /><br />
<?php
}
else
{
?>
No Award Image
<?php
}
?>
<br /><strong>Award Name:</strong> <?php echo $award->awd_name;?><br />
<strong>Award Issued On:</strong> <?php echo date(DATE_FORMAT, $award->grt_dategrant);?>
<?php
}
?>
<?php
}
?>