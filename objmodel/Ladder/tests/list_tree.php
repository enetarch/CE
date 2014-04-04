<?
// ===================================================
/*
	list_tree.php
	
	Description:
		lists the contents of a folder
	
	Params
		nID - the folder to list
		
	Features Tested

	Test Setup
		It is assumed that Ladder has been successfully installed in Test_01.php
	
	Version
			2013-08-22 - 8:00 am - MJF - Created
		
	
 */
// ===================================================

$dirRoot = $_SERVER ["DOCUMENT_ROOT"] ;
$dirShared = $dirRoot . "/CE/shared";
include_once ($dirShared . "/app.php");


include_once ("../Ladder_Ladder.php");

print ( date_create()->format ("Y-m-d h:m:s") . "<P>");

$bInstalled = $gblLadder->isInstalled ();
print ("is installed = " . $bInstalled . "<BR>");

if ($bInstalled == false)
{
	print ("Ladder not installed");
	exit ();
}

$nID = isset ($_GET["nID"]) ? $_GET["nID"] : 1;

$thsFolder = $gblLadder->getItem ($nID);

for ($t=1; $t<$thsFolder->count()+1; $t++)
{
	$thsItem = $thsFolder->Item ($t);
	print 
	(	
		$thsItem->ID() .  " " .
		$thsItem->Name() .  " " .
		$thsItem->Description() .  " " .
		$thsItem->ParentID() .  " " .
		$thsItem->ClassID() .  " " .
		$thsItem->BaseType() .  " " .
		$thsItem->Leaf() .  " " 
	);
}
?>
