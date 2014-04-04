<?
// ===================================================
/*
	Test_03.php
	
	Description:
		This test confirms that the classes are retrieved, and can be used to 
		create a new folder in the Root_Folder folder.

	Features Tested
		Ladder can create a new class - for referencing folders
		Ladder can create a reference to a folder - refDayTimer, in the folder - Root_Folder
		Ladder can state the number of children present
		Ladder can update the state of a data item
		Ladder can delete the child reference - refDayTimer, from the folder - Root_Folder

	Test Setup
		It is assumed that Ladder has been successfully installed in Test_01.php
		It is assumed that the class Common_Address is not installed
	
	Version
			2013-08-22 - 8:00 am - MJF - Created
	
 */
// ===================================================

$dirRoot = $_SERVER ["DOCUMENT_ROOT"] ;
$dirShared = $dirRoot . "/CE/shared";
include_once ($dirShared . "/app.php");

include_once ("Ladder/Ladder_Ladder.php");

print ( date_create()->format ("Y-m-d h:m:s") . "<P>");

$bInstalled = $gblLadder->isInstalled ();
print ("is installed = " . $bInstalled . "<BR>");

if ($bInstalled == false)
{
	print ("Ladder not installed");
	exit ();
}

if (! defined ("ENetArch_Ladder_Classes_Folder_Reference") )
{
	$clsRolderRef = $gblLadder->Create_Class ("Folder_Reference", ENetArch_Ladder_Globals::cisReference(), 0 , true, null);
	define ("ENetArch_Ladder_Classes_" . $clsRolderRef->Name() , $clsRolderRef->ID () );
}

print ("ENetArch_Ladder_Classes_Folder_Reference = " . ENetArch_Ladder_Classes_Folder_Reference . "<br>");


$rootFolder = $gblLadder->getItem (1);
print ("count = " . $rootFolder->count()  . "<BR>");

$refFolder = $rootFolder->Create_Reference ("Folder", "referencing the root folder", ENetArch_Ladder_Classes_Folder_Reference, $rootFolder);
$refFolder->Store ();

print ("created reference " . $refFolder->Name() . " " . $refFolder->ID() . "<BR>");

// $itmAddress->Delete();
print ("count = " . $rootFolder->count()  . "<BR>");

print ( date_create()->format ("Y-m-d h:m:s") . "<P>");

?>
