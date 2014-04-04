<?
include_once ("contact_type.php");
include_once ("contact_method.php");

class Daytimer_Contact extends ENetArch_Ladder_Folder
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Contact") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Contact);
	}
	
	function init_folder	 ()
	{
		$this->create_ContactMethod ("Contact Method", "Contact Method");
		$this->create_ContactType ("Contact Type", "Contact Type");
	}
	
	// ===============================================
	
	function create_ContactMethod (string $thsName, string $thsDescription) 
	{
		$newItem = new DayTimer_ContactMethod ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		$newItem->init_folder ();
		return ($newItem);
	}
	
	function create_ContactType (string $thsName, string $thsDescription) 
	{
		$newItem = new DayTimer_ContactType ();
		$newItem->Connect ($this->cn);
		$newItem->create ($this, $thsName, $thsDescription);
		$newItem->init_folder ();
		return ($newItem);	
	}

	// ===============================================
	
	function getContactMethod ()
	{
		return ( parent::Item (1, Array (ENetArch_Ladder_Classes_Common_ContactMethod) ) );
	}

	function getContactType ()
	{
		return ( parent::Item (1, Array (ENetArch_Ladder_Classes_Common_ContactType) ) );
	}

}

?>
