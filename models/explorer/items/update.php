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

foreach ($aryParams["fields"] as $key => $field)
	{
		$name = $field["szField"];
		$value = $field["szValue"];
		$thsItem->setField ($name, $value);
		// print ($name . " => " . $value . "<BR>");
	}

$thsItem->Store ();

$rtn = "saved";

return ;

?>
