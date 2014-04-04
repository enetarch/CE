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

	$objItem = $gblLadder->getItem ($nID);
	$nID = $objItem->ID();
?>

<?= $objItem->ID() ?> - <strong><?= $objItem->Name() ?></strong><BR>
<?= $objItem->Description() ?>
<hr>
	<a href="list.php?nID=<?= $nID ?>">Back</a> |
<hr>
<P>

Edit Content Here<P>

<form name="frmEdit" method = "Post" action="update.php">
<table>
	<tr>
		<th align="right">Name:</th>
		<td><input type="text" name="txtName" size="40" value="<?= $objItem->Name() ?>"></td>
	</tr>
	<tr>
		<th align="right">Description:</th>
		<td><input type="text" name="txtDescription" size="70" value="<?= $objItem->Description() ?>"></td>
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