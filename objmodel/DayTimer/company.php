<?
include_once ("address.php");
include_once ("contacts.php");

class Daytimer_Company extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Company") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Company);
	}
	
	function init_folder () {}
	
	function create_Address ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Address ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}

	function create_Contacts ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Contacts ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		return ($newItem);
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
