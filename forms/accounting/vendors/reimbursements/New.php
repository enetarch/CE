<html>
<head>
<title>New Reimbursement</title>
</head>
<script src="js/Accounting/Vendors/Reimbursements/new.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">New Reimbursement</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_save" class="titlebar_save"></div>
</div>

<div id="Vendor_list_panel_background" class="options_panel_background background_75pct">
<div id="Vendor_list_panel" class="row_vcenter options_panel background_Solid">
	
</div>
</div>


<div id="data_panel" class="data_panel">
	<div id="panel_new" class="">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>
	</div>

	<div id="panel_new_Vendor" class="">
	</div>
		
	<div id="panel_new_reimbursement" class="">
	</div>

</div>

<script id="new_Vendor_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_Vendor" class="form_label_column form_label_text">Vendor</div>
			<div id="field_Vendor" class="form_field_column form_label_text">[?= szName ?]</div>
			<div id="button_view_Vendors" class="buttonbar_viewmore buttonbar_button buttonbar_float_right" value=""></div>
		</div>
</script>

<script id="new_reimbursement_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_no" class="form_label_column form_label_text">Reimbursement No</div>
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
