<?
class Daytimer_Todo extends ENetArch_Ladder_Item
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Todo") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Todo);
	}
	
	function __get ($szProperty) 
	{ return ( parent::Field ($szProperty) ); }
	
	function __set ($szProperty, $szValue) 
	{ parent::setField ($szProperty, $szValue); }
	
}

?>
