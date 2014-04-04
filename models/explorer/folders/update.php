<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
$szName = (isset ($aryParams ["szName"]) ) ? $aryParams ["szName"] : 0;
$szDescription = (isset ($aryParams ["szDescription"]) ) ? $aryParams ["szDescription"] : 0;

if ($nID == 0) 
{
	$szError = "$nID == 0";
	return;
}

$thsItem = $gblLadder->getItem ($nID);

$thsItem->setName ($szName);
$thsItem->setDescription ($szDescription);

return ;

?>
