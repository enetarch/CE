<html>
<head>
<title>Folders</title>
</head>

<script src="js/Explorer/Folders/list.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Folders</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_edit" class="titlebar_edit"></div>
</div>


<div id="buttonbar" class="buttonbar">
	<div id="buttonbar_paste" class="buttonbar_paste buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_home" class="buttonbar_home buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_up" class="buttonbar_up buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_search" class="buttonbar_search buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_create" class="buttonbar_create buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_refresh" class="buttonbar_refresh buttonbar_button buttonbar_float_left"></div>
	<div id="buttonbar_reference" class="buttonbar_Reference buttonbar_button buttonbar_float_left"></div>
</div>


<div id="options_panel_background" class="options_panel_background background_75pct">
<div id="options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Options</div>
		<div id="button_close_options" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<div id="button_Open" class="row_vcenter blank_row background_Solid">
		<div id="button_Open_Name" class="buttonbar_Open buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Open</div>
	</div>

	<div id="button_Rename" class="row_vcenter blank_row background_Solid">
		<div id="button_Rename_Name" class="buttonbar_Rename buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Rename</div>
	</div>
		
	<div id="button_Delete" class="blank_row background_Solid">
		<div id="button_Delete_Name" class="buttonbar_Delete buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Delete </div>
	</div>
	
	<div id="button_Copy" class="row_vcenter blank_row background_Solid">
		<div id="button_Copy_Name" class="buttonbar_Copy buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Copy</div>
	</div>
	
	<div id="button_Move" class="row_vcenter blank_row background_Solid">
		<div id="button_Move_Name" class="buttonbar_Move buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Move</div>
	</div>
				
	<div id="button_Duplicate" class="row_vcenter blank_row background_Solid">
		<div id="button_Duplicate_Name" class="buttonbar_Duplicate buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Duplicate</div>
	</div>
				
	<div id="button_Properties" class="row_vcenter blank_row background_Solid">
		<div id="button_Properties_Name" class="buttonbar_Properties buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Properties</div>
	</div>
				
</div>
</div>

<div id="rename_panel_background" class="options_panel_background background_75pct">
<div id="rename_panel" class="row_vcenter options_panel background_Solid">

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Rename??</div>
		<div id="button_close_rename" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<div id="rename_data" class="data_panel">
	</div>

	<div id="row" class="form_row">
		<div id="label_rename" class="form_label_column form_label_text"></div>
		<div id="button_rename_confirm" class="form_field_column form_label_text form_text_align_center"> Rename</div>
	</div>

</div>
</div>

<div id="delete_panel_background" class="options_panel_background background_75pct">
<div id="delete_panel" class="row_vcenter options_panel background_Solid">

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Cancel Delete</div>
		<div id="button_close_delete" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="button_confirm_delete" class="buttonbar_close buttonbar_button buttonbar_float_left"></div>
		<div id="title_confirm_delete" class="form_label_text buttonbar_float_left form_text_align_center">Confirm Delete</div>
	</div>

</div>
</div>

<div id="properties_panel_background" class="options_panel_background background_75pct">
<div id="properties_panel" class="row_vcenter options_panel background_Solid">

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Properties</div>
		<div id="button_close_properties" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<div id="properties_data" class="data_panel">
	</div>
	
</div>
</div>

<div id="newinstance_panel_background" class="options_panel_background background_75pct">
<div id="newinstance_panel" class="row_vcenter options_panel background_Solid">

	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Create New Instance</div>
		<div id="button_close_newinstance" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<table id="newisntance_list" class="table_width">
	</table>

</div>
</div>


<div id="data_panel" class="data_panel">
	<div id="panel_register" class="">

	<table id="folders_list" class="table_width">
	</table>

	</div>
</div>

<!-- =================================================== -->

<script id="properties_data_template" type="text/text">
	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Name</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szName ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Description</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szDescription ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Date Created</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= dCreated ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Date Modified</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= dModified ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Created By</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szCreatedBy ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Modified by</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szModifiedBy ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Class</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szClass ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Size</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szSize ?]</div>
	</div>
</script>	


<script id="folder_list_template" type="text/text">
	<tr>
		<td><div id="viewmore_[?= t ?]" class="[?= szIcon ?] buttonbar_button" value="[?= nID ?]" type="[?= nType ?]"></div></td>
		<td><span id="label_folder_name" class="form_label_text">[?= szName ?]</span></td> 
		<td><span id="label_folder_date" class="form_label_text">[?= szDate ?]</span></td> 
	</tr>
</script>	


<script id="newinstance_list_template" type="text/text">
	<tr>
		<td><div id="addclass_[?= t ?]" class="[?= szIcon ?] buttonbar_button" value="[?= nID ?]" type="[?= nType ?]"></div></td>
		<td><span id="label_class_name" class="form_label_text">[?= szName ?]</span></td> 
	</tr>
</script>


<script id="delete_template" type="text/text">
	<div id="row_titlebar" class="blank_row" style="background-color : tan;">
		<div id="panel_title" class="form_label_text buttonbar_float_left form_text_align_center">Cancel Delete</div>
		<div id="button_close_delete" class="buttonbar_close buttonbar_button buttonbar_float_right"></div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Current Name</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szCurrentName ?]</div>
	</div>
</script>


<script id="rename_data_template" type="text/text">
	<div id="row" class="form_row">
		<div id="label_current_name" class="form_label_column form_label_text">Name:</div>
		<div id="field_current_name" class="form_field_column form_label_text">[?= szName ?]</div>
	</div>

	<div id="row" class="form_row">
		<div id="label_current_description" class="form_label_column form_label_text">Description:</div>
		<div id="field_current_description" class="form_field_column form_label_text">[?= szDescription ?]</div>
	</div>
</script>


</body>
</html>
