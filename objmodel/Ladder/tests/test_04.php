<?
// ===================================================
/*
	Test_03.php
	
	Description:
		This test confirms that the classes are retrieved, and can be used to 
		create a new folder in the Root_Folder folder.

	Features Tested
		Ladder can create a new class - for data items
		Ladder can create a data item - Address, in the folder - Root_Folder
		Ladder can state the number of children present
		Ladder can update the state of a data item
		Ladder can delete the child data item - Address, from the folder - Root_Folder

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

	$szStr =
		" szStreet1 varChar(40), " .
		" szStreet2 varChar(40), " .
		" szCity varChar(20), " .
		" szState varChar(2), " .
		" szZip varChar(10) " ;

if (! defined ("ENetArch_Ladder_Classes_Common_Address") )
{
	$clsAddress = $gblLadder->Create_Class ("Common_Address", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);
	define ("ENetArch_Ladder_Classes_" . $clsAddress->Name() , $clsAddress->ID () );
}

print ("ENetArch_Ladder_Classes_Common_Address = " . ENetArch_Ladder_Classes_Common_Address . "<br>");

	$szData = Array
	(
		"szStreet1" => "PO Box 43766",
		"szStreet2" => "",
		"szCity" => "Detroit",
		"szState" => "MI",
		"szZip" => "48243-0766",
	);

$rootFolder = $gblLadder->getItem (1);
print ("count = " . $rootFolder->count()  . "<BR>");

$itmAddress = $rootFolder->Create_Item ("todo", "myTodo", ENetArch_Ladder_Classes_Common_Address);
$itmAddress->setData ($szData);
$itmAddress->Store ();

print ("created item " . $itmAddress->Name() . " " . $itmAddress->ID() . "<BR>");

	$szData = Array
	(
		"szStreet1" => "PO Box 64-0662",
		"szStreet2" => "",
		"szCity" => "San Francisco",
		"szState" => "CA",
		"szZip" => "94164",
	);

$itmAddress->setData ($szData);
$itmAddress->Store ();

print ("created item " . $itmAddress->Name() . " " . $itmAddress->ID() . "<BR>");
print ("count = " . $rootFolder->count()  . "<BR>");

// $itmAddress->Delete();
print ("count = " . $rootFolder->count()  . "<BR>");

print ( date_create()->format ("Y-m-d h:m:s") . "<P>");

?>
