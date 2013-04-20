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
class vAwardsData extends CodonData
{
	public static function GetAllIssuedAward($pilotid, $typ_id)
	{
		$sql = 'SELECT i.*, a.*, t.*, UNIX_TIMESTAMP(i.grt_dategrant) as grt_dategrant
		FROM vawards_grants i
		LEFT JOIN vawards_awards a ON a.awd_id=i.grt_awdid
		LEFT JOIN vawards_types t ON t.typ_id=a.typ_id
		WHERE i.grt_pilotid='.$pilotid.' AND t.typ_id='.$typ_id.'';
		return DB::get_results($sql);
	}
	
	public static function GetAllAwardTypes()
	{
		$sql = 'SELECT * FROM vawards_types';
		return DB::get_results($sql);
	}
	
	public static function GetTypeDetail($typ_id)
	{
		$typ_id = DB::escape($typ_id);
		
		return DB::get_row('SELECT * FROM vawards_types 
							WHERE `typ_id`='.$typ_id);	
	}
	
	public static function GetAllAwards()
	{
		$sql = 'SELECT a.*, t.*
		FROM vawards_awards a
		LEFT JOIN vawards_types t ON t.typ_id=a.typ_id';
		return DB::get_results($sql);	
	}
	
	public static function CheckPilorAward($pilotid, $awd_id)
	{
		$pilotid = intval($pilotid);
		$awd_id = intval($awd_id);
		
		$sql = 'SELECT g.grt_id, g.grt_pilotid
				FROM vawards_grants g
				WHERE g.`grt_pilotid`='.$pilotid.'
				AND g.`grt_awdid`='.$awd_id;
					  
		return DB::get_row($sql);	
	}
	
	public static function IssueAwardToPilot($grt_pilotid, $grt_awdid)
	{	
		$sql = "INSERT INTO vawards_grants (
					`grt_pilotid`, `grt_awdid`, `grt_dategrant`) 
				VALUES ('$grt_pilotid', '$grt_awdid', NOW())";
		
		$res = DB::query($sql);
		
		if(DB::errno() != 0)
		return false;
	}
	
	public static function DeleteIssuedAward($grt_id)
	{
		$grt_id = intval($grt_id);
		
		$sql = 'DELETE FROM vawards_grants
					WHERE `grt_id`='.$grt_id;
		
		DB::query($sql);
		
		if(DB::errno() != 0)
		return false;
	}
	
	public static function GetAllIssuedAwards()
	{
		$sql = 'SELECT i.*, a.*, t.*, p.*, UNIX_TIMESTAMP(i.grt_dategrant) as grt_dategrant
		FROM vawards_grants i
		LEFT JOIN vawards_awards a ON a.awd_id=i.grt_awdid
		LEFT JOIN vawards_types t ON t.typ_id=a.typ_id
		LEFT JOIN '.TABLE_PREFIX.'pilots p ON p.pilotid=grt_pilotid';
		return DB::get_results($sql);	
	}
	
	public static function GetAwardDetail($awd_id)
	{
		$awd_id = DB::escape($awd_id);
		
		return DB::get_row('SELECT * FROM vawards_awards 
							WHERE `awd_id`='.$awd_id);	
	}
	
	public static function AddAwardType($typ_name)
	{
		$typ_name = DB::escape($typ_name);
		
		$sql = "INSERT INTO vawards_types (
					`typ_name`) 
				VALUES ('$typ_name')";
		
		$res = DB::query($sql);
		
		if(DB::errno() != 0)
		return false;
	}
	
	public static function EditAwardType($typ_id, $typ_name)
	{
		$typ_name = DB::escape($typ_name);
		
		$sql = "UPDATE vawards_types
				SET `typ_name`='$typ_name'
				WHERE typ_id=$typ_id";
		
		$res = DB::query($sql);
		
		if(DB::errno() != 0)
			return false;
			
		return true;
	}
	
	public static function AddAward($typ_id, $awd_name, $awd_desc, $awd_image)
	{
		
		$sql = "INSERT INTO vawards_awards (
					`typ_id`, `awd_name`, `awd_desc`, `awd_image`) 
				VALUES ('$typ_id', '$awd_name', '$awd_desc', '$awd_image')";
		
		$res = DB::query($sql);
		
		if(DB::errno() != 0)
			return false;
	}
	
	public static function EditAward($awd_id, $typ_id, $awd_name, $awd_desc, $awd_image)
	{
		
		$sql = "UPDATE vawards_awards
				SET `typ_id`='$typ_id', `awd_name`='$awd_name', `awd_desc`='$awd_desc', `awd_image`='$awd_image' 
				WHERE awd_id=$awd_id";
		
		$res = DB::query($sql);
		
		if(DB::errno() != 0)
			return false;
			
		return true;
	}
}