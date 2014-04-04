<html>
<head>
<title>Client List</title>
</head>

<body>
<div id="titlebar" class="">
	<div id="titlebar_back" class=""></div>
	<div id="titlebar_logo" class=""></div>
	<div id="titlebar_name" class="">Client List</div>

	<div id="titlebar_exit" class=""></div>
	<div id="titlebar_options" class=""></div>
	<div id="titlebar_add" class=""></div>
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
		
<table id="client_list" class="">
</table>

<script id="client_list_row_template" type="text/text">
	<tr class="seperator_line"><td colspan=3><!-- Seperator Line --></td></tr>
	<tr>
		<td colspan="2"><span id="company" class="">[?= company ?]</span></td> 
		<td rowspan ="2" id="moreinfo"><a id="client_[?= t ?]" href="javascript:void(0);" value="[?= ID ?]">&gt;</a></td>
	</tr>
	<tr>
		<td><span id="firstname" class="">[?= firstname ?]</span></td>
		<td><span id="lastname" class="">[?= lastname ?]</span></td>
	</tr>
</script>

	</div>
</div>

</body>
</html>

