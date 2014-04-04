<?
include_once ("note.php");

class Daytimer_Notes extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Notes") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Notes);
	}
	
	function create_Note ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_Note ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}
	
	function getNotes ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Notes) ) );
	}
}

?>
