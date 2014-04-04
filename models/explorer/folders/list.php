<?
$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$nID =  (isset ($aryParams ["nID"]) ) ? $aryParams ["nID"] : 1;
if ($nID != 0)
{
	$thsFolder = $gblLadder->getItem ($nID);
	$objAll = $thsFolder->getChildren ();
}
else
{
	$objAll = $gblLadder->getRoots ();
}

for ($t=1; $t<$objAll->count()+1; $t++)
{
	$objChild = $objAll->getItem ($t);
	
	$nType = $objChild->BaseType ();
	switch ($nType)
	{
		case 1 : $szIcon = "buttonbar_Folder"; break;
		case 2 : $szIcon = "buttonbar_Folder"; break;
		case 3 : $szIcon = "buttonbar_Item"; break;
		case 4 : $szIcon = "buttonbar_Reference"; break;
	}
	
	
	$rtn [] = Array 
	( 
		"nID" => $objChild->ID (),
		"szName" => $objChild->Name (),
		"szDescription" => $objChild->Description (),
		"szDate" => $objChild->Created(),
		"nType" => $objChild->BaseType (),
		"nParent" => $objChild->ParentID (),
		"szIcon" => $szIcon,
	);
}

return ;

?>
