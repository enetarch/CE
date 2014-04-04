<?
	Include_Once ("../../../Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$nID = 0;

	if (isset ($_GET ['nID']))
		$nID = $_GET ["nID"];

	$objItem = $gblLadder->getItem ($nID);

	$nParent = $objItem->Parent();

	$objItem->Delete();

	header ("Location:view.php?nID=" . $nParent . "&");
}
?>

