<?
include_once ("todo.php");

class Daytimer_Todos extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Todos") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Todos);
	}

	function init_folder ()
	{}
	
	function create_Todo ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_Todo ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}
	
	function getTodos ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Todos) ) );
	}
}

?>
