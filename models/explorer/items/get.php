<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
if ($nID == 0) 
{
	$szError = "$nID == 0";
	return;
}

$thsItem = $gblLadder->getItem ($nID);
$rtn1 = $thsItem->getState ();
$rtn2 = $thsItem->getData ();

$rtn11 = Array ();
$rtn21 = Array ();

foreach ($rtn2 as $key => $value)
	if ($key != "ID")
		$rtn21[] = Array ("szField" => $key, "szValue" => $value);

$rtn = array_merge ($rtn11, $rtn21);

return ;

?>
