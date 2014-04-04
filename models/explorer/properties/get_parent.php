<?
$rtn = Array ();
 
include_once ($dirModel . "/DayTimer/daytimer.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;

if ($nID == 0) return;

$thsItem = $gblLadder->getItem ($nID);


$rtn = Array 
(
	"nID" => $thsItem->ParentID (),
);

return ;

?>
