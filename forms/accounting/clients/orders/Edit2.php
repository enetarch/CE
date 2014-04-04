<html>
<head>
<title>Edit Invoice</title>
</head>
<script src="js/Accounting/Clients/Orders/edit2.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Order Detail</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>	
</div>

<div id="inventory_panel_background" class="options_panel_background background_75pct">
<div id="inventory_panel" class="row_vcenter options_panel background_Solid">
	
</div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_order" class="">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_quantity" class="form_label_column form_label_text">Quantity</div>
			<div id="field_quantity" class="form_field_column form_label_text">[?= nQuantity ?]</div>
			<div id="button_blank_1" class="buttonbar_button buttonbar_float_right " value=""></div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_partno" class="form_label_column form_label_text">Part No</div>
			<div id="field_partno" class="form_field_column form_label_text">[?= szPartNo ?]</div>
			<div id="button_inventory" class="buttonbar_inventory buttonbar_button buttonbar_float_right " value="[?= ID ?]"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_description" class="form_label_column form_label_text">Description</div>
			<div id="field_description" class="form_field_column form_label_text">[?= szDescription ?]</div>
			<div id="button_blank_1" class="buttonbar_button buttonbar_float_right " value=""></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_unit" class="form_label_column form_label_text">Unit</div>
			<div id="field_unit" class="form_field_column form_label_text">[?= nUnit ?]</div>
			<div id="button_blank_1" class="buttonbar_button buttonbar_float_right " value=""></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_blank" class="form_label_column form_label_text"></div>
			<div id="" class="form_field_column">
				<input id="button_add" type="submit" value="Add" class="form_field_text">
				</div>
		</div>

<table id="order_detail_list" class="list_table">
</table>

		<div id="row" class="form_row">
			<div id="label_blank" class="form_label_column form_label_text"></div>
			<div id="" class="form_field_column">
				<input id="button_done" type="submit" value="Done" class="form_field_text">
				</div>
		</div>

	</div>
</div>


<script id="order_detail_list_header_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">Q</span></td> 
		<td><span id="field_partno" class="">PartNo</span></td> 
		<td><span id="field_unit" class="">Unit</span></td> 
		<td><span id="field_ext" class="">Ext</span></td> 
		<td><span id="field_taxable" class="">Tax</span></td> 
	</tr>
</script>

<script id="order_detail_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="7"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">[?= nQuantity ?]</span></td> 
		<td><span id="field_partno" class="">[?= szPartNo ?]</span></td> 
		<td class="form_text_align_right"><span id="field_unit" class="">[?= nUnit ?]</span></td> 
		<td class="form_text_align_right"><span id="field_ext" class="">[?= nExtended ?]</span></td> 
		<td class="form_text_align_right"><span id="field_taxable" class="">[?= bTaxable ?]</span></td> 
		
		<td rowspan ="2" id="moreinfo">
			<div id="button_Delete_[?= t ?]" class="buttonbar_delete buttonbar_button buttonbar_float_right " value="[?= ID ?]"></div>
		</td>
	</tr>
	<tr>
		<td colspan="4"><span id="field_description" class="">[?= szDescription ?]</span></td> 
	</tr>
</script>

<script id="order_detail_list_footer_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="7"><!-- Seperator Line --></td></tr>

	<tr>
		<td colspan="3" class="form_text_align_right">SubTotal</td> 
		<td class="form_text_align_right"><span id="field_subtotal">[?= nSubTotal ?]</span></td> 
	</tr>

	<tr>
		<td colspan="3" class="form_text_align_right">Tax</td> 
		<td class="form_text_align_right"><span id="field_tax">[?= nTax ?]</span></td> 
	</tr>

	<tr>
		<td colspan="3" class="form_text_align_right">Total</td> 
		<td class="form_text_align_right"><span id="field_total" >[?= nTotal ?]</span></td> 
	</tr>

	<tr class="list_seperator_line"><td colspan="7"><!-- Seperator Line --></td></tr>

</script>

<script id="order_detail_list_empty_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6" class=""><!-- Seperator Line --></td></tr>
	<tr class=""><td colspan="6" class="form_text_align_center">Nothing Found</td></tr>
	<tr class="list_seperator_line"><td colspan="6" class=""><!-- Seperator Line --></td></tr>
</script>


</body>
</html>
