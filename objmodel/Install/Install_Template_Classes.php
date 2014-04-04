<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// File_Name
	//
	//	heirarchy
	//		goes
	//			down
	//		here
	//
	//
	//
	//



return ;
}
?>

---These are for refrenced Folders and Items and Refrences---
//"_" Folder Class ""
$cls = $gblLadder->getClass ("_")->ID();
CreateClass ("_", ldrGlobals::cisFolder(), $cls , true);

//"_" Reference Class ""
CreateClass ("_",  ldrGlobals::cisReference(), 0 , true);

//"_" Item Class ""
$cls = $gblLadder->getClass ("_")->ID();
CreateClass ("_", ldrGlobals::cisItem(), $cls , true);

-----------These are for regular Folders and Items------------
CreateClass ("_", ldrGlobals::cisFolder(), 0 , true);
//->
$szStr =
	"  ";
CreateClass ("_", ldrGlobals::cisItem(), 0 , true, $szStr);

----Use for anything already created----
//"_" Already Created