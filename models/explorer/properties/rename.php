<?

$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
if ($nID == 0) 
{
	$szError = "nID = 0";
	return ;
}

$thsItem = $gblLadder->getItem ($nID);

$thsItem->setName ($aryParams ["szName"]);
$thsItem->setDescription ($aryParams ["szDescription"]);

$thsItem->Store ();

$rtn = Array 
(
	"success" => "I don't know",
	"szName" => $aryParams ["szName"], 
	"szDescription" => $aryParams ["szDescription"],
	
);
?>
