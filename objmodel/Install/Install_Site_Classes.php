<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Site
	//
	//	Site
	//		Apps
	//			Apps
	//			App
	//		Help
	//		Policies
	//			Policies
	//			Policy

	CreateClass ("Site_Site", ldrGlobals::cisFolder(), 0 , true);
		CreateVerb ("Site_Site", "PHP", "View",  "Site/Site/View.php");
		CreateVerb ("Site_Site", "PHP", "New",  "Site/Site/New.php");
		CreateForm ("Site_Site", "View",  "Site/Site/View.php");
	//->
		CreateClass ("Site_Apps", ldrGlobals::cisItem(), 0 , False, $szStr);
		//->
			$szStr =
				" szApp varchar(250) " ;
			CreateClass ("Site_App", ldrGlobals::cisFolder(), 0 , true);

		CreateClass ("Site_Help", ldrGlobals::cisFolder(), 0 , true);

		CreateClass ("Site_Policies", ldrGlobals::cisFolder(), 0 , true);
		//->
			$szStr =
				" szPolicy varchar(250) " ;
			CreateClass ("Site_Policy", ldrGlobals::cisItem(), 0 , false, $szStr);

return ;
}
?>