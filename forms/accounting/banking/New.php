<html>
<head>
<title>New Bank</title>
</head>
<script src="js/Accounting/Banking/new.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">New Bank</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_view" class="">

		<div id="row" class="">
			<div id="blank_row" class=""></div>
		</div>

		<div id="row" class="">
			<div id="label_bankname" class="form_label_column form_label_text">Name</div>
			<div id="" class="form_field_column ">
				<input id="field_bankname" type="text" size="15" value="[?= szName ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_Account" class="form_label_column form_label_text">Account</div>
			<div id="" class="form_field_column ">
				<input id="field_Account" type="text" size="15" value="[?= szAccount ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_street1" class="form_label_column form_label_text">Street 1</div>
			<div id="" class="form_field_column ">
				<input id="field_street1" type="text" size="15" value="[?= szStreet1 ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_street2" class="form_label_column form_label_text">Street 2</div>
			<div id="" class="form_field_column ">
				<input id="field_street2" type="text" size="15" value="[?= szStreet2 ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_city" class="form_label_column form_label_text">City</div>
			<div id="" class="form_field_column ">
				<input id="field_city" type="text" size="15" value="[?= szCityt ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_state" class="form_label_column form_label_text">State</div>
			<div id="" class="form_field_column ">
				<input id="field_state" type="text" size="2" value="[?= szState ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_zip" class="form_label_column form_label_text">Zip</div>
			<div id="" class="form_field_column ">
				<input id="field_zip" type="text" size="15" value="[?= szZip ?]" class="form_field_text">
				</div>
		</div>
		
		<div id="row" class="">
			<div id="blank_row" class=""></div>
		</div>
		
		<div id="row" class="">
			<div id="label_email" class="form_label_column form_label_text">eMail</div>
			<div id="" class="form_field_column ">
				<input id="field_email" type="text" size="15" value="[?= szEMail ?]" class="form_field_text">
				</div>
		</div>
		<div id="row" class="">
			<div id="label_telephone" class="form_label_column form_label_text">Tele</div>
			<div id="" class="form_field_column ">
				<input id="field_telephone" type="text" size="15" value="[?= szTele ?]" class="form_field_text">
				</div>
		</div>

		<div id="row" class="">
			<div id="blank_row" class=""></div>
		</div>

		<div id="row" class="">
			<div id="label_blank" class="form_label_column form_label_text"></div>
			<div id="" class="form_field_column">
				<input id="button_add" type="submit" value="Update" class="form_field_text">
				</div>
		</div>	

	</div>
</div>

</body>
</html>
