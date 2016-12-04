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
class vAwardsAdmin extends CodonModule
{
	public function HTMLHead()
	{
		$this->set('sidebar', 'vAwards/sidebar.php');
	}
	
	public function NavBar()
    {
		if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) 
		{
        echo '<li><a href="'.SITE_URL.'/admin/index.php/vAwardsAdmin">vAwards Admin</a></li>';
		}
    }
	
	public function index()
	{
		$this->render('vAwards/index.php');
	}
	
	public function allawards()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addaward')
			{
				$this->add_award_post();
			}
			elseif($this->post->action == 'editaward')
			{
				$this->edit_award_post();
			}
			elseif($this->post->action == 'deleteaward')
			{
				$this->delete_award_post();	
			}
		}
		
		$this->set('allawards', vAwardsData::GetAllAwards());
		$this->render('vAwards/all_awards.php');
	}
	
	public function allawardtypes()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addawardtype')
			{
				$this->add_awardtype_post();	
			}
			elseif($this->post->action == 'editawardtype')
			{
				$this->edit_awardtype_post();	
			}
			elseif($this->post->action == 'deleteawardtype')
			{
				$this->delete_awardtype_post();	
			}
		}
		$this->set('alltypes', vAwardsData::GetAllAwardTypes());
		$this->render('vAwards/all_types.php');	
	}
	
	public function allissuedawards()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'issueaward')
			{
				$this->issue_award_post();	
			}
			elseif($this->post->action == 'deleteissuedaward')
			{
				$ret = vAwardsData::DeleteIssuedAward($this->post->id);
				echo json_encode(array('status'=>'ok'));
				return;
			}
		}
		
		$this->set('allissuedaward', vAwardsData::GetAllIssuedAwards());
		$this->render('vAwards/all_issued_awards.php');
	}
	
	public function addaward()
	{
		$check = vAwardsData::GetAllAwardTypes();
		if(count($check) == 0)
		{
			$this->set('message', 'You must add at least one award type before you create a award!');
			$this->render('core_error.php');
			return;
		}
		
		$this->set('title', 'Add Award');
		$this->set('action', 'addaward');
		$this->set('types', vAwardsData::GetAllAwardTypes());
		$this->render('vAwards/award_form.php');
	}
	
	public function editaward()
	{
		$this->set('title', 'Edit Award');
		$this->set('action', 'editaward');
		$this->set('types', vAwardsData::GetAllAwardTypes());
		$this->set('award', vAwardsData::GetAwardDetail($this->get->awd_id));
		$this->render('vAwards/award_form.php');
	}
	
	public function addawardtype()
	{
		$this->set('title', 'Add Award Type');
		$this->set('action', 'addawardtype');
		$this->render('vAwards/type_form.php');	
	}
	
	public function editawardtype()
	{
		$this->set('title', 'Edit Award Type');
		$this->set('action', 'editawardtype');
		$this->set('type', vAwardsData::GetTypeDetail($this->get->typ_id));
		$this->render('vAwards/type_form.php');
	}
	
	public function issueaward()
	{
		$check = vAwardsData::GetAllAwards();
		if(count($check) == 0)
		{
			$this->set('message', 'You must add at least one award before issuing an award!');
			$this->render('core_error.php');
			return;
		}
		
		$this->set('title', 'Issue Award To Pilot');
		$this->set('action', 'issueaward');
		$this->set('pilots', PilotData::getAllPilots());
		$this->set('awards', vAwardsData::GetAllAwards());
		$this->render('vAwards/issue_award.php');
	}
	/*
	
	
		POST ACTIONS
	
	
	*/
	
	protected function add_awardtype_post()
	{
		if($this->post->typ_name == '')
		{
			$this->set('message', 'You must enter the award type name!');
			$this->render('core_error.php');
			return;
		}
		
		vAwardsData::AddAwardType($this->post->typ_name);
		
		if(DB::errno() != 0)
		{
			//To Debug, add the following in the message.... DB::$error
			$this->set('message', 'There was an error adding the award type');
            $this->render('core_error.php');
			return;
		}
		
		$this->set('message', 'Award Type Added - '.$this->post->typ_name);
		$this->render('core_success.php');
	}
	
	protected function edit_awardtype_post()
	{	
		if($this->post->typ_name == '')
		{
			$this->set('message', 'Award Type Name can not be blank');
			$this->render('core_error.php');
			return;
		}
			
		vAwardsData::EditAwardType($this->post->typ_id, $this->post->typ_name);
		
		if(DB::errno() != 0)
		{
			$this->set('message', 'There was an error editing the award type');
			$this->render('core_error.php');
			return false;
		}

		$this->set('message', 'Award Type Edited - '.$this->post->typ_name);
		$this->render('core_success.php');
	}
	
	protected function add_award_post()
	{
		if($this->post->awd_name == '')
		{
			$this->set('message', 'You must enter the award name!');
			$this->render('core_error.php');
			return;
		}
		
		vAwardsData::AddAward($this->post->typ_id, $this->post->awd_name, $this->post->awd_desc, $this->post->awd_image);
		
		if(DB::errno() != 0)
		{
			//To Debug, add the following in the message.... DB::$error
			$this->set('message', 'There was an error adding the award');
            $this->render('core_error.php');
			return;
		}
		
		$this->set('message', 'Award Added - '.$this->post->awd_name);
		$this->render('core_success.php');
	}
	
	protected function edit_award_post()
	{	
		if($this->post->awd_name == '')
		{
			$this->set('message', 'Award Name can not be blank');
			$this->render('core_error.php');
			return;
		}
			
		vAwardsData::EditAward($this->post->awd_id, $this->post->typ_id, $this->post->awd_name, $this->post->awd_desc, $this->post->awd_image);
		
		if(DB::errno() != 0)
		{
			$this->set('message', 'There was an error editing the award');
			$this->render('core_error.php');
			return false;
		}

		$this->set('message', 'Award Edited - '.$this->post->awd_name);
		$this->render('core_success.php');
	}
	
	protected function issue_award_post()
	{
		$check = vAwardsData::CheckPilorAward($this->post->grt_pilotid, $this->post->grt_awdid);
		if($check)
		{
			$this->set('message', 'The pilot already has that award!');
			$this->render('core_error.php');
			return;	
		}
		
		vAwardsData::IssueAwardToPilot($this->post->grt_pilotid, $this->post->grt_awdid);
		
		if(DB::errno() != 0)
		{
			$this->set('message', 'There was an error issuing the award!');
			$this->render('core_error.php');
			return false;
		}
		
		$this->set('message', 'Award Issued!');
		$this->render('core_success.php');
	}
}