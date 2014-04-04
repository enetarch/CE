<?
include_once ("contact_type.php");

class Daytimer_ContactTypes extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent,  $szName,  $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_ContactTypes") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_ContactTypes);
	}

	function init_folder ()
	{}

	function create_ContactType ($szName, $szDescription)
	{
		$newItem = new DayTimer_ContactType ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}
	
	function getContactTypes ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_ContactTypes) ) );
	}
}

?>
