<html>
<head>
<title>Todo List</title>
</head>
<script src="js/DayTimer/Todos/list.js"></script>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class="titlebar_back"></div>
	<div id="titlebar_logo" class="titlebar_logo"></div>
	<div id="titlebar_name" class="titlebar_name">Todo List</div>

	<div id="titlebar_exit" class="titlebar_exit"></div>
	<div id="titlebar_options" class="titlebar_options"></div>
	<div id="titlebar_add" class="titlebar_add"></div>
	<div id="titlebar_calendar" class="titlebar_calendar"></div>
	
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_Todos" class="">

	<table id="todo_new" class="list_table">
		<tr>
			<td><div id="todo_complete_[?= t ?]" class="todo_complete buttonbar_checkbox_off buttonbar_button" type="checkbox" value="[?= bCompleted ?]"></div></td>
			<td><input id="field_search" type="text" size="19" value="" class="form_field_text"></td>
			<td><div id="button_add" class="buttonbar_add form_icon_add buttonbar_button buttonbar_float_right"></div></td>
		</tr>
	</table>
		
	<table id="todo_list" class="list_table">
	</table>

	</div>
</div>

<script id="todo_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td ><div id="todo_complete_[?= t ?]" class="todo_complete buttonbar_checkbox_off buttonbar_button" type="checkbox" value="[?= bCompleted ?]"></div></td>
		<td><span id="todo_text_[?= t ?]" class="todo_text">[?= szMemo ?]</span></td> 
		<td><div id="todo_viewmore_[?= t ?]" class="list_viewmore" value="[?= nID ?]"></div></td>
	</tr>
</script>

</body>
</html>

