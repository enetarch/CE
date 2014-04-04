<?
/*	=======================================
	Copyright 1998, 2000, 2003, 2007, 2009 - E Net Arch
		www.ENetArch.net - 248-686-1407
		ENetArch on AIM, Yahoo, and Skype

	This program is distributed under the terms of the GNU 
	General Public License (or the Lesser GPL).
	======================================= */

Class ENetArch_Ladder_Item extends ENetArch_Ladder_Properties
{
	var $objData = null ;
	var $szTableName = "";
	
	Function Create ($thsParent, $thsName, $thsDescription, $thsClass)
	{
		if ($thsParent == null) return;
		
		parent::Create ($thsName, $thsDescription, $thsParent->ID(), $thsClass, ENetArch_Ladder_Globals::cisItem(), 0);
	}

	Function Create2 ($thsParent, $thsName, $thsDescription, $thsClass, $szTableName)
	{
		if ($thsParent == null) return;
		
		$this->szTableName = $szTableName;
		
		parent::Create ($thsName, $thsDescription, $thsParent->ID(), $thsClass, ENetArch_Ladder_Globals::cisItem(), 0);
	}

	// ==================================================

	function setState ($thsState)
	{
		parent::setState ($thsState);
		
		if ($this->ID () != 0)
			$this->getData ();
	}
	
	// ==================================================

	Function getTableName ()
	{
		Global $gblLadder;

		if ($this->getClass() == ENetArch_Ladder_Globals::cClass_Ladder_Defination())
		{ $this->szTableName = "Ladder_Defination"; }
		
		if (strLen ($this->szTableName) == 0)
		{
			$objClass = $this->getClassFolder();
			$objDef = $objClass->getItem ("", ENetArch_Ladder_Globals::cClass_Ladder_Defination());
			$this->szTableName = $objDef->Field ("szTable");
		}
		
		return ($this->szTableName);
	}

	// ===================================================
	
	Function Delete () 
	{  
		$data = array
		(
			"command" => "Item:Delete", 
			"verbose" => true, 
			"params" => Array ($this->ID() )
		);

		return ($this->cn->exec ($data));
	}
	
	// ===================================================

	Function getStructure () // as Array
	{
		$data = array
		(
			"command" => "Item:getStructure", 
			"verbose" => true, 
			"params" => Array ($this->ID() )
		);

		return ($this->cn->exec ($data));
	}
	
	// ===================================================

	Function getData () // as Array
	{
		if ($this->objData != null) return ($this->objData);

		$data = array
		(
			"command" => "Item:getData", 
			"verbose" => true, 
			"params" => Array ($this->ID() )
		);
		
		$this->objData = $this->cn->exec ($data);
		
		return ($this->objData);
	}
	
	function setData ($thsData)
	{
		if ($thsData == null) return;
		$this->objData = $thsData;
	}

	// ===================================================

	Function saveData ($thsData = null)
	{
		if (($this->objData == null) && ($thsData == null)) return;
		
		if ($thsData != null) 
			$this->objData = $thsData;
			
		$data = array
		(
			"command" => "Item:saveData", 
			"verbose" => true, 
			"params" => array (0 =>$this->getState(), 1=>$this->objData)
		);
		
		$thsState = $this->cn->exec ($data);
		
		$this->setState ($thsState);
			
		return (true);
	}
	
	// ===================================================

	Function Store ()
	{
		$this->saveData();
		// parent::Store();
	}

	// ===================================================

	Function Field ($thsField)
	{
		if (strLen (trim ($thsField)) == 0) return;
		if ($this->objData == null) $this->getData();
		
		return ($this->objData[$thsField]);
	}
	
	Function setField ($thsField, $thsValue)
	{
		if (strLen (trim ($thsField)) == 0) return;
		if ($this->objData == null) $this->getData();
		
		$this->objData[$thsField] = $thsValue;
	}
	
}

function Left ($szStr, $nLen)
{ return ( subStr ($szStr, 0, $nLen)); }

/*
	Version Updates
	2011-05-05 - mjf - changed SaveData ($objData) to SaveData ($thsData)
		to avoid confusion in other languages where objData and this.objData
		can point to the same values.
*/

?>
