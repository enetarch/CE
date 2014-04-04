<?
	$cFolderOpenPic = "../../Images/folder_open.gif";
	$cFolderClosedPic = "../../Images/folder_closed.gif";
	$cItemPic = "../../Images/file.gif";
	$cReferencePic = "../../Images/reference.gif";

	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;
	$bStatus = "";
	$aryTargetIDs = Array();

	if (isset ($_GET ['nID']))
		$nID = $_GET ["nID"];

	$objFolder = $gblLadder->getItem ($nID);
	$nID = $objFolder->ID();

?>

<html>
<head>
<title>Ladder View</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../../Shared/styles.css">
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

// -->
</script>

<body>
<?
	if ($nID <> 0)
		List_Contents ($nID);
}

// ============================================

Function List_Contents ($nID)
{
	Global $gblLadder;
	Global $cFolderOpenPic, $cFolderClosedPic, $cItemPic,
		$cReferencePic;

	$objFolder = $gblLadder->getItem ($nID);
	$nID = $objFolder->ID();
	if ($objFolder->isItem())
		header ("Location:view.php?nID=" . $nID . "&");

	$nParent = $objFolder->Parent();
?>

<?= $objFolder->ID() ?> - <strong><?= $objFolder->Name() ?></strong><BR>
<?= $objFolder->Description() ?>
<hr>
<?	if ($nParent != 0) { ?>
	<a href="view.php?nID=<?= $nParent ?>&" target="frmContent">Parent</a> |
<? } ?>
	New - <?= List_Classes ($nID) ?>
	 |
	<a href="edit.php?nID=<?= $nID ?>&" target="frmContent">Edit</a> |
	<a href="delete.php?nID=<?= $nID ?>&" target="frmContent">Delete</a> |
	<a href="CreateFolders.php?nID=<?= $nID ?>&" target="frmContent">CreateFolders</a> |
	<a href="view_form.php?nID=<?= $nID ?>&" target="frmView_Form">Switch</a> |
<hr>

<?
}

// ====================================================

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

?>
