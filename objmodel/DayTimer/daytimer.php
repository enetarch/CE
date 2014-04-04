<?
// include_once ("../Ladder/Ladder_Ladder.php");

include_once ("contact_types.php");
include_once ("task_types.php");
include_once ("appointments.php");
include_once ("todos.php");
include_once ("notes.php");
include_once ("projects.php");
include_once ("rolodex.php");

class Daytimer_DayTimer extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_DayTimer") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_DayTimer);
	}
	
	function init_folder () 
	{
		$this->create_Contact_Types ( "Contact Types", "Contact Types");
		$this->create_Task_Types ("Task Types", "Task Types");
		
		$this->create_Appointments ("Appointments", "Appointments");
		$this->create_Todos ("Todos", "Todos");
		$this->create_Notes ("Notes", "Notes");
		$this->create_Projects ("Projects", "Projects");
		$this->create_Rolodex ("Rolodex", "Rolodex");
	}
	
	function getMe (ENetArch_Ladder_Folder $thsParent)
	{
		$thsFolder = $thsParent->getFolder ("DayTimer", ENetArch_Ladder_Classes_Common_DayTimer);
		$this->setState ( $thsFolder->getState() );
 	}
	
	// ===============================================
	
	function create_Contact_Types ($thsName, $thsDescription) 
	{
		$newFolder = new DayTimer_ContactTypes ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		$newFolder->init_folder ();
		return ($newFolder);
	}
	
	function create_Task_Types ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_TaskTypes ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		$newFolder->init_folder ();
		return ($newFolder);
	}
	
	function create_Appointments ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Appointments ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		return ($newFolder);
	}

	function create_Todos ($thsName, $thsDescription) 
	{
		$newFolder = new DayTimer_Todos ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		return ($newFolder);
	}
	
	function create_Notes ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Notes ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		return ($newFolder);
	}
	
	function create_Projects ($thsName, $thsDescription)
	{
		$newFolder = new DayTimer_Projects ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		return ($newFolder);
	}
	
	function create_Rolodex ($thsName, $thsDescription) 
	{
		$newFolder = new DayTimer_Rolodex ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->store();
		return ($newFolder);
	}
	

	// ===============================================
	
	function get_Contact_Types() 
	{
		$objFolder = $this->getFolder ("Contact Types", ENetArch_Ladder_Classes_Common_ContactTypes);
		$newFolder = new DayTimer_ContactTypes ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	
	function get_Task_Types () 
	{
		$objFolder = $this->getFolder ("Task Types", ENetArch_Ladder_Classes_Common_TaskTypes);
		$newFolder = new DayTimer_TaskTypes ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	
	function get_Appointments () 
	{
		$objFolder = $this->getFolder ("Appointments ", ENetArch_Ladder_Classes_Common_Appointments);
		$newFolder = new DayTimer_Appointments  ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	function get_Todos () 
	{
		$objFolder = $this->getFolder ("Todos", ENetArch_Ladder_Classes_Common_Todos);
		$newFolder = new DayTimer_Todos ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	function get_Notes () 
	{
		$objFolder = $this->getFolder ("Notes", ENetArch_Ladder_Classes_Common_Notes);
		$newFolder = new DayTimer_Notes ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	function get_Projects () 
	{
		$objFolder = $this->getFolder ("Projects", ENetArch_Ladder_Classes_Common_Projects);
		$newFolder = new DayTimer_Projects ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
	function get_Rolodex () 
	{
		$objFolder = $this->getFolder ("Rolodex", ENetArch_Ladder_Classes_Common_Rolodex);
		$newFolder = new DayTimer_Rolodex ();
		$newFolder->Connect ($this->cn);
		$newFolder->setState ($objFolder->getState());
	}
}

?>
