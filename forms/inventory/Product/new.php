<?
	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_GET ['nID']))
	{ $nID = $_GET ["nID"]; }
	else
	{ 	return; }

	$nClass = ldrGlobals::cClass_Inventory_Product();

	$objFolder = $gblLadder->getItem ($nID);
	$objItem = $objFolder->Create_Folder ("new Instance", "", $nClass);
	$objItem->Store();


	header ("Location:edit.php?nID=" . $objItem->ID());
}
?>