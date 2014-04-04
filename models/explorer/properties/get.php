<?

$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 1;
if ($nID == 0) 
{
	$szError = "$nID == 0";
	return;
}

$thsItem = $gblLadder->getItem ($nID);
$thsClass = $gblLadder->getClass ("", $thsItem->ClassID() );

$rtn1 = $thsItem->getState ();

$rtn = Array
(
	"nID" => $rtn1[0],
	"szName" => $rtn1[1],
	"szDescription" => $rtn1[2],
	"nParent" => $rtn1[3],
	"nBaseType" => $rtn1[4],
	"nClass" => $rtn1[5],
	"nLeaf" => $rtn1[6],
	"dCreated" => $rtn1[7],
	"szClass" => $thsClass->Name(),
	"nSize" => 0,
	
);

?>
