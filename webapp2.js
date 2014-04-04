var webapp = 
{
	init : function (szPage) 
	{
		// show user authentication page
		var me = this;
		if (szPage.length == 0)
		{	me.page_Security_Login.show (); }
		else
		{ webapp ["page_" + szPage].show (); }
	},
	
	getPage : function (szPage, szParams, cbPageInit)
	{
			var szCommand = 
				"szCommand=getPage&" +
				"szPage=" + szPage + "&" +
				szParams;
				
			$.ajax (
			{
				url : "index.php",
				method : "POST",
				data : szCommand,
				success : function (szHtml) 
				{
					 $("body").html (szHtml + "<div id=\"debug\"></div>"); 
					 if (cbPageInit) 
						cbPageInit (); 
				},
				error : null,
			});
	},

	queryServer : function (szCommand, szParams, cb)
	{
			var szCommand = 
				"szCommand=" + szCommand + "&" +
				szParams;
				
			$.ajax (
			{
				url : "query.php",
				method : "POST",
				data : szCommand,
				success : function (szJSON) 
				{
					$("#debug").html ("szCommand = " + szCommand + "<BR> szJson = " + szJSON + "<BR>");
					
					 var objJSON = jQuery.parseJSON (szJSON);
					 if (cb) 
						cb (objJSON); 
				},
				error : null,
			});
	},
	
	jsonReplace : function (objData, szString)
	{
		// $("#debug").append ("<BR>" + objData.length);
		
		for (t=0; t<objData.length; t++)
		{
			szString = szString.Replace ("[?=" + objData.t.field + "]", objData.t.data);
		}
		return (szString);
	},
	
	// ========================================================
	
	page_Security_Login : 
	{
		szPageURL : "Security_Login",
		txt_username : "field_username",
		txt_password : "field_password",
		btn_submit : "button_submit",
		btn_forgotpsw : "button_forgotpsw",
		btn_register : "button_register",
		
		show : function ()
		{
			var me = webapp.page_Security_Login;
			
			webapp.getPage (me.szPageURL, "", me.pageInit);
		},
		
		pageInit : function ()
		{
			var me = webapp.page_Security_Login;
			
			btnSubmit = $("#" + me.btn_submit);
			btnSubmit.click ( function () { me.cmdLogin (); } );

			btnRegister = $("#" + me.btn_register);
			btnRegister.click ( function () { me.cmdRegister (); } );

			btnForgotPSW = $("#" + me.btn_forgotPSW);
			btnForgotPSW.click ( function () { me.cmdForgotPSW (); } );
		},
		
		cmdLogin : function ()
		{
			var me = webapp.page_Security_Login;
			
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
			{ webapp.page_Home.show(); }
			else
			{ alert ("login failed"); }
		},

		cmdRegister : function ()
		{ webapp.page_Register.show(); },
		
		cmdForgotPSW : function ()
		{ webapp.page_ForgotPSW.show(); },
	},
	
	page_Security_ForgotPSW :
	{
		szPageURL : "Security_ForgotPSW",
		show : function ()
		{
			var me = webapp.page_Security_ForgotPSW;
			
			webapp.getPage (me.szPageURL, "", me.pageInit);
		},
		
		pageInit : function ()
		{
		}
	},
	
	page_Security_Register :
	{
		szPageURL : "Security_Register",
		btn_Back : "titlebar_back",
		btn_Register : "button_register",
		panel_Register : "panel_register",
		
		show : function ()
		{
			var me = webapp.page_Security_Register;
			
			webapp.getPage (me.szPageURL, "", me.pageInit);
		},
		
		pageInit : function ()
		{
			var me = webapp.page_Security_Register;
			
			$("#" + me.panel_Register).css ("margin", "4px");
			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Register).click (function () { me.cmdRegister (); } );
		},
		
		cmdBack : function ()
		{ webapp.page_Login.show(); },
		
		cmdRegister : function ()
		{
			var szData = 
				"szUID=" + $("#" + me.field_username).val() + "&";
			
			webapp.queryServer ("security::login", szData, me.cmdLogin_Success);
		}
	},
	
	// ======================================================
	
	page_Home :
	{
		szPageURL : "Home",
		btn_Exit : "titlebar_exit",
		panel_Register : "panel_home",
		btn_Clients : "button_clients",
		btn_Locations : "", 
		btn_WorkOrders : "", 
		btn_Employees : "", 
		btn_Security : "", 
		btn_Inventory : "", 
		btn_Trucks : "", 
		btn_Timer : "", 
		
		show : function ()
		{
			var me = webapp.page_Home;
			
			webapp.getPage (me.szPageURL, "", me.pageInit);
		},

		pageInit : function ()
		{
			var me = webapp.page_Home;
			
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

			$("#" + me.btn_Clients).click (function () { me.cmdClients (); } );
			$("#" + me.btn_Locations).click (function () { me.cmdLocations (); } );
			$("#" + me.btn_WorkOrders).click (function () { me.cmdWorkOrders (); } );
			$("#" + me.btn_Employees).click (function () { me.cmdEmployees (); } );
			$("#" + me.btn_Security).click (function () { me.cmdSecurity (); } );
			$("#" + me.btn_Inventory).click (function () { me.cmdInventory (); } );
			$("#" + me.btn_Trucks).click (function () { me.cmdTrucks (); } );
			$("#" + me.btn_Timer).click (function () { me.cmdTimer (); } );
		},
		
		cmdClients : function ()
		{ webapp.page_Clients_List.show(); },

		cmdOptions : function ()
		{ webapp.page_Options.show(); },

		cmdExit : function ()
		{ webapp.page_Login.show(); },
		
	},
	
	// ======================================================
	
	page_Clients_List :
	{
		szPageURL : "Clients_List",
		btn_Back : "titlebar_back",
		btn_Refresh : "titlebar_refresh",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		panel_Home : "panel_home",
		template_List : "client_list_row_template", 
		tblClient_List : "client_list",
		
		show : function ()
		{
			var me = webapp.page_Clients_List;
			
			webapp.getPage (me.szPageURL, "", me.pageInit);
		},

		pageInit : function ()
		{
			var me = webapp.page_Clients_List;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Refresh).click (function () { me.cmdRefresh (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

			// me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.page_Home.show(); },

		cmdRefresh : function ()
		{ 
			var me = webapp.page_Clients_List;
			
			webapp.queryServer ("clients::list", "", me.draw_Clients);
		},
		
		cmdOptions : function ()
		{ webapp.page_Options.show(); },

		cmdExit : function ()
		{ webapp.page_Security_Login.show(); },
	
		draw_Clients : function (objJSON)
		{
			var clntData = objJSON.return;
			
			var me = webapp.page_Clients_List;
			
			// need to do some transforms on the JSON object here
			// then dump it out as HTML
			
			var szTemplate = $("#" + me.template_List).html();
			
			var szHTML = "";
			
			$("#debug").append ("<BR>" + clntData.length);
			
			for (t=0; t<clntData.length; t++)
			{
				// need to mangle the template here
			
				szReplaced = webapp.jsonReplace (clntData.t, szTemplate);
				szHTML += szReplaced;
			}
			
			$("#" + me.tblClient_List).html (szHTML);
		}
	}

	// ======================================================

};
