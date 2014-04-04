<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
$toID =  (isset ($aryParams ["toID"]) ) ? $aryParams ["toID"] : 0;

if ($nID == 0) 
{
	$szError = "nID = 0";
	return ;
}

if ($toID == 0) 
{
	$szError = "toID = 0";
	return ;
}

$thsItem = $gblLadder->getItem ($nID);
$thsFolder = $gblLadder->getItem ($toID);

$thsItem->duplicate ($thsFolder);

$rtn = Array 
(
	"success" => "I don't know",
	"nID" => $nID, 
	"toID" => $toID,
);
?>
