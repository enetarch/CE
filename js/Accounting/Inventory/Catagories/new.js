webapp.pages.Accounting_Inventory_Catagory_New =
{
	btn_Back : "titlebar_back",
	btn_Add : "titlebar_add",
	btn_Edit : "titlebar_edit",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",

	btn_view : "button_viewmore",

	template_List : "Inventory_Item_template", 
	tblItem : "panel_inventory_item",
	get_Data :  "accounting::inventory::catagory::get",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Catagory_New;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Edit).click (function () { me.cmdEdit (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		
		$("#" + me.btn_view).click (function () { me.cmdCatagories (); } );

		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdOptions : function ()
	{ webapp.page_Options.show(); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },

	cmdEdit : function ()
	{ webapp.showPage ("Accounting_Inventory_Catagory_New"); },
	
	cmdCatagories : function ()
	{ webapp.showPage ("Accounting_Inventory_Catagories_Select"); },
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Inventory_Catagory_New;
		
		$("#" + me.tblList).html ("");
		
		webapp.queryServer (me.get_List, "", me.draw_Item);
	},
	
	draw_Item : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Inventory_Catagory_New;
		
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
};
