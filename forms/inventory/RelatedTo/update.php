<?
	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_POST ['nID']))
		$nID = $_POST ["nID"];

	if (isset ($_POST ['txtName']))
		$txtName = $_POST ["txtName"];

	if (isset ($_POST ['txtDescription']))
		$txtDescription = $_POST ["txtDescription"];

	$objItem = $gblLadder->getItem ($nID);

	$objItem->setName ($txtName);
	$objItem->setDescription ($txtDescription);

	$objItem->Store();

	header ("Location:view.php?nID=" . $nID . "&");
}
?>

