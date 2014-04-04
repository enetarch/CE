<?
	$cFolderOpenPic = "../../../../Images/folder_open.gif";
	$cFolderClosedPic = "../../../../Images/folder_closed.gif";
	$cItemPic = "../../../../Images/file.gif";
	$cReferencePic = "../../../../Images/reference.gif";

	Include_Once ("../../../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;
	$bStatus = "";
	$aryTargetIDs = Array();

	if (isset ($_GET ['nID']))
		$nID = $_GET ["nID"];

	$objFolder = $gblLadder->getItem ($nID);

?>

<html>
<head>
<title>Ladder View</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../../../../Shared/styles.css">
</head>

<script>
<!--
	function Ladder_Show (nID)
	{
		this.location =
			'../../view.php?' +
			'nID=' + nID + '&' ;
	}

	function Ladder_Selected (nID)
	 {
	 	top.frmExplorer.Ladder_Selected (nID);
	 }

	function Ladder_Delete (nID)
	{
		window.alert ("Are You Sure?");
	}

	function New_Class (ths)
	{
		var selectClass = ths;
		var nSelected = selectClass.selectedIndex;

		if (selectClass.options[nSelected].value != '')
		{
			nID = selectClass.options [nSelected].value;
			top.frmExplorer.New_Instance (nID);
		}
	}

	function View_Form (ths)
	{
		var selectClass = ths;
		var nSelected = selectClass.selectedIndex;

		if (selectClass.options[nSelected].value != '')
		{
			szURL = selectClass.options [nSelected].value;
			top.frmExplorer.View_Form (szURL);
		}
	}

// -->
</script>

<body>
<?
	if ($nID <> 0)
		List_Contents ($nID);
?>
<body>

<?
	if ($nID <> 0)
	{
		$objDescription = $objFolder->getItem
			("Description", ldrGlobals::cClass_Inventory_Description());

		$objFeatures = $objFolder->getItem
			("Features", ldrGlobals::cClass_Inventory_Features());

		$objSpecifications = $objFolder->getItem
			("Specifications", ldrGlobals::cClass_Inventory_Specifications());

		$objRelatedTo = $objFolder->getFolder
			("RelatedTo", ldrGlobals::cClass_Inventory_RelatedTo());

		// ==================

		$objItemNo = $objFolder->getItem
			("ItemNo", ldrGlobals::cClass_Inventory_ItemNo());

		$objImages = $objFolder->getFolder
			("Images", ldrGlobals::cClass_Inventory_Images());

		$objKeywords = $objFolder->getFolder
			("Keywords", ldrGlobals::cClass_Inventory_Keywords());

		$objPricing = $objFolder->getFolder
			("Pricing", ldrGlobals::cClass_Inventory_Pricing());

		$objTaxable = $objFolder->getItem
			("Taxable", ldrGlobals::cClass_Inventory_Taxable());

		$objPackageType = $objFolder->getItem
			("PackageType", ldrGlobals::cClass_Inventory_PackageType());

		$objReviews = $objFolder->getFolder
			("Reviews", ldrGlobals::cClass_Inventory_Reviews());

		$objDimensions = $objFolder->getItem
			("Dimensions", ldrGlobals::cClass_Inventory_Dimensions());

		$objFAQs = $objFolder->getFolder
			("FAQs", ldrGlobals::cClass_Common_FAQs());

		$szImagePath = "../../../../../Images/Inventory_NoPic.jpg";
		$szImageThumb = "../../../../../Images/Inventory_NoPic_Thumb.jpg";
?>

<table border="0"  >
	<tr valign="top">
		<td align="center"><img src="<?= $szImagePath ?>"></td>
		<td>
			<table border=0>
				<tr><th align="right">Item No:</th><td>123456</td></tr>
				<tr><th align="right">Price:</th><td>--- List of Prices ---</td></tr>
				<tr><th align="right" colspan=2> --- Add To Cart --- </th></tr>
				<tr><th align="right" colspan=2> &nbsp; </th></tr>
				<tr><th align="right" colspan=2> --- Dimensions --- </th></tr>
				<tr><th align="right">Width:</th><td>0.00 inches</td></tr>
				<tr><th align="right">Height:</th><td>0.00 inches</td></tr>
				<tr><th align="right">Depth:</th><td>0.00 inches</td></tr>
				<tr><th align="right">Weight:</th><td>0.00 lbs</td></tr>
				<tr><th align="right">PackageType:</th><td>Box</td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td >
		<table border=0>
			<tr>
				<td><img src="<?= $szImageThumb ?>"></td>
				<td><img src="<?= $szImageThumb ?>"></td>
				<td><img src="<?= $szImageThumb ?>"></td>
				<td><img src="<?= $szImageThumb ?>"></td>
				<td><img src="<?= $szImageThumb ?>"></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

<table border="0">
	<tr>
		<th align="right">Description:</th><td><?= $objDescription->Field("szNote") ?></td>
	</tr>

	<tr>
		<th align="right">Features:</th><td><?= $objFeatures->Field("szNote") ?></td>
	</tr>

	<tr>
		<th align="right">Specifications:</th><td><?= $objSpecifications->Field("szNote") ?></td>
	</tr>
	<tr>
		<th align="right">RelatedTo:</th><td><?= $objRelatedTo->ID() ?></td>
	</tr>
	<tr>
		<th align="right">Reviews:</th><td><?= $objReviews->ID() ?></td>
	</tr>
	<tr>
		<th align="right">FAQs:</th><td><?= $objFAQs->ID() ?></td>
	</tr>
	<tr>
		<th align="right">Keywords:</th><td><?= $objKeywords->ID() ?></td>
	</tr>
</table>

<?
	}
?>

<body>
<html>

<?
}

