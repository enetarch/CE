<?
// ===================================================
/*
	Test_01.php
	
	Description:
		This test verifies that the client can connect to the server and determine if
		Ladder is installed or not.  It then uninstalls it if it is installed.  Andfinally,
		installs Ladder.
	
	Features Tested
		Ladder can detect when installed on server
		Ladder can uninstall itself if needed
		Ladder can install itself

	Test Setup
		Several runs are needed to complete this test.
		1st run - Ladder is not installed
		2nd run - Ladder is installed
		3rd run - Ladder is installed
		
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
print ("is installed = " . $bInstalled*1 . "<BR>");

if ($bInstalled)
{
	$bInstalled = $gblLadder->unInstall ();
	print ("unInstalled = " . $bInstalled*1 . "<BR>");
}

$bInstalled = $gblLadder->Install ();
print ("installed = " . $bInstalled*1 . "<BR>");

print ( date_create()->format ("Y-m-d h:m:s") . "<P>");

?>
