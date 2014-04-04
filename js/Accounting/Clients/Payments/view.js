webapp.pages.Accounting_Clients_Payment_View =
{
	btn_Back : "titlebar_back",
	btn_Exit : "titlebar_exit",
	btn_Edit : "titlebar_edit",
	
	get_Item :  "accounting::clients::payment:get",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Payment_View;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Edit).click (function () { me.cmdEdit (); } );
		
		me.popOptions = webapp.popup (me.popup_panel_background); 
		
		// me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack(); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdEdit : function (nID)
	{ webapp.showPage ("Accounting_Clients_Payment_Edit", nID); },
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Payment_View;
		
		var objData = { nID : me.nID };
		var szParam = JSON.stringify ( objData );
		
		webapp.queryServer ("client::get", szParam, me.draw_Client);
	},
	
	draw_Client : function (objJSON)
	{
		var me = webapp.pages.Accounting_Clients_Payment_View;
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
	
}

