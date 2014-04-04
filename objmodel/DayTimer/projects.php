<?
include_once ("appointment.php");
include_once ("note.php");
include_once ("todo.php");

class Daytimer_Projects extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Projects") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Projects);
	}
	
	function init_folder () {}
	
	function create_Appointment ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_Appointment ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}

	function create_note ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_note ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}

	function create_Todo ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_Todo ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}

	function create_Project ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Project ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		return ($newFolder);
	}

	function getAppointment ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Appointment) ) );
	}

	function getNote ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Note) ) );
	}

	function getTodo ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Todo) ) );
	}

	function getProject ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Projects) ) );
	}
}

?>
