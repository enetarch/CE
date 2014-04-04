<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Orders
	//
	//	Order
	//		Client
	//		Ordered
	//		Line_Items
	//			Line_Item
	//		Amount
	//		Status
	//		Notes
	//		Invoice

	CreateClass ("Orders_Order", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"Orders_Client" Reference Class "Client_Client"
		CreateClass ("Orders_Client",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" dOrdered Date ";
		CreateClass ("Orders_Ordered", ldrGlobals::cisItem(), 0 , true, $szStr);

		CreateClass ("Orders_Line_Items", ldrGlobals::cisFolder(), 0 , true);
		//->
			CreateClass ("Orders_Line_Item", ldrGlobals::cisFolder(), 0 , true);

		$szStr =
			" nAmount real ";
		CreateClass ("Orders_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" szStatus varChar(20) ";
		CreateClass ("Orders_Status", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Orders_Notes" Item Class "Common_Notes"
		$clsCommon_Note = $gblLadder->getClass ("Common_Note")->ID();
		CreateClass ("Orders_Notes", ldrGlobals::cisItem(), $clsCommon_Note , true);

		//"Orders_Invoice" Reference Class "Invoices_Invoice"
		CreateClass ("Orders_Invoice",  ldrGlobals::cisReference(), 0 , true);


return ;
}
?>