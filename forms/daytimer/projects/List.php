<html>
<head>
<title>Project List</title>
</head>
<script src="js/DayTimer/Projects/list.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Project List</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
	<div id="titlebar_calendar" class="titlebar_calendar"></div>
	
</div>

<div id="options_panel_background" class="options_panel_background background_75pct">
<div id="options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="button_folder" class="blank_row background_Solid" type="listoption" value="buttonbar_Folder">
		<div id="button_image" class="buttonbar_Folder buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Folder</div>
	</div>
	
	<div id="button_note" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_notes">
		<div id="button_image" class="buttonbar_notes buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Note</div>
	</div>
	
	<div id="button_todo" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_checkbox_on">
		<div id="button_image" class="buttonbar_checkbox_on buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Todo</div>
	</div>
		
	<div id="button_appointment" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_calendar">
		<div id="button_image" class="buttonbar_calendar buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Appointment</div>
	</div>

</div>
</div>



<div id="data_panel" class="data_panel">
	<div id="panel_Projects" class="">

	<table id="project_new" class="list_table">
		<tr>
			<td>
<div id="button_droplistbox" class="buttonbar_float_left" type="droplistbox" options="options_panel_background">
	<div id="button_addtype" class="buttonbar_CheckBox_On buttonbar_button buttonbar_float_left" value="buttonbar_CheckBox_On"></div>
	<div id="button_showlist" class="buttonbar_DownArrow buttonbar_droplist_arrow buttonbar_float_left" ></div>
</div>
			</td>
			<td><input id="field_search" type="text" size="19" value="" class="form_field_text"></td>
			<td><div id="button_add" class="buttonbar_add form_icon_add buttonbar_button buttonbar_float_right"></div></td>
		</tr>
	</table>
		
	<table id="project_list" class="list_table">
	</table>

	</div>
</div>

<script id="project_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td ><div id="project_line" class="[?= szButton ?] buttonbar_button" value="[?= bCompleted ?]"></div></td>
		<td><span id="project_text" class="project_text">[?= szMemo ?]</span></td> 
		<td><div id="project_viewmore_[?= t ?]" class="list_viewmore" value="[?= nID ?]"></div></td>
	</tr>
</script>

</body>
</html>

