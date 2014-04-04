<?

$rtn = Array ();
 
include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$objClasses = $gblLadder->getClasses();

for ($t=1; $t<$objClasses->count()+1; $t++)
{
	$objChild = $objClasses->Item ($t);
	
	$rtn [] = Array 
	( 
		"nID" => $objChild->ID (),
		"szName" => $objChild->Name (),
		"szDescription" => $objChild->Description (),
		"szDate" => $objChild->Created(),
		"nType" => $objChild->BaseType (),
		"nParent" => $objChild->ParentID (),
		"szIcon" => "buttonbar_Folder",
	);
}

?>
