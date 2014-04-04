<html>
<head>
<title>Bank</title>
</head>
<script src="js/Accounting/Banking/view.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Bank</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_view" class="">

		<div id="row" class="blank_row">
			<div id="blank_row" class=""></div>
		</div>

		<div id="row" class="blank_row">
			<div id="label_bankname" class="form_label_column form_label_text">Name</div>
			<div id="field_bankname" class="form_field_column ">[?= szName ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_Account" class="form_label_column form_label_text">Account</div>
			<div id="field_Account" class="form_field_column ">[?= szAccount ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_street1" class="form_label_column form_label_text">Street 1</div>
			<div id="field_street1" class="form_field_column ">[?= szStreet1 ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_street2" class="form_label_column form_label_text">Street 2</div>
			<div id="" class="form_field_column ">[?= szStreet2 ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_city" class="form_label_column form_label_text">City</div>
			<div id="field_city" class="form_field_column ">[?= szCity ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_state" class="form_label_column form_label_text">State</div>
			<div id="field_state" class="form_field_column ">[?= szState ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_zip" class="form_label_column form_label_text">Zip</div>
			<div id="field_zip" class="form_field_column ">[?= szZip ?]</div>
		</div>
		
		<div id="row" class="blank_row">
			<div id="blank_row" class=""></div>
		</div>
		
		<div id="row" class="blank_row">
			<div id="label_email" class="form_label_column form_label_text">eMail</div>
			<div id="field_email" class="form_field_column ">[?= szEMail ?]</div>
		</div>
		<div id="row" class="blank_row">
			<div id="label_telephone" class="form_label_column form_label_text">Tele</div>
			<div id="" class="form_field_column ">[?= szTele ?]</div>
		</div>

		<div id="row" class="">
			<div id="blank_row" class=""></div>
		</div>

	</div>
</div>

</body>
</html>
