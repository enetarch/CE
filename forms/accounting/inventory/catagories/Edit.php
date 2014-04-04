<html>
<head>
<title>Inventory Item</title>
</head>
<script src="js/Accounting/Inventory/Catagories/edit.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Inventory Item</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_refresh" class="titlebar_refresh"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">
		<div id="row" class="">
			<div id="blank_row" class=""></div>
		</div>

		<div id="row" class="">
			<div id="label_szName" class="form_label_column form_label_text">Part Name</div>
			<div id="" class="form_field_column ">
				<input id="field_szName" class="form_field_text" value="[?= szName ?]">
			</div>
		</div>
		<div id="row" class="">
			<div id="label_szDescription" class="form_label_column form_label_text">Description</div>
			<div id="" class="form_field_column ">
				<input id="field_szDescription" class="form_field_text" value="[?= szDescription ?]">
			</div>
		</div>

	</div>
</div>

</body>
</html>
