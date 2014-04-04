<html>
<head>
<title>Inventory Item</title>
</head>
<script src="js/Accounting/Inventory/Items/edit.js" ></script>

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
		<div id="row" class="">
			<div id="label_szPartNo" class="form_label_column form_label_text">Part No</div>
			<div id="" class="form_field_column ">
				<input id="field_szPartNo" class="form_field_text" value="[?= szPartNo ?]">
			</div>
		</div>
		<div id="row" class="">
			<div id="label_szCatagory" class="form_label_column form_label_text">Catagory</div>
			<div id="" class="form_field_column ">
				<span id="field_szCatagory" class="form_field_text">[?= szCatagory ?]</span>
			</div>
			<div id="button_catagory_[?= t ?]" class="list_viewmore" value="[?= ID ?]"></div>
		</div>
		<div id="row" class="">
			<div id="label_nPrice" class="form_label_column form_label_text">Price</div>
			<div id="" class="form_field_column ">
				<input id="field_nPrice" class="form_field_text" value="[?= nPrice ?]">
			</div>
		</div>
		<div id="row" class="">
			<div id="label_bTax" class="form_label_column form_label_text">Taxable</div>
			<div id="" class="form_field_column ">
				<input id="field_bTax" class="form_field_text" value="[?= bTax ?]">
			</div>
		</div>


	</div>
</div>

</body>
</html>
