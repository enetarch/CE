<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Invoices
	//
	//	Invoice
	//		Client
	//		Header
	//		Shipping
	//			Shipped
	//			Shipper
	//			Tracking
	//		Items
	//			Lint_Item
	//		Amount
	//		Payments
	//			Payment
	//		Status
	//		Notes
	//		Order

	CreateClass ("Invoices_Invoice", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"Invoices_Client" Reference Class "Clients_Client"
		CreateClass ("Invoices_Client",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" dOrdered Date ";
		CreateClass ("Invoices_Header", ldrGlobals::cisItem(), 0 , true, $szStr);

		CreateClass ("Invoices_Shipping", ldrGlobals::cisFolder(), 0 , true);
		//->
			$szStr =
				" dShipped Date, " .
				" bShipped bool ";
			CreateClass ("Invoices_Shipped", ldrGlobals::cisItem(), 0 , true, $szStr);

			CreateClass ("Invoices_ShipperRef", ldrGlobals::cisReference(), 0 , true);

			$szStr =
				" szShipper_URL varChar(250) ";
			CreateClass ("Invoices_Tracking", ldrGlobals::cisItem(), 0 , true, $szStr);

		CreateClass ("Invoices_Items", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"Invoices_Line_Item" Folder Class "LineItem_LineItem"
			$clsLineItems_LineItem = $gblLadder->getClass ("LineItems_LineItem")->ID();
			CreateClass ("Invoices_Line_Item", ldrGlobals::cisFolder(), $clsLineItems_LineItem , true);

		$szStr =
			" nAmount real ";
		CreateClass ("Invoices_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

		CreateClass ("Invoices_Payments", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"Invoices_Payment" Reference Class "Payment_Payments"
			CreateClass ("Invoices_Payment",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" szStatus varChar(20) ";
		CreateClass ("Invoices_Status", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Invoices_Notes" Item Class "Common_Notes"
		$clsCommon_Note = $gblLadder->getClass ("Common_Note")->ID();
		CreateClass ("Invoices_Notes", ldrGlobals::cisItem(), $clsCommon_Note , true);

		//"Invoices_Order" Reference Class "Orders_Order"
		CreateClass ("Invoices_Order",  ldrGlobals::cisReference(), 0 , true);

return ;
}