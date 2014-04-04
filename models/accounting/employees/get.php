<?

$aryParams = json_decode ($szParams, true);

switch ($aryParams["nID"] )
{
	case "123" :
	{
		$rtn = Array 
		(
			"nID" => 123,

			"szName" => "First of America",
			"szDescription" => "My first bank account",
			"szAccount" => "123-456-789",
			"szDate" => "1998-01-01",

			"szStreet1" => "PO Box 43766",
			"szStreet2" => "",
			"szCity" => "Detroit",
			"szState" => "MI",
			"szZip" => "48243",
			"szEmail" => "teller@firstofamerica.com",
			"szTelephone" => "313-555-0123",
			"szWebsite" => "www.firstofamerica.com",
		);
	} break;

	case "246" :
	{
		$rtn = Array 
		(
			"nID" => 246,

			"szName" => "National City Bank",
			"szDescription" => "My 2nd Bank",
			"szAccount" => "147-258-369",
			"szDate" => "2001-01-01",

			"szStreet1" => "PO Box 43766",
			"szStreet2" => "",
			"szCity" => "Detroit",
			"szState" => "MI",
			"szZip" => "48243",
			"szEmail" => "teller@firstofamerica.com",
			"szTelephone" => "313-555-0123",
			"szWebsite" => "www.firstofamerica.com",
		);
	} break;

	default:
	{
		$rtn = Array 
		(
			"nID" => 0,

			"szName" => "",
			"szDescription" => "",
			"szAccount" => "",
			"szDate" => "",

			"szStreet1" => "",
			"szStreet2" => "",
			"szCity" => "",
			"szState" => "",
			"szZip" => "",
			"szEmail" => "",
			"szTelephone" => "",
			"szWebsite" => "",
		);
	} break;
}
?>
