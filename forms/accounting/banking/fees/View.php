<html>
<head>
<title>View Fee</title>
</head>
<script src="js/Accounting/Banking/Fees/view.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Fee</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_view" class="">
		
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

	<div id="panel_view_fee" class="">
	</div>

<script id="view_fee_template" type="text/text">

		<div id="row" class="form_row">
			<div id="label_bank" class="form_label_column form_label_text">Bank</div>
			<div id="field_bank" class="form_field_column form_label_text">[?= szName ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_client" class="form_label_column form_label_text">No</div>
			<div id="field_client" class="form_field_column form_label_text">[?= nID ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_ClientNotes" class="form_label_column form_label_text">To</div>
			<div id="field_ClientNotes" class="form_field_column form_label_text">[?= szTo ?]</div>
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
