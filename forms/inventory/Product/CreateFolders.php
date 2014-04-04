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

	if (! $objFolder->Exists ("Description", ldrGlobals::cClass_Inventory_Description()))
	{
		$objItem = $objFolder->Create_Item
			("Description", "The Description of the Product", ldrGlobals::cClass_Inventory_Description());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Features", ldrGlobals::cClass_Inventory_Features()))
	{
		$objItem = $objFolder->Create_Item
			("Features", "The Features of the Product", ldrGlobals::cClass_Inventory_Features());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Specifications", ldrGlobals::cClass_Inventory_Specifications()))
	{
		$objItem = $objFolder->Create_Item
			("Specifications", "Products sorted by Catagory", ldrGlobals::cClass_Inventory_Specifications());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("RelatedTo", ldrGlobals::cClass_Inventory_RelatedTo()))
	{
		$objItem = $objFolder->Create_Folder
			("RelatedTo", "Products sorted by Catagory", ldrGlobals::cClass_Inventory_RelatedTo());

		$objItem->Store();
	}

	// ==================
	if (! $objFolder->Exists ("ItemNo", ldrGlobals::cClass_Inventory_ItemNo()))
	{
		$objItem = $objFolder->Create_Item
			("ItemNo", "The Products ItemNo", ldrGlobals::cClass_Inventory_ItemNo());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Images", ldrGlobals::cClass_Inventory_Images()))
	{
		$objItem = $objFolder->Create_Folder
			("Images", "Images of the Product", ldrGlobals::cClass_Inventory_Images());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Keywords", ldrGlobals::cClass_Inventory_Keywords()))
	{
		$objItem = $objFolder->Create_Folder
			("Keywords", "Keywords used to find the Product", ldrGlobals::cClass_Inventory_Keywords());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Pricing", ldrGlobals::cClass_Inventory_Pricing()))
	{
		$objItem = $objFolder->Create_Folder
			("Pricing", "Products Pricing", ldrGlobals::cClass_Inventory_Pricing());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Taxable", ldrGlobals::cClass_Inventory_Taxable()))
	{
		$objItem = $objFolder->Create_Item
			("Taxable", "Is the Product Taxable", ldrGlobals::cClass_Inventory_Taxable());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("PackageTypes", ldrGlobals::cClass_Inventory_PackageType()))
	{
		$objItem = $objFolder->Create_Item
			("PackageType", "How is the Product Packaged", ldrGlobals::cClass_Inventory_PackageTypes());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Reviews", ldrGlobals::cClass_Inventory_Reviews()))
	{
		$objItem = $objFolder->Create_Folder
			("Reviews", "Products sorted by Catagory", ldrGlobals::cClass_Inventory_Reviews());

		$objItem->Store();
	}

	if (! $objFolder->Exists ("Dimensions", ldrGlobals::cClass_Inventory_Dimensions()))
	{
		$objItem = $objFolder->Create_Item
			("Dimensions", "Products sorted by Catagory", ldrGlobals::cClass_Inventory_Dimensions());

		$objItem->Store();
	}

	// ===================
	if (! $objFolder->Exists ("FAQs", ldrGlobals::cClass_Common_FAQs()))
	{
		$objItem = $objFolder->Create_Folder
			("FAQs", "Questions about the Product", ldrGlobals::cClass_Common_FAQs());

		$objItem->Store();
	}

	header ("Location:view.php?nID=" . $nID . "&");
}
?>

