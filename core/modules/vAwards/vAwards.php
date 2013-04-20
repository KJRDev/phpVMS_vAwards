<?php
/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created
class vAwards extends CodonModule
{	
	public function showPilotIssuedAwards($pilotid)
	{
		$this->set('pilotid', $pilotid);
		$this->set('allawardtpes', vAwardsData::GetAllAwardTypes());
		$this->render('vAwards/profile_issued_awards.tpl');
	}
}