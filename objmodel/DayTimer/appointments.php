<?
include_once ("appointment.php");

class Daytimer_Appointments extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Appointments") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Appointments);
	}
	
	function create_Appointment ($thsName, $thsDescription)
	{
		$newItem = new DayTimer_Appointment ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		return ($newItem);
	}
		
	function getAppointment ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Appointment) ) );
	}
}

?>
