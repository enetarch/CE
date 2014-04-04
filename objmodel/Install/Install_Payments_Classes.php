<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Payments
	//
	//	Payment
	//		Amount
	//		Method
	//		Tracking

	CreateClass ("Payments_Payment", ldrGlobals::cisFolder(), 0 , true);
	//->
		$szStr =
			" nAmount real ";
		CreateClass ("Payments_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" szMethod varChar(20) ";
		CreateClass ("Payments_Method", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" szTracking varChar(20) ";
		CreateClass ("Payments_Tracking", ldrGlobals::cisItem(), 0 , true, $szStr);

return ;
}
?>