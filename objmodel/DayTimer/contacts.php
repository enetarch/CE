<?
include_once ("contact.php");

class Daytimer_Contacts extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Contacts") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Contacts);
	}
	
	function create_Contact ($szName, $szDescription)
	{
		$newFolder = new DayTimer_Contact ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();	
		return ($newFolder);	
	}
	
	function getContact ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Contact) ) );
	}
}

?>
