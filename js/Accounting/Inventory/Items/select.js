webapp.pages.Accounting_Inventory_Items_Select =
{
	btn_Back : "button_back",
	btn_Exit : "button_close",
	btn_SortCatagory : "button_SortByCatagory",
	btn_SortName : "button_SortByName",
	
	btn_Options : "button_options",
	btn_SortCatagory : "button_SortByCatagory",
	btn_SortName : "button_SortByName",
	btn_SortPrice : "button_SortByPrice",
	
	btn_Search : "button_search",		
	btn_Select : "button_select",

	fld_Search : "field_search",
	
	template_List : "Inventory_Items_list_row_template", 
	tblList : "Inventory_items_list",
	get_List :  "accounting::inventory::items::list",
	
	cbClose : null,
	cbSelected : null,
		
	popOptions : null,
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Items_Select;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Search).click (function () { me.cmdSearch (); } );
		
		$("#" + me.btn_SortCatagory).click (function () { me.cmdSortCatagory (); } );
		$("#" + me.btn_SortName).click (function () { me.cmdSortName (); } );

		me.popOptions = webapp.popup ("inventory_options_panel_background"); 

		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_SortCatagory).click (function () { me.cmdSortCatagory (); } );
		$("#" + me.btn_SortName).click (function () { me.cmdSortName (); } );
		$("#" + me.btn_SortPrice).click (function () { me.cmdSortPrice (); } );

		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },
	
	cmdExit : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		
		if (me.cbClose) 
			me.cbClose ();
	},

	cmdOptions : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Items_Select;	
		me.popOptions.toggle();
	},

	cmdSortCatagory : function () 
	{ 
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		me.popOptions.hide ();
		me.cmdRefresh ();
	},
	
	cmdSortName : function () 
	{
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		me.popOptions.hide ();
		me.cmdRefresh ();
	},
	
	cmdSortPrice : function () 
	{
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		me.popOptions.hide ();
		me.cmdRefresh ();
	},
	
	cmdSearch : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		var szTerms = $("#" + me.btn_Search).val();
		
		var objData = { terms : szTerms };
		var szParams = JSON.stringify (objData);
		
		$("#" + me.tblClient_List).html ("");
		
		webapp.queryServer (me.get_List, szParams, me.draw_List);
	}, 
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		
		$("#" + me.tblList).html ("");
		
		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Inventory_Items_Select;
		
		// need to do some transforms on the JSON object here
		// then dump it out as HTML
		
		var szTemplate = $("#" + me.template_List).html();
		
		var szHTML = "";
		
		$("#debug").html ("<BR>" + objData.length);
		
		for (var t=0; t<objData.length; t++)
		{
			// need to mangle the template here
			
			szReplaced = webapp.jsonReplace (objData[t], szTemplate);
			szReplaced = szReplaced.replace ("[?= t ?]", t);
			
			$("#" + me.tblList).append (szReplaced);
			
			$("#" + me.btn_Select + "_" + t).click ( function (ths) 
				{ 
					var nID = $(this).prop ("value");
					me.cmdSelect (nID); 
				} );
		}
	},
	
	cmdSelect : function (nID)
	{	
		var me = webapp.pages.Accounting_Inventory_Items_Select;

		if (me.cbSelected) 
			me.cbSelected (nID);		
	}
	
};
