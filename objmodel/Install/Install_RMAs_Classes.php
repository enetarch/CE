<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// RMAs
	//
	//	RMA
	//		Invoice
	//		Credit
	//		Returns
	//		Amount
	//		Date Credited
	//		Replacement
	//		Date Replaced

	CreateClass ("RMAs_RMA", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"RMAs_Invoice" Reference Class "Invoice_Invoice"
		CreateClass ("RMAs_Invoice",  ldrGlobals::cisReference(), 0 , true);

		//"RMAs_Credit" Reference Class "Credits_Credit"
		CreateClass ("RMAs_Credit",  ldrGlobals::cisReference(), 0 , true);

		//"RMAs_Returns" Folder Class "LineItems_LineItems"
		$clsLineItems = $gblLadder->getClass ("LineItems_LineItems")->ID();
		CreateClass ("RMAs_Returns", ldrGlobals::cisFolder(), $clsLineItems , true, "");

		$szStr =
			" nAmount real ";
		CreateClass ("RMAs_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" dDate Date ";
		CreateClass ("RMAs_Date_Credited", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"RMAs_Replacement" Reference Class "Invoice_Invoice"
		CreateClass ("RMAs_Replacement",  ldrGlobals::cisReference(), 0 , true);

		$szStr =
			" dDate Date ";
		CreateClass ("RMAs_Date_Replaced", ldrGlobals::cisItem(), 0 , true, $szStr);

return ;
}
?>