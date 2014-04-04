<script src="js/Accounting/Clients/Payments/select.js" ></script>

<div id="row_titlebar" class="blank_row" style="background-color : tan;">
	<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Payment List</div>
	<div id="button_close" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
</div>

<table id="payment_list" class="list_table">
</table>

<script id="payment_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan="5"><!-- Seperator Line --></td></tr>
	<tr>
		<td><span id="field_CheckID" class="">[?= szCheckID ?]</span></td> 
		<td><span id="field_date" class="">[?= szDate ?]</span></td> 
		<td><span id="field_client" class="">[?= szClient ?]</span></td> 
		<td><span id="field_amount" class="">[?= nAmount ?]</span></td> 
		<td rowspan ="2" id="moreinfo">
			<div id="check_select_[?= t ?]" class="buttonbar_radiobutton buttonbar_button" value="[?= nID ?]"></div>
		</td>
	</tr>
	<tr>
		<td colspan="5"><span id="field_memo" class="">[?= szMemo ?]</span></td> 
	</tr>
</script>
