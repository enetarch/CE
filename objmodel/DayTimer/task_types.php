<?
include_once ("task_type.php");

class Daytimer_TaskTypes extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_TaskTypes") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_TaskTypes);
	}

	function init_folder ()
	{}

	function create_TaskType (string $thsName, string $thsDescription) 
	{
		$newItem = new DayTimer_TaskType ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}
	
	function getTaskTypes ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_TaskTypes) ) );
	}
}

?>
