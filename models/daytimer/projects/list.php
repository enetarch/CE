<?
$rtn = Array 
(
);

for ($t=0; $t<10; $t++)
{
	$rtn [] = Array 
	( 
		"nID" => 122,
		"szName" => "Appointment",
		"szDescription" => "Appointment",
		"szMemo" => "Meet Mr. Rubio for lunch at La Shish in Dearborn",
		"dTarget" => "1998-01-01",
		"nTime" => "1",
		"nLength" => "1",
		"szButton" => "buttonbar_calendar", 
	);

	$rtn [] = Array 
	( 
		"nID" => 123,
		"szName" => "Todo",
		"szDescription" => "Todo",
		"szMemo" => "Meet Mr. Rubio for lunch at La Shish in Dearborn",
		"dTarget" => "1998-01-01",
		"nTime" => "1",
		"nType" => "1",
		"bComplete" => "1",
		"dComplete" => "1998-01-01",
		"szButton" => "buttonbar_checkbox_off",
	);

	$rtn [] = Array 
	( 
		"nID" => 124,
		"szName" => "Appointment",
		"szDescription" => "Appointment",
		"szMemo" => "Meet Mr. Rubio for lunch at La Shish in Dearborn",
		"szButton" => "buttonbar_notes",
	);

	$rtn [] = Array 
	( 
		"nID" => 125,
		"szName" => "SubProject",
		"szDescription" => "Project",
		"szMemo" => "Sub Project",
		"szButton" => "buttonbar_Folder",
	);
}
