<html>
<head>
<title>View Expense</title>
</head>
<script src="js/Accounting/Employees/Expenses/view.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">View Expense</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_po" class="">

<div id="expense_header">
</div>

<table id="expense_detail_list" class="list_table">
</table>

<div id="expense_notes">
</div>

	</div>
</div>

<!-- ============ Templates ============ -->

<script id="expense_header_template" type="text/text">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_client" class="form_label_column form_label_text">Vendor</div>
			<div id="field_client" class="form_field_column form_label_text">[?= szVendor ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_date" class="form_label_column form_label_text">Date</div>
			<div id="field_date" class="form_field_column form_label_text">[?= szDate ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_terms" class="form_label_column form_label_text">Terms</div>
			<div id="field_terms" class="form_field_column form_label_text">[?= szTerms ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_po" class="form_label_column form_label_text">Invoice</div>
			<div id="field_po" class="form_field_column form_label_text">[?= szInvoice ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_ShippingMethod" class="form_label_column form_label_text">Courier</div>
			<div id="field_ShippingMethod" class="form_field_column form_label_text">[?= szShippingMethod ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Tracking" class="form_label_column form_label_text">Tracking No</div>
			<div id="field_Tracking" class="form_field_column form_label_text">[?= szTracking ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>
</script>


<script id="expense_detail_list_header_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">Q</span></td> 
		<td><span id="field_partno" class="">PartNo</span></td> 
		<td class="form_text_align_right"><span id="field_unit" class="">Unit</span></td> 
		<td class="form_text_align_right"><span id="field_ext" class="">Ext</span></td> 
		<td class="form_text_align_right"><span id="field_taxable" class="">Tax</span></td> 
	</tr>
</script>


<script id="expense_detail_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_quantity" class="">[?= nQuantity ?]</span></td> 
		<td><span id="field_partno" class="">[?= szPartNo ?]</span></td> 
		<td class="form_text_align_right"><span id="field_unit" class="">[?= nUnit ?]</span></td> 
		<td class="form_text_align_right"><span id="field_ext" class="">[?= nExtended ?]</span></td> 
		<td class="form_text_align_right"><span id="field_taxable" class="">[?= bTaxable ?]</span></td> 
	</tr>
	<tr>
		<td colspan="4"><span id="field_description" class="">[?= szDescription ?]</span></td> 
	</tr>
</script>


<script id="expense_detail_list_empty_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="6" class=""><!-- Seperator Line --></td></tr>
	<tr class=""><td colspan="6" class="form_text_align_center">Nothing Found</td></tr>
	<tr class="list_seperator_line"><td colspan="6" class=""><!-- Seperator Line --></td></tr>
</script>


<script id="expense_detail_list_footer_template" type="text/text">
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


<script id="expense_notes_template" type="text/text">
		<div id="row" class="form_row">
			<div id="blank_row" class="">&nbsp;</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_Memo" class="form_label_column form_label_text">Memo No</div>
			<div id="field_Memo" class="form_field_column form_label_text">[?= szMemo ?]</div>
		</div>
		
		<div id="row" class="form_row">
			<div id="label_VendorNotes" class="form_label_column form_label_text">Notes</div>
			<div id="field_VendorNotes" class="form_field_column form_label_text">[?= szVendorNotes ?]</div>
		</div>

		<div id="row" class="form_row">
			<div id="label_ClientNotes" class="form_label_column form_label_text">Our Notes</div>
			<div id="field_ClientNotes" class="form_field_column form_label_text">[?= szClientNotes ?]</div>
		</div>
		
</script>

</body>
</html>
