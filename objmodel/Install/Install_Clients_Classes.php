<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Clients
	//
	//	Client
	//		iName
	//		Discount_Code
	//		Taxable
	//		Billing
	//			Address
	//			Department
	//			Position
	//			Contacts
	//				Contact
	//					Method
	//					Type
	//		Shipping
	//			Address
	//			Department
	//			Position
	//			Contacts
	//				Contact
	//					Method
	//					Type

	CreateClass ("Clients_Client", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"Clients_iName" Item Class "Common_iName"
		$clsCommon_iName = $gblLadder->getClass ("Common_iName")->ID();
		CreateClass ("Clients_iName", ldrGlobals::cisItem(), $clsCommon_iName , true);

		$szStr =
			" nDiscountCode int ";
		CreateClass ("Clients_Discount_Code", ldrGlobals::cisItem(), 0 , true, $szStr);

		$szStr =
			" bTaxable bool ";
		CreateClass ("Clients_Taxable", ldrGlobals::cisItem(), 0 , true, $szStr);

		CreateClass ("Clients_Billing", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"Clients_Address" Item Class "Common_Address"
			$clsCommon_Address = $gblLadder->getClass ("Common_Address")->ID();
			CreateClass ("Clients_Address", ldrGlobals::cisItem(), $clsCommon_Address , true);

			//"Clients_Department" Item Class "Common_Department"
			$clsCommon_iName = $gblLadder->getClass ("Common_iName")->ID();
			CreateClass ("Clients_iName", ldrGlobals::cisItem(), $clsCommon_iName , true);

			//"Clients_Position" Item Class "Common_Position"
			$clsCommon_Department = $gblLadder->getClass ("Common_Department")->ID();
			CreateClass ("Clients_Position", ldrGlobals::cisItem(), $clsCommon_Department , true);

			//"Clients_Contacts" Folder Class "Common_Contacts"
			$clsCommon_Contacts = $gblLadder->getClass ("Common_Contacts")->ID();
			CreateClass ("Clients_Contacts", ldrGlobals::cisFolder(), $clsCommon_Contacts , true);
			//->
				//"Clients_Contact" Folder Class "Common_Contact"
				$clsCommon_Contact = $gblLadder->getClass ("Common_Contact")->ID();
				CreateClass ("Clients_Contact", ldrGlobals::cisFolder(), $clsCommon_Contact , true);
				//->
					//"Clients_Method" Item Class "Common_Contact_Method"
					$clsCommon_Contact_Method = $gblLadder->getClass ("Common_Contact_Method")->ID();
					CreateClass ("Clients_Method", ldrGlobals::cisItem(), $clsCommon_Contact_Method , true);

					//"Clients_Type" Item Class "Common_Type"
					$clsCommon_Type = $gblLadder->getClass ("Common_Type")->ID();
					CreateClass ("Clients_Type", ldrGlobals::cisItem(), $clsCommon_Type , true);

		CreateClass ("Clients_Shipping", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"Clients_Address" Already Created

			//"Clients_Department" Already Created

			//"Clients_Position" Already Created

			//"Clients_Contacts" Already Created
			//->
				//"Clients_Contact" Already Created
				//->
					//"Clients_Method" Already Created

					//"Clients_Type" Already Created

return ;
}
?>