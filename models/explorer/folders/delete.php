<?
$rtn = Array ("status" => "you have been deleted, Q Evil Laugh =)");
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;

if ($nID == 0) 
{
	$szError = "$nID == 0";
	return;
}

$thsItem = $gblLadder->getItem ($nID);
$thsItem->Delete();


return ;

?>
