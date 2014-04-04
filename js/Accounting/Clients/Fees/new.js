webapp.pages.Accounting_Clients_Fee_New =
{
	btn_Back : "titlebar_back",
	btn_Exit : "titlebar_exit",
	
	get_Item :  "accounting::clients::fees::get",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Fee_New;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

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
