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

	printf ("getting Folder<BR>");
	$objFolder = $gblLadder->getItem ($nID);
	if (!$objFolder->isFolder()) header ("Location: list.php?nID=" . $nID . "&");

	printf ("getting Class<BR>");
	$cClass_Inventory_Inventory = $gblLadder->getClass("Inventory_Inventory", 0)->ID();

	printf ("Creating Folder<BR>");
	$objItem = $objFolder->Create_Folder ($txtName, $txtDescription, $cClass_Inventory_Inventory);

	printf ("Storing Folder<BR>");
	$objItem->Store();

	printf ("getting ID<BR>");
	$newID = $objItem->ID();

	header ("Location:view.php?nID=" . $newID . "&");
}
?>

