webapp.pages.Accounting_Vendors_PO_Edit2 =
{
	btn_Back : "titlebar_back",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Add : "button_add",
	btn_Inventory : "button_inventory",
	btn_Done : "button_done",
	btn_Delete : "button_Delete",
	
	tblList : "po_detail_list",
	template_List : "po_detail_list_row_template", 
	template_List_Header : "po_detail_list_header_template", 
	template_List_Footer : "po_detail_list_footer_template", 
	template_List_Empty : "po_detail_list_empty_row_template",
	get_List :  "accounting::vendors::pos::items::list",
	add_Item :  "accounting::vendors::pos::item::add",
	delete_Item :  "accounting::vendors::pos::item::delete",
	
	popOptons : null,
	popup_panel_background : "inventory_panel_background",
	popup_panel : "inventory_panel", 
	select_list :  "Accounting_Inventory_Items_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
		$("#" + me.btn_Inventory).click (function () { me.cmdInventory (); } );
		$("#" + me.btn_Done).click (function () { me.cmdDone (); } );
		$("#" + me.btn_Delete).click (function () { me.cmdDelete (); } );

		me.popOptions = webapp.popup (me.popup_panel_background); 
		
		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdOptions : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		me.popOptions.toggle();
	},

	cmdInventory : function () 
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		
		var szParams = "";
		webapp.loadPage (me.select_list, szParams, me.popup_panel, me.cmdInventory_Loaded); 
	},

	cmdInventory_Loaded : function () 
	{
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		me.popOptions.toggle();
		
		webapp.pages [me.select_list].cbClose = me.cmdInventory_Close;
		webapp.pages [me.select_list].cbSelected = me.cmdInventory_Selected;
	},

	cmdInventory_Close : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		me.popOptions.toggle(); 
	},
	
	cmdInventory_Selected : function (nID)
	{
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		me.popOptions.toggle(); 
	},
	
	cmdDone : function ()
	{ webapp.showPage ("Accounting_Vendors_POs_List"); },
	
	cmdAdd : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		
		var objData = 
		{
			ID : 0,
			Quantity : "",
			PartNo : "",
			Description : "",
		};

		objData.nID = me.nID;
		objData.Quantity = $("#field_Quantity").val ();
		objData.PartNo = $("#field_PartNo").val ();
		objData.Description = $("#field_Description").val ();
		
		var szParams = JSON.stringify (objData);
		// window.alert (szParams);
		
		webapp.queryServer (me.add_Item, szParams, me.cmdRefresh);
	},
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;
		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Empty = $("#" + me.template_List_Empty).html();
		
		$("#" + me.tblList).html (szTemplate_Header);
		$("#" + me.tblList).append (szTemplate_Empty);
		
		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;
		
		// need to do some transforms on the JSON object here
		// then dump it out as HTML
		
		var szTemplate = $("#" + me.template_List).html();
		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Footer = $("#" + me.template_List_Footer).html();

		var szHTML = "";
		
		$("#debug").html ("<BR>" + objData.length);
		
		if (objData.length > 0)
		{
			$("#" + me.tblList).html (szTemplate_Header);

			for (var t=0; t<objData.length; t++)
			{
				// need to mangle the template here
				
				var regex = new RegExp ("/\[\?= t \?\]/", "g");
				
				szReplaced = webapp.jsonReplace2 (objData[t], szTemplate);
				
				szReplaced = szReplaced.replace ("[?= t ?]", t);
				// szReplaced = szReplaced.replace (regex, t);
				
				$("#" + me.tblList).append (szReplaced);
				
				$("#" + me.btn_Delete + "_" + t).click ( function () 
					{ 
						var nID = $("#" + me.btn_Delete + "_" + t).prop ("value");
						me.cmdDelete (nID); 
					} );
			}
			
			szReplaced = szTemplate_Footer.replace ("[?= nSubTotal ?]", 123.45);
			szReplaced = szReplaced.replace ("[?= nTax ?]", 12.45);
			szReplaced = szReplaced.replace ("[?= nTotal ?]", 456.78);

			$("#" + me.tblList).append (szReplaced);
		}
	},
	
	cmdDelete : function (nID)
	{
		var me = webapp.pages.Accounting_Vendors_PO_Edit2;	
		webapp.queryServer (me.delete_Item, nID, me.cmdRefresh);
	},
	
};
