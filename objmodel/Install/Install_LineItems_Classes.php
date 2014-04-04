<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// LineItem
	//
	// LineItems
	//		LineItem
	//			Quantity
	//			Inventory_Item
	//			Credits
	//				Credit
	//			Taxable
	//			Amount

	CreateClass ("LineItems_LineItems", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("LineItems_LineItem", ldrGlobals::cisFolder(), 0 , true);
	//->
		$szStr =
			" nQuantity int ";
		CreateClass ("LineItems_Quantity", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"LineItems_Inventory_Item" Reference Class "?"
		CreateClass ("LineItems_Inventory_Item", ldrGlobals::cisReference(), 0 , true);

		CreateClass ("LineItems_Credits", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"LineItems_Credits" Reference Class "Credits_Credit"
			CreateClass ("LineItems_Credits",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" bTaxable bool ";
		CreateClass ("LineItems_Taxable", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" nAmount real ";
		CreateClass ("LineItems_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

return ;
}
?>