<?
	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_POST ['nID']))
		$nID = $_POST ["nID"];

	if (isset ($_POST ['txtName']))
		$txtName = $_POST ["txtName"];

	if (isset ($_POST ['txtDescription']))
		$txtDescription = $_POST ["txtDescription"];

	$objFolder = $gblLadder->getItem ($nID);
	if (!$objFolder->isFolder()) header ("Location: list.php?nID=" . $nID . "&");

	$objItem = $objFolder->Create_Folder ($txtName, $txtDescription, ldrGlobals::cClass_Ladder_Folder());

	$objItem->Store();

	$newID = $objItem->ID();

	header ("Location:view.php?nID=" . $newID . "&");
}
?>

