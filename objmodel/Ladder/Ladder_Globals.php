<?
/*	=======================================
	Copyright 1998, 2000, 2003, 2007, 2009 - E Net Arch
		www.ENetArch.net - 248-686-1407
		ENetArch on AIM, Yahoo, and Skype

	This program is distributed under the terms of the GNU 
	General Public License (or the Lesser GPL).
	======================================= */

Class ENetArch_Ladder_Globals
{
   function cName_Length () { return (40);}
   function cDescription_Length () { return ( 250);}

   function cisRoot () { return ( 1);}
   function cisFolder () { return ( 2);}
   function cisItem () { return ( 3);}
   function cisReference () { return ( 4);}

   function cOrderBy_ID () { return ( 0);}
   function cOrderBy_Name () { return ( 1);}
   function cOrderBy_Description () { return ( 2);}
   function cOrderBy_Size () { return ( 3);}
   function cOrderBy_Date () { return ( 4);}
   function cOrderBy_BaseType () { return ( 5);}
   function cOrderBy_Class () { return ( 6);}

	function cLadder_Table_Links () { return ( "Ladder_Links");}
	function cLadder_Table_Defination () { return ( "Ladder_Defination");}

	// ==================================
	// Classes
	
	function cClass_Ladder_Defination () { return (3); }
   function cClass_Ladder_Folder () { return (5); }
	function cClass_Ladder_Class () { return (7); }
   function cClass_RootFolder () { return (9); }
	function cClass_RootClasses () { return (11); }

	// ==================================
	// Versioning
}

?>
