webapp.pages.Accounting_Clients_Fee_Edit =
{
	btn_Back : "titlebar_back",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Add : "button_add",
	btn_Inventory : "button_inventory",
	btn_Done : "button_done",
	btn_Delete : "button_Delete",
	
	tblList : "invoice_detail_list",
	template_List : "invoice_detail_list_row_template", 
	template_List_Header : "invoice_detail_list_header_template", 
	template_List_Footer : "invoice_detail_list_footer_template", 
	template_List_Empty : "invoice_detail_list_empty_row_template",
	get_List :  "accounting::clients::invoices::items::list",
	add_Item :  "accounting::clients::invoices::item::add",
	delete_Item :  "accounting::clients::invoices::item::delete",
	
	popOptons : null,
	popup_panel_background : "inventory_panel_background",
	popup_panel : "inventory_panel", 
	select_list :  "Accounting_Inventory_Items_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Fee_Edit;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

		me.popOptions = webapp.popup (me.popup_panel_background); 
		
		// me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Client_View;
		
		var objData = { nID : me.nID };
		var szParam = JSON.stringify ( objData );
		
		webapp.queryServer ("client::get", szParam, me.draw_Client);
	},
	
	draw_Client : function (objJSON)
	{
		var me = webapp.pages.Client_View;
		var objData = objJSON.return;
		
		$("#field_username").html (objData.username);
		$("#field_firstname").html (objData.firstname);
		$("#field_lastname").html (objData.lastname);
		$("#field_street1").html (objData.street1);
		$("#field_street2").html (objData.street2);
		$("#field_city").html (objData.city);
		$("#field_state").html (objData.state);
		$("#field_zip").html (objData.zip);
		$("#field_email").html (objData.email);
		$("#field_telephone").html (objData.telephone);
	},
	

};
