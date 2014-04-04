webapp.pages.Accounting_Inventory_Catagories_List =
{
	btn_Back : "titlebar_back",
	btn_Logo : "titlebar_logo",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",

	btn_AddItem : "button_AddItem",
	btn_SortCatagory : "button_SortByCatagory",
	btn_SortName : "button_SortByName",

	btn_Search : "button_search",		

	fld_Search : "field_search",
	
	template_List : "Inventory_Catagories_list_row_template", 
	tblList : "Inventory_Catagories_list",
	get_List :  "accounting::inventory::catagories::list",
	btn_view : "button_viewmore",
	
	popOptions : null,
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Catagories_List;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Logo).click (function () { me.cmdHome (); } );
		$("#" + me.btn_Refresh).click (function () { me.cmdRefresh (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		
		$("#" + me.btn_Search).click (function () { me.cmdSearch (); } );
		
		me.popOptions = webapp.popup ("options_panel_background"); 

		$("#" + me.btn_AddItem).click (function () { me.cmdAddItem (); } );
		$("#" + me.btn_SortCatagory).click (function () { me.cmdSortCatagory (); } );
		$("#" + me.btn_SortName).click (function () { me.cmdSortName (); } );

		me.cmdRefresh ();
	},

	cmdAddItem : function () 
	{	webapp.showPage ("Accounting_Inventory_Catagory_New"); },
	
	cmdSortCatagory : function () 
	{ 
		var me = webapp.pages.Accounting_Inventory_Catagories_List;
		me.popOptions.hide ();
		me.cmdRefresh ();
	},
	
	cmdSortName : function () 
	{
		var me = webapp.pages.Accounting_Inventory_Catagories_List;
		me.popOptions.hide ();
		me.cmdRefresh ();
	},
	
	cmdHome : function ()
	{ webapp.showPage ("Home"); },

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdSearch : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Catagories_List;
		var szTerms = $("#" + me.btn_Search).val();
		
		var objData = { terms : szTerms };
		var szParams = JSON.stringify (objData);
		
		$("#" + me.tblClient_List).html ("");
		
		webapp.queryServer (me.get_List, szParams, me.draw_List);
	}, 
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Catagories_List;
		
		$("#" + me.tblList).html ("");
		
		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	cmdOptions : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Catagories_List;	
		me.popOptions.toggle();
	},

	cmdExit : function ()
	{ webapp.howPage ("Security_Login"); },

	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Inventory_Catagories_List;
		
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
			
			$("#" + me.btn_view + "_" + t).click ( function () 
				{ 
					var nID = $("#" + me.btn_view + "_" + t).prop ("value");
					me.cmdView (nID); 
				} );
		}
	},
	
	cmdView : function (nID)
	{	webapp.showPage ("Accounting_Inventory_Catagory_View", nID); }
};
