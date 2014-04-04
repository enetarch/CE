<html>
<head>
<title>Inventory Items</title>
</head>
<script src="js/Accounting/Inventory/Items/list.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Inventory Items</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_refresh" class="titlebar_refresh"></div>
</div>

<div id="options_panel_background" class="options_panel_background background_75pct">
<div id="options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="button_AddItem" class="blank_row background_Solid">
		<div id="button_Add" class="buttonbar_add buttonbar_button"></div>
		<div id="" class="form_label_text">Add an Inventory Item</div>
	</div>
	
	<div id="button_SortByCatagory" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Catagory" class="buttonbar_sort buttonbar_button"></div>
		<div id="" class="form_label_text">Sort by Catagory</div>
	</div>
	
	<div id="button_SortByName" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_ProductName" class="buttonbar_sort buttonbar_button"></div>
		<div id="" class="form_label_text">Sort by Product Name</div>
	</div>
		
</div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_Inventory_Items" class="">

		<div id="row" class="">
			<div id="label_search" class="form_label_search form_label_text">Search</div>
			<div id="" class="form_search_column">
				<input id="field_search" type="text" size="19" value="" class="form_search_text">
			</div>
			<div id="button_search" class="form_search_icon"></div>
		</div>
		
<table id="Inventory_items_list" class="list_table">
</table>

<script id="Inventory_Items_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="product_catagory" class="">[?= szCatagory ?]</span></td> 
		<td><span id="product_name" class="">[?= szName ?]</span></td> 
		<td rowspan ="2" id="moreinfo"><div id="button_viewmore_[?= t ?]" class="list_viewmore" value="[?= ID ?]"></div></td>
	</tr>
	<tr>
		<td colspan="2"><span id="product_description" class="">[?= szDescription ?]</span></td> 
	</tr>
</script>

	</div>
</div>

</body>
</html>

