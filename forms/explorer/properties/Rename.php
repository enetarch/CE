
<script src="js/Explorer/Properties/rename.js"></script>

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Rename??</div>
		<div id="button_close_rename" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

<div id="rename_panel" class="data_panel">
</div>

	<div id="row" class="form_row">
		<div id="label_rename" class="form_label_column form_label_text"></div>
		<div id="button_rename_confirm" class="form_field_column form_label_text form_text_align_center"> Rename</div>
	</div>

<script id="rename_panel_template" type="text/text">

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Name:</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szName ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_description" class="form_label_column form_label_text">Description:</div>
		<div id="field_current_description" class="form_field_column form_label_text">[?= szDescription ?]</div>
	</div>

</script>
