<html>
<head>
<title>Appointment List</title>
</head>
<script src="js/DayTimer/Appointments/list.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Appointment</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

	<table id="appointment_list" class="">
	</table>

	</div>
</div>

<script id="appointment_list_row_template" type="template/text">
	<tr class="seperator_line"><td colspan="3"><!-- Seperator Line --></td></tr>
	<tr>
		<td ><span id="szTime" class="">[?= szTime ?]</span></td> 
		<td rowspan="2"><span id="szMemo" class="">[?= szMemo ?]</span></td> 
		<td id="moreinfo" rowspan="2"><div id="appointment_viewmore_[?= t ?]" class="button_float_right list_viewmore" value="[?= ID ?]"></div></td>
	</tr>
	<tr>
		<td ><span id="nLength" class="">[?= nLength ?]</span></td> 
	</tr>
</script>


</body>
</html>
