webapp.pages.Security_Login =
{
	txt_username : "field_username",
	txt_password : "field_password",
	btn_submit : "button_submit",
	btn_forgotPSW : "button_forgotpsw",
	btn_register : "button_register",
	
	pageInit : function (szParams)
	{
		var me = webapp.pages.Security_Login;
		
		$("#" + me.btn_submit).click ( function () { me.cmdLogin (); } );
		$("#" + me.btn_register).click ( function () { me.cmdRegister (); } );
		$("#" + me.btn_forgotPSW).click ( function () { me.cmdForgotPSW (); } );
	},
	
	cmdLogin : function ()
	{
		var me = webapp.pages.Security_Login;
		
		var txtUID = $("#" + me.txt_username).val();
		var txtPSW = $("#" + me.txt_password).val();
		
		var szData = 
			"szUID=" + txtUID + "&" +
			"szPSW=" + txtPSW + "&";
			
		webapp.queryServer ("security::login", szData, me.cmdLogin_Success);
	},
	
	cmdLogin_Success : function (rtn)
	{
		if (rtn)
		{ webapp.showPage ("Home"); }
		else
		{ alert ("login failed"); }
	},

	cmdRegister : function ()
	{ webapp.showPage ("Security_Register"); },
	
	cmdForgotPSW : function ()
	{ webapp.showPage ("Security_ForgotPSW"); },
};

