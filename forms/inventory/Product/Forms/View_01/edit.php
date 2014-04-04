<?
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
<title>View Inventory Product</title>
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
<form action="update_form.php" method="post">

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
<input type="hidden" name="nID" value="<?= $nID ?>">
|
<a href="Pictures.php?nID=<?= $nID ?>">Pictures</a> |
<a href="Pricing.php?nID=<?= $nID ?>">Pricing</a> |
<a href="RelatedTo.php?nID=<?= $nID ?>">RelatedTo</a> |
<a href="Reviews.php?nID=<?= $nID ?>">Reviews</a> |
<a href="FAQs.php?nID=<?= $nID ?>">FAQs</a> |
<a href="Keywords.php?nID=<?= $nID ?>">Keywords</a> |

<HR>

<table>
	<tr>
		<th align="right">Name:</th>
		<td><input type="text" name="txtName" size="40" value="<?= $objFolder->Name() ?>"></td>
	</tr>
	<tr>
		<th align="right">Description:</th>
		<td><input type="text" name="txtDescription" size="70" value="<?= $objFolder->Description() ?>"></td>
	</tr>
</table>

<hr>

<table border="0"  >
	<tr valign="top">
		<td align="center"><img src="<?= $szImagePath ?>"></td>
		<td>
			<table border=0>
				<tr>
					<th align="right">Item No:</th>
					<td><input name"" size="" value=""></td>
				</tr>
				<tr>
					<th align="right"><a hre="">Price</a>:</th>
					<td>-- List of prices -- </td>
				</tr>
				<tr><th align="right" colspan=2> --- Add To Cart --- </th></tr>
				<tr><th align="right" colspan=2> &nbsp; </th></tr>
				<tr><th align="right" colspan=2> --- Dimensions --- </th></tr>
				<tr>
					<th align="right">Width:</th>
					<td><input name"" size="" value="">inches</td>
				</tr>
				<tr>
					<th align="right">Height:</th>
					<td><input name"" size="" value=""> inches</td>
				</tr>
				<tr>
					<th align="right">Depth:</th>
					<td><input name"" size="" value=""> inches</td>
				</tr>
				<tr>
					<th align="right">Weight:</th>
					<td><input name"" size="" value=""> lbs</td>
				</tr>
				<tr>
					<th align="right">PackageType:</th>
					<td><?= "OptionList" ?></td>
				</tr>
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
		<th align="right">Description:</th>
		<td><textarea name="szDescription" rows="5" cols="50"><?= $objDescription->Field("szNote") ?></textarea></td>
	</tr>

	<tr>
		<th align="right">Features:</th>
		<td><textarea name="szDescription" rows="5" cols="50"><?= $objFeatures->Field("szNote") ?></textarea></td>
	</tr>

	<tr>
		<th align="right">Specifications:</th>
		<td><textarea name="szDescription" rows="5" cols="50"><?= $objSpecifications->Field("szNote") ?></textarea></td>
	</tr>
</table>


</form>
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
