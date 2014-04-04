<?
class Daytimer_Note extends ENetArch_Ladder_Item
{
	function create (ENetArch_Ladder_Folder $thsParent, $szName, $szDescription)
	{
		if (! defined ("ENetArch_Ladder_Classes_Common_Note") ) 
			return ;

		parent::create ($thsParent, $szName, $szDescription, 
			ENetArch_Ladder_Classes_Common_Note);
	}
	
	function __get ($szProperty) 
	{ return ( parent::Field ($szProperty) ); }
	
	function __set ($szProperty, $szValue) 
	{ parent::setField ($szProperty, $szValue); }
	
}

?>
