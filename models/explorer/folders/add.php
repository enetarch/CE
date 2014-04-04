<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
$szName = (isset ($aryParams ["szName"]) ) ? $aryParams ["szName"] : 0;
$szDescription = (isset ($aryParams ["szDescription"]) ) ? $aryParams ["szDescription"] : 0;
$nType = (isset ($aryParams ["nType"]) ) ? $aryParams ["nType"] : 0;
$nClass = (isset ($aryParams ["nClass"]) ) ? $aryParams ["nClass"] : 0;

if ($nID == 0)
{
	$szError = "$nID == 0";
	return;
}


$thsItem = $gblLadder->getItem ($nID);

switch ($nType)
{
	case ENetArch_Ladder_Globals::cisFolder() :
	{ $thsItem->Create_Folder ($szName, $szDescription, $nClass); } break;
	
	case ENetArch_Ladder_Globals::cisItem() :
	{ $thsItem->Create_Item ($szName, $szDescription, $nClass); } break;
	
	case ENetArch_Ladder_Globals::cisReference() :
	{ $thsItem->Create_Reference ($szName, $szDescription, $nClass); } break;
}

return ;

?>
