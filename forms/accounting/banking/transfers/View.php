<html>
<head>
<title>View Transfer</title>
</head>
<script src="js/Accounting/Banking/Transfers/view.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Transfer</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_view" class="">
		
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

	<div id="panel_view_transfer" class="">
	</div>

<script id="view_transfer_template" type="text/text">

		<div id="row" class="form_row">
			<div id="label_bankfrom" class="form_label_column form_label_text">Bank</div>
			<div id="field_bankfrom" class="form_field_column form_label_text">[?= szBankFrom ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_accountfrom" class="form_label_column form_label_text">Account</div>
			<div id="field_accountfrom" class="form_field_column form_label_text">[?= szAccountFrom ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_bankto" class="form_label_column form_label_text">Bank</div>
			<div id="field_bankto" class="form_field_column form_label_text">[?= szBankTo ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_accountto" class="form_label_column form_label_text">Account</div>
			<div id="field_accountto" class="form_field_column form_label_text">[?= szAccountTo ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_id" class="form_label_column form_label_text">No</div>
			<div id="field_id" class="form_field_column form_label_text">[?= nID ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_VendorNotes" class="form_label_column form_label_text">Amount</div>
			<div id="field_VendorNotes" class="form_field_column form_label_text">[?= nAmount ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">Memo No</div>
			<div id="field_Memo" class="form_field_column form_label_text">[?= szMemo ?]</div>
		</div>
		
</script>		

</div>

</body>
</html>
