<?
include_once ("rpc.php");
include_once ("functions.php");
include_once ("Ladder_Globals.php");
include_once ("Ladder_Properties.php");
include_once ("Ladder_Links.php");
include_once ("Ladder_Folders.php");
include_once ("Ladder_Folder.php");
include_once ("Ladder_Item.php");
include_once ("Ladder_Reference.php");
include_once ("Ladder_Classes.php");
include_once ("Ladder_Class.php");

class ENetArch_Ladder
{
	public $cn = null;
	public $bVerbose = false;
	private $szSessionID = "";
	
	function connect ($szURL, $szSerNo, $szUID, $szPSW) 
	{
		// log into Ladder Server
		$this->cn = new rpc ($szURL);
		
		if ($this->isInstalled() )
		{
			$fldrClasses = $this->getClasses();
			$objChildren = $fldrClasses->getChildren ();
			
			for ($t=0; $t< $objChildren->Count(); $t++)
			{
				$objClass = $objChildren->getItem ($t+1);
				
				define ( "ENetArch_Ladder_Classes_" . $objClass->Name(), $objClass->ID() );
				// print ( "ENetArch_Ladder_Classes_" . $objClass->Name() . " = " . $objClass->ID() . "<BR>");
			}
		}
	}
		
	function disconnect () 
	{
		// drop the session from the Ladder Server
		$this->szSessionID = "";
		$this->cn = null;
	}
	
	// =================================================================
	
	// =================================================================
	
	function Version () 
	{
		// confirm that ladder is installed on this server
		$data = array
		(
			"command" => "Ladder:Version", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);
																		
		return ($this->cn->exec ($data));		
	}
	
	// =================================================================

	function isInstalled () 
	{
		// confirm that ladder is installed on this server
		$data = array
		(
			"command" => "Ladder:isInstalled", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);

		return ( $this->cn->exec ($data) );		
	}
	
	function Install () 
	{
		// install Ladder on this server
		$data = array
		(
			"command" => "Ladder:Install", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);
																		
		return ($this->cn->exec ($data));		
	}

	function unInstall () 
	{
		// unInstall Ladder from this server
		$data = array
		(
			"command" => "Ladder:unInstall", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);
																		
		return ($this->cn->exec ($data));		
	}
	
	function getItem ($nID)
	{
		$data = array
		(
			"command" => "Ladder:getItem", 
			"verbose" => true, 
			"params" => Array ($nID)
		);
																		
		$thsState = $this->cn->exec ($data);
		
		$objItem = null;

		if ($thsState != null) 
		{
			switch ($thsState [4])
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
				$objItem->setState ($thsState);
			}
		}

		return ($objItem);
	}

	Function getObject ($nID, $thsObject)
	{
		$data = array
		(
			"command" => "Ladder:getItem", 
			"verbose" => $this->bVerbose, 
			"params" => Array ($nID)
		);
		
		$thsState = $this->cn->exec ($data);
		
		$thsObject->Connect ($this->cn);
		$thsObject->setState ($thsState);
		
		return ($thsObject);
	}

	function getRoots ()
	{
		$data = array
		(
			"command" => "Ladder:getRoots", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);
																		
		$thsState = $this->cn->exec ($data);
		$newFolder = new ENetarch_Ladder_Folders ($this->cn, $thsState);
		// $newFolder->connect ($this->cn);
		// $newFolder->setState ($thsState);

		return ($newFolder);	
	}
	
	Function Create_Root ($szName, $szDesc, $nClass)
	{
		$data = array
		(
			"command" => "Ladder:Create_Root", 
			"verbose" => $this->bVerbose, 
			"params" => Array ($szName, $szDesc, $nClass)
		);

		$thsState = $this->cn->exec ($data);
		$newFolder = new ENetArch_Ladder_Folder ();
		$newFolder->connect ($this->cn);
		$newFolder->setState ($thsState);

		return ($newFolder);
	}	
	
	Function Root_Exists ($thsName, $nClass = 0)
	{
		$data = array
		(
			"command" => "Ladder:Root_Exists", 
			"verbose" => $this->bVerbose, 
			"params" => Array ($thsName, $nClass = 0)
		);
																		
		return ($this->cn->exec ($data));		
	}
	
	// ===================================

	Function getClasses ()
	{
		$data = array
		(
			"command" => "Ladder:getClasses", 
			"verbose" => $this->bVerbose, 
			"params" => Array ()
		);

		$thsState = $this->cn->exec ($data);
		$newFolder = new ENetArch_Ladder_Folder ();
		$newFolder->connect ($this->cn);
		$newFolder->setState ($thsState);

		return ($newFolder);
	}
	
	// ===================================

	Function create_Class ($thsName, $nBaseType, $ofClass, $bAcceptsAll, $szStr="")
	{
		$data = array
		(
			"command" => "Ladder:create_Class", 
			"verbose" => $this->bVerbose, 
			"params" => Array ($thsName, $nBaseType, $ofClass, $bAcceptsAll, $szStr)
		);

		$thsState = $this->cn->exec ($data);
		$newFolder = new ENetArch_Ladder_Folder ();
		$newFolder->connect ($this->cn);
		$newFolder->setState ($thsState);

		return ($newFolder);		
	}

	// ===================================
	
	Function getClass ($thsName = "", $nClassID = 0)
	{
		$data = array
		(
			"command" => "Ladder:getClass", 
			"verbose" => $this->bVerbose, 
			"params" => Array ( $thsName, $nClassID )
		);
		
		$thsState = $this->cn->exec ($data);
		
		$newFolder = new ENetArch_Ladder_Class();
		$newFolder->connect ($this->cn);
		$newFolder->setState ($thsState);
		
		return ($newFolder);		
	}	
}
?>
