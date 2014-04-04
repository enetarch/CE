<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Shippers
	//
	//	Shipper
	//		Methods
	//			Method
	//				Distance
	//				Weight
	//				Cost
	//		Contacts

	CreateClass ("Shippers_Shippers", ldrGlobals::cisFolder(), 0 , true);

	CreateClass ("Shippers_Shipper", ldrGlobals::cisFolder(), 0 , true);
	//->
		CreateClass ("Shippers_Methods", ldrGlobals::cisFolder(), 0 , true);
		//->
			CreateClass ("Shippers_Method", ldrGlobals::cisFolder(), 0 , true);
			//->
				$szStr =
					" nDistance int ";
				CreateClass ("Shippers_Distance", ldrGlobals::cisItem(), 0 , true, $szStr);

				$szStr =
					" nWeight int ";
				CreateClass ("Shippers_Weight", ldrGlobals::cisItem(), 0 , true, $szStr);

				$szStr =
					" nCost real ";
				CreateClass ("Shippers_Cost", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Shippers_Contacts" Folder Class "Common_Contacts"
		$clsCommon_Contacts = $gblLadder->getClass ("Common_Contacts")->ID();
		CreateClass ("Shippers_Contacts", ldrGlobals::cisFolder(), $clsCommon_Contacts , true);


return ;
}
?>