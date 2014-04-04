<html>
<head>
<title>Fees</title>
</head>
<script src="js/Accounting/Clients/Fees/home.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Fees</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_refresh" class="titlebar_refresh"></div>
</div>

<div id="options_panel_background" class="options_panel_background background_75pct">
<div id="options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="button_AddItem" class="blank_row background_Solid">
		<div id="button_Add" class="buttonbar_add buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Add a New Fee </div>
	</div>
	
	<div id="button_SortByInvoiceNo" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_InvoiceNo" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Fee ID</div>
	</div>
	
	<div id="button_SortByName" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Name" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Name</div>
	</div>
		
	<div id="button_SortByTotal" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Total" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Amount</div>
	</div>

	<div id="button_SortByDate" class="row_vcenter blank_row background_Solid">
		<div id="button_Sort_Date" class="buttonbar_sort buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Sort by Date</div>
	</div>
				
</div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_Clients" class="">

		<div id="row" class="">
			<div id="label_search" class="form_label_search form_label_text">Search</div>
			<div id="" class="form_search_column">
				<input id="field_search" type="text" size="19" value="" class="form_search_text">
			</div>
			<div id="button_search" class="form_search_icon"></div>
		</div>
		
<table id="fees_list" class="list_table" >
</table>

<script id="fees_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="5"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="nID" class="">[?= nID ?]</span></td> 
		<td><span id="date" class="">[?= szDate ?]</span></td> 
		<td><span id="total" class="">[?= nAmount ?]</span></td> 
		<td rowspan ="2" id="moreinfo">
			<div id="invoice_viewmore_[?= t ?]" class="list_viewmore" value="[?= ID ?]"></div>
		</td>
	</tr>
	<tr>
		<td colspan="4"><span id="memo" class="">[?= szDescription ?]</span></td> 
	</tr>
</script>

	</div>
</div>

</body>
</html>
