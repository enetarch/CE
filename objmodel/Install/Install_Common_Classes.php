<?
	include_once ("Install_Functions.inc");
	include_once ("../../shared/app.php");
	include_once ("../Ladder/Ladder_Ladder.php");

	// ==================================
	// Common Classes

	$szStr =
		" szStreet1 varChar(40), " .
		" szStreet2 varChar(40), " .
		" szCity varChar(20), " .
		" szState varChar(2), " .
		" szZip varChar(10) " ;

	CreateClass ("Common_Address", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szMethod varChar(250) ";

	CreateClass ("Common_ContactMethod", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szType varChar(20) ";

	CreateClass ("Common_ContactType",  ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szTitle varChar(4), " .
		" szFirst varChar(20), " .
		" szMiddle varChar(20), " .
		" szLast varChar(20), " .
		" szSuffix varChar(4) " ;

	CreateClass ("Common_Name", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" dTarget DateTime, " .
		" nTime Integer, " .
		" nLength Integer, " .
		" szMemo varChar(250) " ;

	CreateClass ("Common_Apt", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);


	$szStr =
		" dTarget DateTime, " .
		" nPriority Integer, " .
		" nTask Integer, " .
		" nTime Integer, " .
		" bCompleted VarChar (1), " .
		" dCompleted DateTime, " .
		" szMemo varChar(250) " ;

	CreateClass ("Common_Todo", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);
	CreateClass ("Common_Todos",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	$szStr =
		" szType varChar(20) ";

	CreateClass ("Common_TaskType",  ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);
	CreateClass ("Common_TaskTypes", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_TaskTypes_Ref", ENetArch_Ladder_Globals::cisReference(), 0 , true);

	$szStr =
		" szQuestion varChar(250), " .
		" szAnswer Text, " .
		" nPos Integer ";

	CreateClass ("Common_FAQ", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szFileName varchar(250), " .
		" szFileType varchar(250), " .
		" szImage MEDIUMBLOB " ;

	CreateClass ("Common_Image", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szNote Text " ;

	CreateClass ("Common_Note", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szURL varchar(250) " ;

	CreateClass ("Common_URL", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szDepartment varChar(40) ";

	CreateClass ("Common_Department", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szPosTitle varChar(40) ";

	CreateClass ("Common_PosTitle", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);


	CreateClass ("Common_Apts", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_FAQs", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Images", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Notes", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Project",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Projects",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Contacts", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Contact", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Common_Rolodex",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_Person", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_Company", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_Employee", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_ContactTypes", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Common_DayTimer", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	printf ("<P> added Classes <P>");


?>

