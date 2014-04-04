<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// Inventory
	//
	//	Inventory
	//		Category
	//			Items
	//				Item_No
	//				Keywords
	//					Keyword
	//				Dimensions
	//					Height
	//					Width
	//					Depth
	//					Weight
	//				Package_Type
	//				Specifications
	//				Features
	//				Description
	//				Related_Items
	//					Related_Item
	//				Taxable
	//				Pricing
	//					Price
	//				Imprint
	//					Height
	//					Weight
	//					Method
	//				Colors
	//					Color
	//				Plate
	//					Charge
	//					Code
	//				Special_Instructions
	//				Extras
	//					Color_Price
	//					Color_Code
	//					Location_Color
	//					Location_Price
	//				Production_Time
	//		Colors
	//			Color
	//		Package_Types
	//			Package_Type

	CreateClass ("Inventory_Inventory", ldrGlobals::cisFolder(), 0 , true);
	//->
		CreateClass ("Inventory_Items ", ldrGlobals::cisFolder(), 0 , true);

		CreateClass ("Inventory_Categories ", ldrGlobals::cisFolder(), 0 , true);

		CreateClass ("Inventory_Category ", ldrGlobals::cisFolder(), 0 , true);
		//->
			CreateClass ("Inventory_Item", ldrGlobals::cisFolder(), 0 , true);
			//->
				$szStr =
					" szItemNo varChar(20) ";
				CreateClass ("Inventory_Item_No", ldrGlobals::cisItem(), 0 , true, $szStr);

				CreateClass ("Inventory_Keywords", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" szKeyWords varChar(20) ";
					CreateClass ("Inventory_Keyword", ldrGlobals::cisItem(), 0 , true, $szStr);

				CreateClass ("Inventory_Dimensions", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" nHeight real ";
					CreateClass ("Inventory_Height", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" nWidth real ";
					CreateClass ("Inventory_Width", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" nDepth real ";
					CreateClass ("Inventory_Depth", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" nWeight real ";
					CreateClass ("Inventory_Weight", ldrGlobals::cisItem(), 0 , true, $szStr);

				$szStr =
					" szType varChar(20) ";
				CreateClass ("Inventory_PackageType", ldrGlobals::cisItem(), 0 , true, $szStr);

				//"Inventory_Specifications" Item Class "Common_Note"
				$clsCommon_Note = $gblLadder->getClass ("Common_Note")->ID();
				CreateClass ("Inventory_Specifications", ldrGlobals::cisItem(), $clsCommon_Note , true);

				//"Inventory_Features" Item Class "Common_Note"
				//$clsCommon_Note Already Created
				CreateClass ("Inventory_Features", ldrGlobals::cisItem(), $clsCommon_Note , true);

				//"Inventory_Description" Item Class "Common_Note"
				//$clsCommon_Note Already Created
				CreateClass ("Inventory_Description", ldrGlobals::cisItem(), $clsCommon_Note , true);

				CreateClass ("Inventory_RelatedItems", ldrGlobals::cisFolder(), 0 , true);

					//"Inventory_Related_Item" Reference Class "Inventory_Item"
					CreateClass ("Inventory_RelatedItem",  ldrGlobals::cisReference(), 0 , true);

				CreateClass ("Inventory_Reviews", ldrGlobals::cisFolder(), 0 , true);
					CreateClass ("Inventory_Review",  ldrGlobals::cisItem(), 0 , true);

				CreateClass ("Inventory_Returns",  ldrGlobals::cisItem(), $clsCommon_Note , true);


				$clsCommon_Images = $gblLadder->getClass ("Common_Images")->ID();
				CreateClass ("Inventory_Drivers", ldrGlobals::cisFolder(), $clsCommon_Images , true);
					$clsCommon_Image = $gblLadder->getClass ("Common_Image")->ID();
					CreateClass ("Inventory_Driver",  ldrGlobals::cisItem(), $clsCommon_Image , true);


				$szStr =
					" bTaxable bool ";
				CreateClass ("Inventory_Taxable", ldrGlobals::cisItem(), 0 , true, $szStr);

				$clsCommon_Images = $gblLadder->getClass ("Common_Images")->ID();
				CreateClass ("Inventory_Images", ldrGlobals::cisFolder(), $clsCommon_Images , true);

				$clsCommon_Image = $gblLadder->getClass ("Common_Image")->ID();
				CreateClass ("Inventory_Image", ldrGlobals::cisFolder(), $clsCommon_Image , true);

				CreateClass ("Inventory_Pricing", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" nPrice int, " .
						" nQuantity int, " .
						" nDiscountCode int ";
					CreateClass ("Inventory_Price", ldrGlobals::cisItem(), 0 , true, $szStr);

				CreateClass ("Inventory_Imprint", ldrGlobals::cisFolder(), 0 , true);
				//->
					//"Inventory_Height" Already Created

					//"Inventory_Width" Already Created

					$szStr =
						" szMethod varChar(20) ";
					CreateClass ("Inventory_Method", ldrGlobals::cisItem(), 0 , true, $szStr);

				CreateClass ("Inventory_Colors", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" szColor varChar(20) ";
					CreateClass ("Inventory_Color", ldrGlobals::cisItem(), 0 , true, $szStr);

				CreateClass ("Inventory_Plate", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" szCharge real ";
					CreateClass ("Inventory_Charge", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" szCode varChar(20) ";
					CreateClass ("Inventory_Code", ldrGlobals::cisItem(), 0 , true, $szStr);

				//"Inventory_Special_Instructions" Item Class "Common_Note"
				//$clsCommon_Note Already Created
				CreateClass ("Inventory_Special_Instructions", ldrGlobals::cisItem(), $clsCommon_Note , true);


				CreateClass ("Inventory_Extras", ldrGlobals::cisFolder(), 0 , true);
				//->
					$szStr =
						" nPrice real ";
					CreateClass ("Inventory_Color_Price", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" szColor varChar(1) ";
					CreateClass ("Inventory_Color_Code", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" nPrice real ";
					CreateClass ("Inventory_Location_Price", ldrGlobals::cisItem(), 0 , true, $szStr);

					$szStr =
						" szLocation varChar(1) ";
					CreateClass ("Inventory_Location_Code", ldrGlobals::cisItem(), 0 , true, $szStr);

				$szStr =
					" nDays int ";
				CreateClass ("Inventory_Production_Time", ldrGlobals::cisItem(), 0 , true, $szStr);

		//"Inventory_Colors" Already Created
		//->
			//"Inventory_Color" Already Created

		CreateClass ("Inventory_PackageTypes", ldrGlobals::cisFolder(), 0 , true);
		//->
			//"Inventory_Package_Type" Already Created

return ;
}
?>


