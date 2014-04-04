<html>
<head>
<title>New Appointment</title>
</head>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class=""></div>
	<div id="titlebar_logo" class=""></div>
	<div id="titlebar_name" class="">Appointment</div>

	<div id="titlebar_exit" class=""></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

<table id="appointment_new" class="">
	<tr>
		<td id="" class="appoing_date_target">Date:</td>
		<td><span id="time" class="">[?= szDate ?]</span></td> 
		<!-- show javascript calendar -->
	</tr>
	<tr>
		<td id="" class="">Time:</td>
		<td><span id="time" class="">[?= szTime ?]</span></td> 
		<!-- show drop down list box -->
	</tr>
	<tr>
		<td id="" class="">Length:</td>
		<td><span id="time" class="">[?= szLength ?]</span></td> 
		<!-- show drop down list box -->
	</tr>
	<tr>
		<td id="" class="">Memo:</td>
		<td colspan="2"><textarea id="szMemo" class="">[?= szMemo ?]</textarea></td> 
	</tr>
	<tr>
		<td id="" class="">Save:</td>
		<td colspan="2"><input id="" class="" type="submit" value="Save"></td> 
	</tr>
</table>

	</div>
</div>

</body>
</html>
