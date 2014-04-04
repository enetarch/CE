webapp.pages.Security_Register  =
{
	btn_Back : "titlebar_back",
	btn_Register : "button_register",
	panel_Register : "panel_register",
	
	pageInit : function ()
	{
		var me = webapp.pages.Security_Register;
		
		$("#" + me.panel_Register).css ("margin", "4px");
		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Register).click (function () { me.cmdRegister (); } );
	},
	
	cmdBack : function ()
	{ webapp.goBack (); },
	
	cmdRegister : function ()
	{
		var szData = 
			"szUID=" + $("#" + me.field_username).val() + "&";
		
		webapp.queryServer ("security::login", szData, me.cmdLogin_Success);
	}
};

