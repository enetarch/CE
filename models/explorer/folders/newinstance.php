<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 0;
$nClassID =  (isset ($aryParams ["nClassID"]) ) ? $aryParams ["nClassID"] : 0;

if ($nID == 0) 
{
	$szError = "$nID == 0";
	return;
}

if ($nClassID == 0) 
{
	$szError = "$nClassID == 0";
	return;
}

$thsFolder = $gblLadder->getItem ($nID);
$nType = $gblLadder->getClass ("", $nClassID)->get_BaseType();

switch ($nType)
{
	case ENetArch_Ladder_Globals::cisRoot()  : 
	{ $objChild = $gblLadder->Create_Root ("New Root Folder", "New Root Folder", $nClassID); }  break;
	
	case ENetArch_Ladder_Globals::cisFolder()  : 
	{ $objChild = $thsFolder->Create_Folder ("New Folder", "New Folder", $nClassID); }  break;
	
	case ENetArch_Ladder_Globals::cisItem() : 
	{ $objChild = $thsFolder->Create_Item ("New Item", "New Item", $nClassID); }  break;
	
	case ENetArch_Ladder_Globals::cisReference() : 
	{ $objChild = $thsFolder->Create_Rreference ("New Reference", "New Reference", $nClassID); }  break;
}

$objChild->Store();

$rtn = $objChild->getState();

return ;

?>
