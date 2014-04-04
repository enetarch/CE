<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Articles
	//
	//	Article
	//		Blurb
	//		Content
	//		Author
	//		Published

	CreateClass ("Articles_Artical", ldrGlobals::cisFolder(), 0 , true);
	//->
		//"Artcles_Blurb" Item Class "Common_Note"
		$clsCommon_Note = $gblLadder->getClass ("Common_Note")->ID();
		CreateClass ("Articles_Blurb", ldrGlobals::cisItem(), $clsCommon_Note , true);

		//"Articles_Content" Item Class "Common_Note"
		//$clsCommon_Note Already Created
		CreateClass ("Articles_Content", ldrGlobals::cisItem(), $clsCommon_Note , true);

		$szStr =
			" szAurthor varChar(250)";
		CreateClass ("Articles_Arthor", ldrGlobals::cisItem(), 0 , true);

		$szStr =
			" dPublished DateTime";
		CreateClass ("Articles_Published", ldrGlobals::cisItem(), 0 , true);


return ;
}
?>