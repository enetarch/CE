<script src="js/Accounting/Vendors/select.js" ></script>

<div id="row_titlebar" class="blank_row" style="background-color : tan;">
	<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Vendor List</div>
	<div id="button_close" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
</div>

<table id="Vendor_list" class="list_table">
</table>

<script id="Vendor_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="3"><!-- Seperator Line --></td></tr>
	<tr>
		<td colspan="1"><span id="company" class="">[?= szVendor ?]</span></td> 
		<td colspan="1"><span id="account" class="">[?= szAccount ?]</span></td> 
		<td rowspan ="2" id="moreinfo">
			<div id="Vendor_select_[?= t ?]" class="list_viewmore" value="[?= nID ?]"></div>
		</td>
	</tr>
	<tr></tr>
</script>
