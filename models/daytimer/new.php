<?
$rtn = Array ();

$dirRoot = $_SERVER ["DOCUMENT_ROOT"] ;
$dirShared = $dirRoot . "/CE/shared";
$dirModel = $dirRoot . "/CE/objmodel";

include_once ($dirShared . "/app.php"); 
include_once ($dirModel . "/DayTimer/daytimer.php");

// if (! isset ($aryParams ["nID"]) ) return;

// $thsFolder = $aryParams ["nID"];

// $fldrDayTimer = $gblLadder->getItem ($thsFolder);

$objFolders = $gblLadder->getRoots ();
$rootFolder = $objFolders->getItem (1);

$fldrDayTimer = new DayTimer_DayTimer ();
$fldrDayTimer->connect ($gblLadder->cn);

if ($rootFolder->exists ("DayTimer") )
{
	$fldrDayTimer->getMe($rootFolder);
}
else
{
	$fldrDayTimer->create ($rootFolder, "DayTimer", "");
	$fldrDayTimer->Store();
	$fldrDayTimer->init_Folder();
} 

print ("ID = " . $fldrDayTimer->ID() . "<BR>");

$rtn = $fldrDayTimer->ID();

?>
