<?
	Include_Once ("../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_GET ['nID']))
		$nID = $_GET ["nID"];
?>

<html>
<head>
<title>Ladder View</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../Shared/styles.css">
</head>

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
?>

<?= $objFolder->ID() ?> - <strong><?= $objFolder->Name() ?></strong><BR>
<?= $objFolder->Description() ?>
<hr>
	<a href="list.php?nID=<?= $nID ?>">Back</a> |
<hr>
<P>

Add New Folder Here<P>

<form name="frmEdit" method = "Post" action="add.php">
<table>
	<tr>
		<th align="right">Name:</th>
		<td><input type="text" name="txtName" size="40" value=""></td>
	</tr>
	<tr>
		<th align="right">Description:</th>
		<td><input type="text" name="txtDescription" size="70" value=""></td>
	</tr>
</table>


<BR>
<input type="submit" name="submit" value="Submit">
<input type="hidden" name="nID" value="<?= $nID ?>">
</form>

</body>
</html>

<?
}
?>