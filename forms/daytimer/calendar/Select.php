<?
$shared = $_SERVER ["DOCUMENT_ROOT"] . "/CE/shared";

include_once ($shared . "/functions.php");

$dToday = Date_Create ()->setTime (0,0,0); 
$dTarget = Date_Create ()->setTime (0,0,0);  
if (isset ( $_POST ["dTarget"] ))
	$dTarget = Date_Create ( $_POST ["dTarget"] );

$dSunday = clone $dTarget;
if ($dSunday->Format("N") != 7)
	$dSunday->Modify ("Last Sunday");



$dYearM1 = clone $dTarget;
$dYearP1 = clone $dTarget;
$dMonthM1 = clone $dTarget;
$dMonthP1 = clone $dTarget;
$dWeekM1 = clone $dTarget;
$dWeekP1 = clone $dTarget;

$dYearM1->Modify ("-1 Year");
$dYearP1->Modify ("+1 Year");
$dMonthM1->Modify ("-1 Month");
$dMonthP1->Modify ("+1 Month");
$dWeekM1->Modify ("-1 Week");
$dWeekP1->Modify ("+1 Week");

?>

<html>
<head>
</head>
<script src="js/Common/Calendar/select.js" ></script>

<body>

<div id="data_panel" class="data_panel">
	<div id="panel_Calendar" class="">

<table class="calendar_table_cell">
	<tr>
		<td><span id="calendar_py" class="calendar_font_nav">PY</span></td>
		<td><span id="calendar_pm" class="calendar_font_nav">PM</span></td>
		<td><span id="calendar_pw" class="calendar_font_nav">PW</span></td>
		<td><span id="calendar_today" class="calendar_font_nav">Now</span></td>
		<td><span id="calendar_nw" class="calendar_font_nav">NW</span></td>
		<td><span id="calendar_nm" class="calendar_font_nav">NM</span></td>
		<td><span id="calendar_ny" class="calendar_font_nav">NY</span></td>
	</tr>
	
	<tr>
		<td><span id="" class="calendar_font">S</span></td>
		<td><span id="" class="calendar_font">M</span></td>
		<td><span id="" class="calendar_font">T</span></td>
		<td><span id="" class="calendar_font">W</span></td>
		<td><span id="" class="calendar_font">T</span></td>
		<td><span id="" class="calendar_font">F</span></td>
		<td><span id="" class="calendar_font">S</span></td>
	</tr>

<?
	$t=0;
	for ($w=0; $w<6; $w++)
	{
?>
	<tr>
<?		
		for ($d=0; $d<7; $d++)
		{
			$szDay = $dSunday->Format ("d");
?>	
			<td>
					<span id="calendar_date_<?= $t++ ?>" class="calendar_font<?= (($dSunday == $dTarget) ? " calendar_highlight" : "") ?><?= (($dSunday == $dToday) ? " calendar_bold" : "") ?>"><?= $szDay ?></span>
			</td>
<?
			$dSunday->Modify ("+1 days");
		}
?>
	</tr>
<?
	}
?>

</table>
	</div>
</div>

</body>
</html>
