<?

include_once ("Common_Error.php");

class rpc
{
	// private $szURL = "localhost:8080";
	private $szURL = "127.0.0.1:8080";
	private $objError = null;

	public function __construct ($szURL)
	{
		$this->szURL = $szURL;
	}
		
	public function __destruct () 
	{
		$this->szURL = "";
	}

	public function exec ($data)
	{
		if ($this->szURL == "") 
			return (-1);
			
		$data_string = "json=" . json_encode($data) . "&";

		$ch = curl_init("http://" . $this->szURL . "/LadderSrvr/tree.php");
		
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		 
		$results = curl_exec($ch);

		if( $errno = curl_errno($ch) )
		{
			$info = curl_getinfo($ch);
			print ( "Took " . $info['total_time'] . " seconds to send a request to " . $info['url'] . "<BR>" );
			
			$error_message = curl_error($ch);
			print ( "cURL error ({$errno}):<br> {$error_message} <BR>" );
		}
		
		curl_close ($ch);
		
//		print ("<P> ==================================== </P>");
//		print ("<P> rpc " . $data_string. " <BR> rpc results = " . $results . "</P>");
//		print ("<P> ==================================== </P>");
		
		$json = json_decode ($results, true);

		$this->objError = new Error ( $json ["error"] );
		
		return ( $json ["return"] );
	}
	
	public function getError ()
	{ return ($this->objError); }

}

?>
