<?
/*	=======================================
	Copyright 1998, 2000, 2003, 2007, 2009 - E Net Arch
		www.ENetArch.net - 248-686-1407
		ENetArch on AIM, Yahoo, and Skype

	This program is distributed under the terms of the GNU 
	General Public License (or the Lesser GPL).
	======================================= */

Class ENetArch_Ladder_Folder extends ENetArch_Ladder_Properties
{
	Function Create ($thsParent = null, $thsName, $thsDescription, $thsClass)
	{
		if ($thsParent == null) 
		{
			parent::Create ($thsName, $thsDescription, 0, $thsClass, ENetArch_Ladder_Globals::cisRoot());
		}
		else
		{
			parent::Create ($thsName, $thsDescription, $thsParent->ID(), $thsClass, ENetArch_Ladder_Globals::cisFolder());
		}
	}
	
	// ===================================================
	
	Function Delete ()
	{
		$data = array
		(
			"command" => "Folder:Delete", 
			"verbose" => true, 
			"params" => Array ($this->ID())
		);

		return ( $this->cn->exec ($data) );
	}
	
	// ===================================================
	
	Function Count ($szName ="", $aryClasses=Array(), $nBaseType=0) // Array
	{
		// confirm that ladder is installed on this server
		$data = array
		(
			"command" => "Folder:Count", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType)
		);
																		
		return ($this->cn->exec ($data));		
	}

	// ===================================================

	Function Item ($nPos, $aryClasses=Array(), $nBaseType=0, $thsObject=null) // as Object
	{
		// print("Ladder_Folder . Item ( $nPos , $aryClasses, $nBaseType, " . ($thsObject != null)*1 . " )<BR>");
		
		$data = array
		(
			"command" => "Folder:Item", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $nPos, $aryClasses, $nBaseType)
		);
																		
		$row = $this->cn->exec ($data);
		
		$objItem = null;
		
		switch ($row [4])
		{
			case ENetArch_Ladder_Globals::cisRoot() :
			{
				$objItem = new ENetArch_Ladder_Folder ();
				break;
			}

			case ENetArch_Ladder_Globals::cisFolder() :
			{
				$objItem = new ENetArch_Ladder_Folder ();
				break;
			}

			case ENetArch_Ladder_Globals::cisItem() :
			{
				$objItem = new ENetArch_Ladder_Item ();
				break;
			}

			case ENetArch_Ladder_Globals::cisReference() :
			{
				$objItem = new ENetArch_Ladder_Reference ();
				break;
			}
		}

		if ($objItem != null)
		{
			$objItem->Connect ($this->cn);
			$objItem->setState ($row);
		}

		return ($objItem);
	}
	
	// ===================================================
	
	Function getChildren ($szName ="", $aryClasses=Array(), $nBaseType=0, $nOrderBy=0, $bASC=true) // Array
	{
		$data = array
		(
			"command" => "Folder:getChildren", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType, $nOrderBy, $bASC)
		);

		$rows = $this->cn->exec ($data);
		
		$objLinks = new ENetArch_Ladder_Links ($this->cn, $rows);

		return ($objLinks);			
	}

	// ===================================================

	Function Exists ($szName ="", $aryClasses=Array(), $nBaseType=0)
	{
		$data = array
		(
			"command" => "Folder:Exists", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType)
		);

		return ( $this->cn->exec ($data) );
	}
	
	Function SubFolders ($szName ="", $aryClasses=Array(), $nOrderBy=0, $bASC=true)
	{
		$data = array
		(
			"command" => "Folder:Exists", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType)
		);

		return ( $this->cn->exec ($data) );
	}
	
	Function Items ($szName ="", $aryClasses=Array(), $nOrderBy=0, $bASC=true)
	{
		$data = array
		(
			"command" => "Folder:Exists", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType)
		);

		return ( $this->cn->exec ($data) );
	}
	
	Function References ($szName ="", $aryClasses=Array(), $nOrderBy=0, $bASC=true)
	{
		$data = array
		(
			"command" => "Folder:Exists", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $aryClasses, $nBaseType)
		);

		return ( $this->cn->exec ($data) );
	}

	// ===================================================

	Function getFolder ($szName ="", $nClass=0, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:getFolder", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $nClass)
		);

		$row = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Folder ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($row);

		return ($objItem);
	}
	
	Function getItem($szName ="", $nClass=0, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:getItem", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $nClass)
		);

		$row = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Item ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($row);

		return ($objItem);
	}
	
	Function getReference ($szName ="", $nClass=0, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:getReference", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $nClass)
		);

		$row = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Reference ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($row);

		return ($objItem);
	}	

	// ===================================================
	
	Function Create_Folder ($szName, $szDescription, $nClass, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:Create_Folder", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $szDescription, $nClass)
		);

		$row = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Folder ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($row);

		return ($objItem);		
	}
	
	Function Create_Item ($szName, $szDescription, $nClass, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:Create_Item", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $szDescription, $nClass)
		);

		$rtn = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Item ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($rtn ["State"]);
		$objItem->setData ($rtn ["Data"]);

		return ($objItem);
	}

	Function Create_Reference ($szName, $szDescription, $nClass, $thsFolder, $thsObject=null)
	{
		$data = array
		(
			"command" => "Folder:Create_Reference", 
			"verbose" => true, 
			"params" => Array ($this->ID(), $szName, $szDescription, $nClass, $thsFolder)
		);

		$row = $this->cn->exec ($data);

		$objItem = new ENetArch_Ladder_Item ();
		$objItem->Connect ($this->cn);
		$objItem->setState ($row);

		return ($objItem);
	}

	// ===================================================
	// Change History
	
	/*
		2009-12-19 - added nOrderBy and bASC to SubFolders, Items, and References.
		
	*/
}

?>
