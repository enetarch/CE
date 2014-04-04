<html>
<head>
<title>WorkOrder</title>
</head>
<script src="js/WorkOrders/view.js" ></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">WorkOrder</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>

<div id="buttonbar" class="buttonbar">
	<div id="buttonbar_workorder" class="buttonbar_button buttonbar_workorders buttonbar_float_left"></div>
	<div id="buttonbar_start" class="buttonbar_button buttonbar_start buttonbar_float_left"></div>
	<div id="buttonbar_pause" class="buttonbar_button buttonbar_pause buttonbar_float_left"></div>
	<div id="buttonbar_stop" class="buttonbar_button buttonbar_stop buttonbar_float_left"></div>
	<div id="buttonbar_log" class="buttonbar_button buttonbar_logs buttonbar_float_left"></div>
	<div id="buttonbar_todos_B4" class="buttonbar_button buttonbar_todos buttonbar_float_left"></div>
	<div id="buttonbar_todos_During" class="buttonbar_button buttonbar_todos buttonbar_float_left"></div>
	<div id="buttonbar_todos_Next" class="buttonbar_button buttonbar_todos buttonbar_float_left"></div>
	<div id="buttonbar_invoice" class="buttonbar_button buttonbar_invoices buttonbar_float_left"></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_workorder" class="">

		<div id="row" class="form_row">
			<div id="field_szClient" class="form_full_column form_label_text">[?= szClient ?]</div>
			<div id="button_view_client" class="buttonbar_button buttonbar_viewmore buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_szTechnician" class="form_label_column form_label_text">Technician</div>
			<div id="field_szTechnician" class="form_field_column form_field_text">[?= szTechnician ?]</div>
			<div id="button_view_technicians" class="buttonbar_button buttonbar_technician buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_dRequested" class="form_label_column form_label_text">Requested</div>
			<div id="field_dRequested" class="form_field_column form_field_text">[?= dRequested ?]</div>
			<div id="button_dRequested" class="buttonbar_button buttonbar_calendar buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_dScheduled" class="form_label_column form_label_text">Scheduled</div>
			<div id="field_dScheduled" class="form_field_column form_field_text">[?= dScheduled ?]</div>
			<div id="button_dScheduled" class="buttonbar_button buttonbar_calendar buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_tInTransit" class="form_label_column form_label_text">InTransit</div>
			<div id="field_tInTransit" class="form_field_column form_field_text">[?= tInTransit ?]</div>
			<div id="button_tInTransit" class="buttonbar_button buttonbar_start buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_tArrived" class="form_label_column form_label_text">Arrived</div>
			<div id="field_tArrived" class="form_field_column form_field_text">[?= tArrived ?]</div>
			<div id="button_tArrived" class="buttonbar_button buttonbar_stop buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="row_dReturn" class="form_full_column form_label_text">
				<div id="label_dReturn" style="float:left;">Return</div>
				<div id="field_bReturn" class="slider_size slider_onoff" style="float:left;"></div>
				<div id="field_dReturn" class="" style="float:left;">[?= dReturn ?]</div>
			</div>
			<div id="button_dRequested" class="buttonbar_button buttonbar_calendar buttonbar_float_right"></div>			
		</div>

		<div id="row" class="form_row">
			<div id="label_szCustomerNotes" class="form_full_column form_label_text">Cust Notes</div>
			<div id="button_clients_notes" class="buttonbar_button buttonbar_notes buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_szTechNotes" class="form_full_column form_label_text">Tech Notes</div>
			<div id="button_tech_notes" class="buttonbar_button buttonbar_notes buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_szSignedBy" class="form_label_column form_label_text">Signed By</div>
			<div id="field_szSignedBy" class="form_field_column form_field_text">[?= szSignedBy ?]</div>
			<div id="button_signature" class="buttonbar_button button_signature buttonbar_float_right"></div>
		</div>

		<div id="row" class="form_row">
			<div id="label_dSigned" class="form_label_column form_label_text">Signed</div>
			<div id="field_dSigned" class="form_field_column form_field_text">[?= dSigned ?]</div>
		</div>


	</div>
</div>

</body>
</html>