// ============================================

Function List_Contents ($nID)
{
	Global $gblLadder;
	Global $cFolderOpenPic, $cFolderClosedPic, $cItemPic,
		$cReferencePic;

	$objFolder = $gblLadder->getItem ($nID);
	$nClassID = $objFolder->getClass();

	if ($objFolder->isItem())
		header ("Location:view.php?nID=" . $nID . "&");

	$nParent = $objFolder->Parent();
?>

<?= $objFolder->ID() ?> - <strong><?= $objFolder->Name() ?></strong><BR>
<?= $objFolder->Description() ?>
<hr>
<?	if ($nParent != 0) { ?>
	<a href="view.php?nID=<?= $nParent ?>&">Parent</a> |
<? } ?>
	New - <?= List_Classes ($nID) ?>
	 |
	<a href="Edit.php?nID=<?= $nID ?>&">Edit</a> |
	<a href="Delete.php?nID=<?= $nID ?>&">Delete</a> |
	 <?= ListForms($nID, $nClassID) ?> |
<hr>

<?
}

Function List_Classes($nID)
{
	Global $gblLadder;

	$aryRoots = $gblLadder->getRoots ("Root Classes", ldrGlobals::cClass_RootClasses());
	$objClasses = $gblLadder->getItem ($aryRoots[1]);

	$aryClasses = $objClasses->SubFolders();

	printf ('<select name="selectClass" onChange="New_Class(this)" >');
		printf ('<option value="%s">%s</option>', "", "--- Select Class ---");

	For ($t=1; $t<Count ($aryClasses)+1; $t++)
	{
		$objClass = $gblLadder->getItem ($aryClasses[$t]);
		$objDef = $objClass->getItem ("", ldrGlobals::cClass_Ladder_Defination());
		$szClass = $objClass->Name();
		$nClass = $objDef->Field ("nClassID");
		$nBaseType = $objDef->Field ("nBaseType");

		$szURL =
		"nID=" . $nID . "&" .
		"nClass=" . $nClass . "&" .
		"nBaseType=" . $nBaseType . "&" ;
		printf ('<option value="%s">%s</option>', $szURL, $szClass);
	}
	printf ('</select>');
}

// ============================================

Function ListForms ($nID, $nClassID)
{
	Global $gblLadder;

	$objClass = FindClass ($nClassID);

	if ($objClass->Exists ("Forms", ldrGlobals::cClass_Forms_Forms()))
	{
		$objForms = $objClass->getFolder
			("Forms", ldrGlobals::cClass_Forms_Forms());
	}
	else
	{ return; }

	$aryForms = $objForms->Items();

	printf ('<select name="selectClass" onChange="View_Form(this)" >');
		printf ('<option value="%s">%s</option>', "", "--- Select View ---");

	For ($t=1; $t<Count ($aryForms)+1; $t++)
	{
		$objForm = $gblLadder->getItem ($aryForms[$t]);
		$szName = $objForm->Name ();
		$szURL = $objForm->Field ("szURL");

		$szURL .=
		"?nID=" . $nID . "&" ;
		printf ('<option value="%s">%s</option>', $szURL, $szName);
	}
	printf ('</select>');
}

Function FindClass ($nClassID)
{
	Global $gblLadder;

	$aryRoots = $gblLadder->getRoots();
	$objClasses = $gblLadder->getItem ($aryRoots [2]);

	$aryClasses = $objClasses->SubFolders();

	for ($t=1; $t<Count ($aryClasses)+1; $t++)
	{
		$objClass = $gblLadder->getItem ($aryClasses[$t]);
		$objDef = $objClass->getItem ("", ldrGlobals::cClass_Ladder_Defination());

		if ($objDef->Field ("nClassID") == $nClassID)
		{ return $objClass; }
	}
}

?>
