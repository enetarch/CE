<html>
<head>
<title>Item</title>
</head>

<script src="js/Explorer/Items/view.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Item</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

	<table id="field_list" class="table_width">
	</table>

	</div>
</div>

<script id="field_list_template" type="text/text">
	<tr>
		<td><span id="field_name" class="form_label_text">[?= szField ?]</span></td> 
		<td><span id="field_value" class="form_label_text" >[?= szValue ?]</span></td> 
	</tr>
</script>	

</body>
</html>
