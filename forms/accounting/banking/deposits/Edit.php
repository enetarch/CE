<html>
<head>
<title>Edit Deposit</title>
</head>
<script src="js/Accounting/Banking/Deposits/new.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Edit Deposit</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_save" class="titlebar_save"></div>
</div>


<div id="bank_list_panel_background" class="options_panel_background background_75pct">
<div id="bank_list_panel" class="row_vcenter options_panel background_Solid">
	
</div>
</div>


<div id="check_list_panel_background" class="options_panel_background background_75pct">
<div id="check_list_panel" class="row_vcenter options_panel background_Solid">
	
</div>
</div>


<div id="data_panel" class="data_panel">
	<div id="panel_new" class="">

		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

		<div id="panel_new_bank" class="">
		</div>
		
		<div id="row" class="form_row">
			<div id="label_view_payments" class="buttonbar_float_left form_label_text">View UnDeposited Payments</div>
			<div id="button_view_payments" class="buttonbar_add buttonbar_button buttonbar_float_right" value=""></div>
		</div>

<table id="deposits_list" class="list_table" >
</table>

		<div id="panel_new_deposit" class="">
		</div>

	</div>
</div>

		
<script id="new_bank_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_bank" class="form_label_column form_label_text">Bank</div>
			<div id="field_bank" class="form_field_column form_label_text">[?= szName ?]</div>
			<div id="button_view_banks" class="buttonbar_viewmore buttonbar_button buttonbar_float_right" value=""></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_account" class="form_label_column form_label_text">Account</div>
			<div id="field_accountf" class="form_field_column form_label_text">[?= szAccount ?]</div>
		</div>
</script>

<script id="checks_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="5"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_ID" class="">[?= szCheckID ?]</span></td> 
		<td><span id="field_date" class="">[?= szDate ?]</span></td> 
		<td><span id="field_amount" class="">[?= szClient ?]</span></td> 
		<td><span id="field_amount" class="">[?= nAmount ?]</span></td> 
		<td rowspan ="2" id="moreinfo">
			<div id="button_check_remove_[?= t ?]" class="buttonbar_delete buttonbar_button" value="[?= ID ?]"></div>
		</td>
	</tr>
	<tr>
		<td colspan="4"><span id="field_memo" class="">[?= szMemo ?]</span></td> 
	</tr>
</script>

<script id="new_deposit_template" type="text/text">
		<div id="row" class="form_row">
			<div id="label_no" class="form_label_column form_label_text">ID</div>
			<div id="field_no" class="form_field_column form_label_text">[?= nID ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_no" class="form_label_column form_label_text">Deposit No</div>
			<div id="field_no" class="form_field_column form_label_text">[?= szDepositNo ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>


		<div id="row" class="form_row">
			<div id="label_Notes" class="form_label_column form_label_text">Cash</div>
			<div id="field_Notes" class="form_field_column form_label_text form_text_align_right">[?= nCash ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Notes" class="form_label_column form_label_text">Checks</div>
			<div id="field_Notes" class="form_field_column form_label_text form_text_align_right">[?= nChecks ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Notes" class="form_label_column form_label_text">Credit</div>
			<div id="field_Notes" class="form_field_column form_label_text form_text_align_right">[?= nCredit ?]</div>
		</div>


		<div id="row" class="form_row">
			<div id="label_Notes" class="form_label_column form_label_text">Amount</div>
			<div id="field_Notes" class="form_field_column form_label_text form_text_align_right">[?= nAmount ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">Memo No</div>
			<div id="field_Memo" class="form_field_column form_label_text">[?= szMemo ?]</div>
		</div>
</script>

</body>
</html>
