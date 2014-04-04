<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Company
	//
	//	Company
	//		Ads
	//		Articles
	//		Contact_Us
	//		Feed_Back
	//		Policies
	//		Inventory
	//		FAQs

	CreateClass ("Company_Company", ldrGlobals::cisFolder(), 0 , true);
	//->
		CreateClass ("Company_Ads", ldrGlobals::cisFolder(), 0 , true);

		CreateClass ("Company_Articles", ldrGlobals::cisFolder(), 0 , true);

		//"Company_ContactUs" Folder Class "Common_Notes"
		$clsCommon_Notes = $gblLadder->getClass ("Common_Notes")->ID();
		CreateClass ("Company_ContactUs", ldrGlobals::cisFolder(), $clsCommon_Notes , true);

		//"Company_FeedBack" Folder Class "Common_Notes"
		//$clsCommon_Notes Already Created
		CreateClass ("Company_FeedBack", ldrGlobals::cisFolder(), $clsCommon_Notes , true);

		//"Company_Policies" Folder Class "Common_Notes"
		//$clsCommon_Notes Already Created
		CreateClass ("Company_Policies", ldrGlobals::cisFolder(), $clsCommon_Notes , true);

		CreateClass ("Company_Inventory", ldrGlobals::cisFolder(), 0 , true);

		//"Company_FAQs" Folder Class "Common_FAQs"
		$clsCommon_FAQs = $gblLadder->getClass ("Common_FAQs")->ID();
		CreateClass ("Company_FAQs", ldrGlobals::cisFolder(), $clsCommon_FAQs , true);

		CreateClass ("Company_Downloads", ldrGlobals::cisFolder(), 0 , true);

return ;
}
?>