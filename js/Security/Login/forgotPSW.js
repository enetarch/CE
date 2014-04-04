webapp.pages.Security_ForgotPSW =
{
	btn_Back : "titlebar_back",

	pageInit : function ()
	{
		var me = webapp.pages.Security_ForgotPSW;
		
		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
	},
	
	cmdBack : function ()
	{ webapp.goBack (); },

};

