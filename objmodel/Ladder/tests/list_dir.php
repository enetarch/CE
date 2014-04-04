<?
// ===================================================
/*
	Test_04.php
	
	Description:
		This test confirms that the classes are retrieved, and can be used to 
		create a new folder in the Root_Folder folder.

	Features Tested
		Ladder can retrieve the folder - Root_Folder
		Ladder can create a folder - DayTimer, in the folder - Root_Folder
		Ladder can state the number of children present
		Ladder can delete the child folder - DayTimer, from the folder - Root_Folder

	Test Setup
		It is assumed that Ladder has been successfully installed in Test_01.php
	
	Version
			2013-08-22 - 8:00 am - MJF - Created
		
	
 */
// ===================================================

print ($_SERVER ["SCRIPT_FILENAME"] . "<BR>");

$handle = opendir("/var/www/html/LadderClnt/Ladder");
while (false !== ($entry = readdir($handle))) 
     print ( "$entry <BR>");


?>
