<html>
<head>
<title>Item</title>
</head>

<script src="js/Explorer/Items/edit.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Item</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_save" class="titlebar_save"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

	<table id="field_list" class="table_width">
	</table>

	</div>
</div>

<script id="field_list_template" type="text/text">
	<tr class="field_row">
		<td class="form_label_column"><span id="field_name" class="form_label_text field_name">[?= szField ?]</span></td> 
		<td class="form_field_column"><div id="field_value" class="form_field_text form_field_height form_field_width contentEditable" contentEditable="true">[?= szValue ?]</div></td> 
	</tr>
</script>	

</body>
</html>
