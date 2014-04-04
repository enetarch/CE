<?
include_once ("person.php");
include_once ("company.php");

class Daytimer_Rolodex extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Rolodex") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Rolodex);
	}
	
	function init_folder	 ()
	{	}
	
	// ===============================================
	
	function create_Person (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Person ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();		
		return ($newFolder);
	}
	
	function create_Company (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Company ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();
		return ($newFolder);
	}

	function create_Rolodex (string $thsName, string $thsDescription) 
	{
		$newFolder = new DayTimer_Rolodex ();
		$newFolder->Connect ($this->cn);
		$newFolder->create ($this, $thsName, $thsDescription);
		$newFolder->init_folder ();
		return ($newFolder);
	}

	// ===============================================
	
	function getPerson ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Person) ) );
	}

	function getCompany ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Company) ) );
	}

	function getRolodex ($nPos)
	{
		return ( parent::Item ($nPos, Array (ENetArch_Ladder_Classes_Common_Rolodex) ) );
	}


}

?>
