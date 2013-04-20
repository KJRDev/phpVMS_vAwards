/**
Module Created By Vansers

This module is only use for phpVMS (www.phpvms.net) - (A Virtual Airline Admin Software)

@Created By Vansers
@Copyrighted @ 2011
@Under CC 3.0
@http://creativecommons.org/licenses/by-nc-sa/3.0/
**/

// Version 1.0 (May.32.12) - Module Created

===============

HOW TO USE THIS MODULE:

To display the pilot's awards in profile_main or somewhere else...

Add this, and it will show all of the awards!

<?php MainController::Run('vAwards', 'showPilotIssuedAwards', $userinfo->pilotid); ?>