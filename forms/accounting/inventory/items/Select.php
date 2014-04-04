<script src="js/Accounting/Inventory/Items/select.js" ></script>

<div id="row_titlebar" class="blank_row" style="background-color : tan;">
	<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Inventory List</div>
	<div id="button_close" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
</div>

<div id="row_search" class="blank_row">
	<div id="label_search" class="form_label_search form_label_text buttonbar_float_left">Search</div>
	<div id="" class="form_search_column buttonbar_float_left">
		<input id="field_search" type="text" size="15" value="" class="form_search_text">
	</div>
	<div id="button_search" class="form_search_icon buttonbar_float_left"></div>
	<div id="button_options" class="buttonbar_options buttonbar_button buttonbar_float_right"></div>
</div>

<div id="inventory_options_panel_background" class="options_panel_background background_75pct">
<div id="inventory_options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="button_SortByCatagory" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Catagory" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Catagory</div>
	</div>
	
	<div id="button_SortByName" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_ProductName" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Product Name</div>
	</div>
		
	<div id="button_SortByPrice" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Price" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Price</div>
	</div>
		
</div>
</div>
		
<table id="Inventory_items_list" class="list_table">
</table>

<script id="Inventory_Items_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="product_catagory" class="">[?= szCatagory ?]</span></td> 
		<td><span id="product_name" class="">[?= szName ?]</span></td> 
		<td rowspan ="2" id="select">
			<div id="button_select_[?= t ?]" class="buttonbar_radiobutton buttonbar_button" value="[?= ID ?]"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><span id="product_description" class="">[?= szDescription ?]</span></td> 
	</tr>
</script>
