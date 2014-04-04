<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Credits
	//
	//	Credit
	//		Client
	//		Ordered
	//		Invoice
	//		RMA
	//		RMA_Recived
	//		Date_Recived
	//		Returns
	//		Amount
	//		Notes

	CreateClass ("Credits_Credit", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"Credits_Credit" Reference Class "Clients_Client"
		CreateClass ("Credits_Credit",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" dOrdered Date ";
		CreateClass ("Credits_Ordered", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Credits_Invoice" Reference Class "Invoices_Invoice"
		CreateClass ("Credits_Invoice",  ldrGlobals::cisReference(), 0 , true);

		//"Credits_RMA" Reference Class "RMAs_RMA"
		CreateClass ("Credits_RMA",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" bRecieved bool ";
		CreateClass ("Credits_RMA_Recived", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" dRecieved Date ";
		CreateClass ("Credits_Date_Recived", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Credits_Returns" Folder Class "Returns_Returned"
		$clsReturns_Returned = $gblLadder->getClass ("Returns_Returned")->ID();
		CreateClass ("Credits_Returns", ldrGlobals::cisFolder(), $clsReturns_Returned , true);

		$szStr =
			" nAmount real ";
		CreateClass ("Credits_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Credits_Notes" Item Class "Common_Note"
		$clsCommon_Note = $gblLadder->getClass ("Common_Note")->ID();
		CreateClass ("Credits_Notes", ldrGlobals::cisItem(), $clsCommon_Note , true);

return ;
}
?>
