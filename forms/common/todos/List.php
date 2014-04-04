<html>
<head>
<title>Todo List</title>
</head>

<body>
<div id="titlebar" class="titlebar">
	<div id="titlebar_back" class=""></div>
	<div id="titlebar_logo" class=""></div>
	<div id="titlebar_name" class="">Todo List</div>

	<div id="titlebar_exit" class=""></div>
	<div id="titlebar_options" class=""></div>
	<div id="titlebar_calendar" class=""></div>
</div>

<div id="data_panel" class="data_panel">
	<div id="panel_Todos" class="">

<table id="todo_new" class="list_table">
	<tr>
		<td><input id="todo_complete_[?= t ?]" class="todo_complete" type="checkbox" completed="[?= bCompleted ?]"></td>
		<td><input id="field_search" type="text" size="19" value="" class="form_text"></td>
		<td><div id="button_add" class="form_icon_add"></div></td>
	</tr>
</table>
		
<table id="todo_list" class="list_table">
</table>

<script id="todo_list_row_template" type="text/text">
	<tr class="list_seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td ><input id="todo_complete_[?= t ?]" class="todo_complete" type="checkbox" completed="[?= bCompleted ?]"></td>
		<td><span id="todo_text_[?= t ?]" class="todo_text">[?= szMemo ?]</span></td> 
		<td><div id="todo_viewmore_[?= t ?]" class="list_viewmore" value="[?= ID ?]"></div></td>
	</tr>
</script>

	</div>
</div>

</body>
</html>

