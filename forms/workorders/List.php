<html>
<head>
<title>WorkOrder List</title>
</head>
<script src="js/WorkOrders/list.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">WorkOrder List</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_WorkOrders" class="">

		<div id="row" class="">
			<div id="label_search" class="form_label_search form_label_text">Search</div>
			<div id="" class="form_search_column">
				<input id="field_search" type="text" size="19" value="" class="form_search_text">
			</div>
			<div id="button_search" class="form_search_icon"></div>
		</div>
		
<table id="workorders_list" class="list_table">
</table>

<script id="workorders_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td colspan="2"><span id="field_name" class="">[?= name ?]</span></td> 
		<td rowspan ="2" id="moreinfo"><div id="button_viewmore_[?= t ?]" value="[?= ID ?]" class="list_viewmore"></div></td>
	</tr>
	<tr>
		<td><span id="field_date" class="">[?= date ?]</span></td>
		<td><span id="field_description" class="">[?= description ?]</span></td>
	</tr>
</script>

	</div>
</div>

</body>
</html>

