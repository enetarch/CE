<?

	function dirPath() { return ("../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	global $gblLadder;

	$gblLadder->Install();

}

?>
Ladder is Installed!
