<html>
<head>
<title>View Note</title>
</head>
<script src="js/DayTimer/Notes/view.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">View Note</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

	<table id="note_new" class="table_width">
	</table>

	</div>
</div>

<script id="note_new_template" type="text/text">
	<tr>
		<td id="label_dTarget" class="form_label_text">Date:</td>
		<td><span id="field_dTarget" class="form_label_text">[?= szDate ?]</span></td> 
		<td><div id="button_date" class="buttonbar_calendar buttonbar_float_right buttonbar_button"></div></td>
		<!-- show drop down list box -->
	</tr>
	<tr>
		<td id="label_ntime" class="form_label_text">Time:</td>
		<td><span id="field_ntime" class="form_label_text">[?= nTime ?]</span></td> 
		<td><div id="button_time" class="buttonbar_calendar buttonbar_float_right buttonbar_button"></div></td>
		<!-- show drop down list box -->
	</tr>
	<tr>
		<td id="label_nlength" class="form_label_text">Length:</td>
		<td><span id="field_nlength" class="form_label_text">[?= nLength ?]</span></td> 
		<td><div id="button_length" class="buttonbar_calendar buttonbar_float_right buttonbar_button"></div></td>
		<!-- show drop down list box -->
	</tr>
	<tr>
		<td id="label_szMemo" class="form_label_text">Memo:</td>
		<td colspan="2"><span id="field_szMemo" class="form_label_text">[?= szMemo ?]</span></td> 
	</tr>
</script>	

</body>
</html>
