<?

$dirRoot = $_SERVER ["DOCUMENT_ROOT"] ;
$dirShared = $dirRoot . "/CE/shared";
$dirModel = $dirRoot . "/CE/objmodel";

include_once ($dirModel . "/Ladder/Ladder_Ladder.php");

$gblLadder = new ENetArch_Ladder ();

$szURL = getLadder_Server_IP ();

$gblLadder->connect ($szURL, "szSerNo", "szUID", "szPSW");

function getLadder_Server_IP ()
{
	$szURL = "127.0.0.1"; // LocalHost
	
	if ( isset ($_SERVER ["PHP_ENV"]) )
	switch ($_SERVER ["PHP_ENV"])
	{
		case "DEV" : $szURL = "192.168.0.35"; break;
		case "DEV_TABLET" : $szURL .= ":8080"; break;
		
		case "QA" : $szURL = "192.168.0.36"; break;
		case "QA_TABLET" : $szURL .= ":8080"; break;
		
		case "PROD" : $szURL = "192.168.0.37"; break;
		case "PROD_TABLET" : $szURL .= ":8080"; break;
	}
	
	return ($szURL);
}
?>
