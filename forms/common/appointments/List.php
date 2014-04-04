<html>
<head>
<title>Appointment List</title>
</head>

<body>
<div id="titlebar" class="">
	<div id="titlebar_back" class=""></div>
	<div id="titlebar_logo" class=""></div>
	<div id="titlebar_name" class="">Appointment</div>

	<div id="titlebar_exit" class=""></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

<table id="appointment_list" class="">
</table>

<script type="template/text">
	<tr class="seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td ><span id="time" class="">[?= szTime ?]</span></td> 
		<td ><span id="szmemo" class="">[?= szMemo ?]</span></td> 
		<td id="moreinfo"><div id="more_[?= t ?]" value="[?= ID ?]">&gt;</div></td>
	</tr>
</script>

	</div>
</div>

</body>
</html>
