webapp.pages.Accounting_Vendors_PO_New =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_add : function () { webapp.showPage ("Accounting_Vendors_PO_New");  }, 
		titlebar_options : function ()
		{ 
			var me = webapp.pages.Accounting_Vendors_PO_New;	
			me.popOptions.toggle();
		},
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () { webapp.showPage ("Accounting_Vendors_PO_View"); },
		button_inventory : function ()
		{
			var me = webapp.pages.Accounting_Vendors_PO_New;

			var szParams = "";
			webapp.loadPage ( me.select_list, szParams, "inventory_panel", 
				me.cmdInventory_Loaded );
		}
	},

	select_list : "Accounting_Inventory_Items_Select", 
	popOptions : null,

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_PO_New;
		
		me.popOptions = webapp.popup ("inventory_panel_background"); 

		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data_po_header); 
		webapp.drawList (me.list_po_detail); 
		webapp.drawData (me.data_po_notes); 
	},
	
	data_po_header : 
	{
		target : "po_header",
		template : "po_header_template",
		buttons : {},
		get_Data : "accounting::vendors::po::get",
		params : { nID : 123 },
	},
	
	list_po_detail : 
	{
		table :  "po_detail_list",

		header :
		{
			template : "po_detail_list_header_template",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "po_detail_list_row_template",
			template_empty : "po_detail_list_empty_row_template",
			buttons : 
			{ 
				po_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Vendors_PO_New", nID);}, 
			},
			get_Data : "accounting::vendors::pos::items::list",
			szParams : 
			{ 
				szFilter: "", 
				sortBy : "",
			},
		},
		
		footer : 
		{
			template : "po_detail_list_footer_template",
			buttons : {},
			get_Data : "accounting::vendors::po::get",
		},

	},

	data_po_notes : 
	{
		target : "po_notes",
		template : "po_notes_template",
		buttons : {},
		get_Data : "accounting::vendors::po::get",
		params : { nID : 123 },
	},
	
	
	// =================================================

	cmdInventory_Loaded : function () 
	{
		var me = webapp.pages.Accounting_Vendors_PO_New;	
		me.popOptions.toggle();
		
		webapp.pages [me.select_list].cbClose = me.cmdInventory_Close;
		webapp.pages [me.select_list].cbSelected = me.cmdInventory_Selected;
	},

	cmdInventory_Close : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_New;	
		me.popOptions.toggle(); 
	},
	
	cmdInventory_Selected : function (nID)
	{
		var me = webapp.pages.Accounting_Vendors_PO_New;	
		me.popOptions.toggle(); 
	},

	// =================================================

	

	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_New;

		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Empty = $("#" + me.template_List_Empty).html();
		
		$("#" + me.tblList).html (szTemplate_Header);
		$("#" + me.tblList).append (szTemplate_Empty);

		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	
};
