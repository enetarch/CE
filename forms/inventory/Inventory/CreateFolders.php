<?
	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_GET ['nID']))
		$nID = $_GET ["nID"];

	$objFolder = $gblLadder->getItem ($nID);
	if (!$objFolder->isFolder()) header ("Location: list.php?nID=" . $nID . "&");

	$cClass_Inventory_Products = $gblLadder->getClass("Inventory_Products", 0)->ID();
	$cClass_Inventory_Catagories = $gblLadder->getClass("Inventory_Catagories", 0)->ID();

	if (! $objFolder->Exists ("Products", $cClass_Inventory_Products))
	{
		$objItem = $objFolder->Create_Folder
			("Products", "The List of Products for sale", $cClass_Inventory_Products);

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Catagories", $cClass_Inventory_Catagories))
	{
		$objItem = $objFolder->Create_Folder
			("Catagories", "Products sorted by Catagory", $cClass_Inventory_Catagories);

		$objItem->Store();
	}

	header ("Location:view.php?nID=" . $nID . "&");
}
?>

