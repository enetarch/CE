<?
	function dirPath() { return ("../"); }
	Include_Once (dirPath() . "Shared/Install_Functions.inc");
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{

	// ==================================
	// Common Classes

	$szStr =
		" szStreet1 varChar(40), " .
		" szStreet2 varChar(40), " .
		" szCity varChar(20), " .
		" szState varChar(2), " .
		" szZip varChar(10) " ;

	CreateClass ("Common_Address", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szMethod varChar(250) ";

	CreateClass ("Common_ContactMethod", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szType varChar(20) ";

	CreateClass ("Common_ContactType",  ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szTitle varChar(4), " .
		" szFirst varChar(20), " .
		" szMiddle varChar(20), " .
		" szLast varChar(20), " .
		" szSuffix varChar(4) " ;

	CreateClass ("Common_Name", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" dTarget DateTime, " .
		" nTime Integer, " .
		" nLength Integer, " .
		" szMemo varChar(250) " ;

	CreateClass ("Common_Apt", ldrGlobals::cisItem(), 0 , true, $szStr);


	$szStr =
		" dTarget DateTime, " .
		" nPriority Integer, " .
		" nTask Integer, " .
		" nTime Integer, " .
		" bCompleted VarChar (1), " .
		" dCompleted DateTime, " .
		" szMemo varChar(250) " ;

	CreateClass ("Common_Todo", ldrGlobals::cisItem(), 0 , true, $szStr);
	CreateClass ("Common_Todos",  ldrGlobals::cisFolder(), 0 , true);

	$szStr =
		" szType varChar(20) ";

	CreateClass ("Common_TaskType",  ldrGlobals::cisItem(), 0 , true, $szStr);
	CreateClass ("Common_TaskTypes", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_TaskTypes_Ref", ldrGlobals::cisReference(), 0 , true);

	$szStr =
		" szQuestion varChar(250), " .
		" szAnswer Text, " .
		" nPos Integer ";

	CreateClass ("Common_FAQ", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szFileName varchar(250), " .
		" szFileType varchar(250), " .
		" szImage MEDIUMBLOB " ;

	CreateClass ("Common_Image", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szNote Text " ;

	CreateClass ("Common_Note", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szURL varchar(250) " ;

	CreateClass ("Common_URL", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szDepartment varChar(40) ";

	CreateClass ("Common_Department", ldrGlobals::cisItem(), 0 , true, $szStr);

	$szStr =
		" szPosTitle varChar(40) ";

	CreateClass ("Common_PosTitle", ldrGlobals::cisItem(), 0 , true, $szStr);


	CreateClass ("Common_Apts", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_FAQs", ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Images", ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Notes", ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Project",  ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Projects",  ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Contacts", ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Contact", ldrGlobals::cisFolder(), 0 , true);
	CreateClass ("Common_Rolodex",  ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_Person", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_Company", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_Employee", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_ContactTypes", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Common_DayTimer", ldrGlobals::cisFolder(), 0 , true);

	printf ("<P> added Classes <P>");

	return ;
}

?>

