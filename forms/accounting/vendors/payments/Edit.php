<html>
<head>
<title>Edit Payment</title>
</head>
<script src="js/Accounting/Vendors/Payments/edit.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Edit Payment</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_payment" class="">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Vendor" class="form_label_column form_label_text">Vendor</div>
			<div id="field_Vendor" class="form_field_column form_label_text">[?= szVendor ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">Memo No</div>
			<div id="field_Memo" class="form_field_column form_label_text">[?= szMemo ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_VendorNotes" class="form_label_column form_label_text">Amount</div>
			<div id="field_VendorNotes" class="form_field_column form_label_text">[?= nAmount ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_VendorNotes" class="form_label_column form_label_text">Vendor Notes</div>
			<div id="field_VendorNotes" class="form_field_column form_label_text">[?= szVendorNotes ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_VendorNotes" class="form_label_column form_label_text">Notes</div>
			<div id="field_VendorNotes" class="form_field_column form_label_text">[?= szVendorNotes ?]</div>
		</div>

	</div>
</div>

</body>
</html>
