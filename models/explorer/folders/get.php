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

$nType = $thsItem->BaseType ();
switch ($nType)
{
	case 1 : $szIcon = "buttonbar_Folder"; break;
	case 2 : $szIcon = "buttonbar_Folder"; break;
	case 3 : $szIcon = "buttonbar_Item"; break;
	case 4 : $szIcon = "buttonbar_Reference"; break;
}

$rtn = Array 
(
	"nID" => $thsItem->ID(),
	"szName" => $thsItem->Name(),
	"szDescription" => $thsItem->Description(),
	"szDate" => $thsItem->Created(),
	"nType" => $thsItem->BaseType (),
	"szIcon" => $szIcon,
);

return ;

?>
