<?
$rtn = Array ();
 
include_once ($dirModel . "/DayTimer/daytimer.php");

if (! isset ($aryParams ["nID"]) ) return;

$thsFolder = $aryParams ["nID"];

$fldrDayTimer = $gblLadder->getItem ($thsFolder);

$objDayTimer = new DayTimer_DayTimer ();
$objDayTimer->Connect ($fldrDayTimer->cn);
$objDayTimer->setState ($fldrDayTimer->getState());

$szFilter = 
	"dTarget BETWEEN $szToday AND $szTomorrow ";
	
$objAppointments = $objDayTimer->getAppointments ($szFilter);


for ($t=0; $t<$objAppointments->count(); $t++)
{
	$objAppointment = $objAppointments->getItem ($t);
	
	$rtn [] = Array 
	( 
		"nID" => $objAppointment->ID (),
		"szName" => $objAppointment->szName (),
		"szDescription" => $objAppointment->szDescription (),
		"szMemo" => $objAppointment->szMemo,
		"szDate" => $objAppointment->szDate,
		"nTime" => $objAppointment->nTime,
		"nLength" => $objAppointment->nLength,
	);
}



?>
