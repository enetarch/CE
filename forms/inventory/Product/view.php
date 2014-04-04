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
	<a href="edit.php?nID=<?= $nID ?>&">Edit</a> |
	<a href="delete.php?nID=<?= $nID ?>&">Delete</a> |
	<a href="CreateFolders.php?nID=<?= $nID ?>&">CreateFolders</a> |
	<?= ListForms($nID, $nClassID) ?> |
<hr>

<table border=0  cellspacing=1 cellpadding=1 width=500>
	<tr bgcolor="dddddd">
		<th>ID</th>
		<th><IMG SRC="../../Images/empty.gif" border=0 ></th>
		<th>Name</th>
		<th>Description</th>
		<th>Class</th>
	</tr>

<?
	$nCount = $objFolder->Count();
	if ($nCount == 0) $bPic = "";

		$arySubFolders = $objFolder->SubFolders();
		$aryItems = $objFolder->Items();
		$aryRefs = $objFolder->References();

		If	(count ($arySubFolders) != 0)
			List_Items ($arySubFolders);

		if (count ($aryItems) != 0)
			List_Items ($aryItems);

		if (count ($aryRefs) != 0)
			List_Items ($aryRefs);
?>
</table>
</body>
</html>

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

Function List_Items ($aryFolders)
{
	Global $gblLadder;
	Global $cFolderOpenPic, $cFolderClosedPic, $cItemPic,
		$cReferencePic;

	For ($t=1; $t<Count ($aryFolders)+1; $t++)
	{
		$objItem = $gblLadder->getItem ($aryFolders[$t]);
		$nID = $objItem->ID();
		$szName = $objItem->Name();
		$szDescription = $objItem->Description();
		$nClass = $objItem->getClass();
		$cFolderPic = "";

		switch ($objItem->BaseType())
		{
			case ldrGlobals::cisRoot():
				$cFolderPic = $cFolderClosedPic;
				break;

			case ldrGlobals::cisFolder():
				$cFolderPic = $cFolderClosedPic;
				break;

			case ldrGlobals::cisItem():
				$cFolderPic = $cItemPic;
				break;

			case ldrGlobals::cisReference():
				$cFolderPic = $cReferencePic;
				break;
	}
?>
	<tr align="left">
		<td><?= LinkTopic ($nID, $nID) ?></td>
		<td><?= LinkPic ($nID, $cFolderPic)  ?></td>
		<td><?= LinkTopic ($nID, $szName) ?></td>
		<td><?= $szDescription ?></td>
		<td><?= $nClass ?></td>
	</tr>
<?
	}
}

// ============================================

Function LinkPic ($nID, $szImg)
{
   $szRtn =
	"<A " .
		"name=\"" . $nID . "\" " .
		"HREF=\"" .
		"javascript:Ladder_Selected " .
		"(" . $nID  . " )" .
		"\" >" .
		"<IMG SRC=\"" . $szImg . "\" border=0 >" .
	"</a>";

	return ($szRtn);
}

Function LinkTopic ($nID, $szTopic)
{
   $szRtn =
      "<A HREF=\"" .
         "javascript:Ladder_Selected " .
         "(" . $nID . " )" .
         "\" >" .
         $szTopic .
      "</a>";

   return ($szRtn);
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
