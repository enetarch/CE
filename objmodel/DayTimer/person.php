<?
include_once ("name.php");
include_once ("address.php");
include_once ("contacts.php");

class Daytimer_Person extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Person") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Person);
	}
	
	function init_folder	 ()
	{
		$this->create_Name ("new Name", "The name of the person");
		$this->create_Address ("new Address", "Their address");
		$this->create_Contacts ("Contacts", "How to contact them");
	}
	
	// ===============================================
	
	function create_Name (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Name ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();		
		return ($newFolder);
	}
	
	function create_Address (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Address ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();
		return ($newFolder);
	}

	function create_Contacts (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Contacts ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();
		return ($newFolder);
	}

	// ===============================================
	
	function getName ()
	{
		return ( parent::Item (1, Array (ENetArch_Ladder_Classes_Common_Name) ) );
	}

	function getAddress ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Address) ) );
	}

	function getContacts ()
	{
		return ( parent::Item (1, Array (ENetArch_Ladder_Classes_Common_Contacts) ) );
	}
}

?>
