<html>
<head>
<title>Employee Statement</title>
</head>
<script src="js/Accounting/Employees/Statements/employee.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Employee Statement</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_refresh" class="titlebar_refresh"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_invoice" class="">

	<table id="statement_detail_list" class="list_table">
	</table>

	</div>
</div>

<script id="statement_detail_list_header_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">ID</span></td> 
		<td><span id="field_date" class="">Date</span></td> 
		<td><span id="field_memo" class="">Memo</span></td> 
		<td class="form_text_align_right"><span id="field_amount" class="">Amount</span></td> 
		<td class="form_text_align_right"><span id="field_balance" class="">Balance</span></td> 
	</tr>
</script>

<script id="statement_detail_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">[?= nID ?]</span></td> 
		<td><span id="field_date" class="">[?= szDate ?]</span></td> 
		<td><span id="field_memo" class="">[?= szMemo ?]</span></td> 
		<td class="form_text_align_right"><span id="field_amount" class="">[?= nAmount ?]</span></td> 
		<td class="form_text_align_right"><span id="field_balance" class="">[?= nBalance ?]</span></td> 
		<td><div id="button_view_[?= t ?]" class="buttonbar_viewmore buttonbar_button" value="[?= t ?]"></div></td> 
	</tr>
	<tr>
	</tr>
</script>

<script id="statement_detail_list_empty_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6" class=""><!-- Seperator Line --></td></tr>
	<tr class=""><td colspan="4" class="form_text_align_center">Nothing Found</td></tr>
	<tr class="list_seperator_line"><td colspan="4" class=""><!-- Seperator Line --></td></tr>
</script>

</body>
</html>
