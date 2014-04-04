<?

$data = array
	(
		"command" => "isInstalled", 
		"verbose" => true, 
		"params" => Array 
		(
			"1" => "3",
			"2" => "4",
		)
	);
	                                                            
$data_string = "json=" . json_encode($data) . "&";

// print ($data_string . "<BR>");

$ch = curl_init("http://localhost:80/LadderSrvr/tree.php"); 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
$results = curl_exec($ch);

if( $errno = curl_errno($ch) )
{
	$info = curl_getinfo($ch);
	print ( "Took " . $info['total_time'] . " seconds to send a request to " . $info['url'] . "<BR>" );
	
	$error_message = curl_strerror($errno);
	print ( "cURL error ({$errno}):<br> {$error_message} <BR>" );
}

print ($results);
?>
