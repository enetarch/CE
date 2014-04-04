webapp.pages.Accounting_Clients_Payment_Edit =
{
	btn_Back : "titlebar_back",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Add : "button_add",
	btn_Inventory : "button_inventory",
	btn_Done : "button_done",
	btn_Delete : "button_Delete",
	
	get_Item :  "accounting::clients::payments::get",
	update_Item :  "accounting::clients::payments::update",
	delete_Item :  "accounting::clients::payments::delete",
	
	select_list :  "Accounting_Inventory_Items_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Payment_Edit;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Payment_Edit;
		
		var objData = { nID : me.nID };
		var szParam = JSON.stringify ( objData );
		
		webapp.queryServer (me.get_Item, szParam, me.updateData);
	},
	
	updateData : function (objJSON)
	{
		var me = webapp.pages.Accounting_Clients_Payment_Edit;
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
