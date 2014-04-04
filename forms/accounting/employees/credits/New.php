<html>
<head>
<title>New Credit</title>
</head>
<script src="js/Accounting/Employees/Credits/new.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">New Credit</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_save" class="titlebar_save"></div>
</div>

<div id="employee_list_panel_background" class="options_panel_background background_75pct">
<div id="employee_list_panel" class="row_vcenter options_panel background_Solid">
	
</div>
</div>


<div id="data_panel" class="data_panel">
	<div id="panel_new" class="">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>
	</div>

	<div id="panel_new_employee" class="">
	</div>
		
	<div id="panel_new_credit" class="">
	</div>

</div>

<script id="new_employee_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_employee" class="form_label_column form_label_text">Employee</div>
			<div id="field_employee" class="form_field_column form_label_text">[?= szName ?]</div>
			<div id="button_view_employees" class="buttonbar_viewmore buttonbar_button buttonbar_float_right" value=""></div>
		</div>
</script>

<script id="new_credit_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_no" class="form_label_column form_label_text">Credit No</div>
			<div id="field_no" class="form_field_column form_label_text">[?= nID ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">To</div>
			<div id="field_to" class="form_field_column form_label_text">[?= szTo ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_Notes" class="form_label_column form_label_text">Amount</div>
			<div id="field_Notes" class="form_field_column form_label_text">[?= nAmount ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">Memo No</div>
			<div id="field_Memo" class="form_field_column form_label_text">[?= szMemo ?]</div>
		</div>
</script>

</body>
</html>
