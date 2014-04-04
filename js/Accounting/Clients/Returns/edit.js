webapp.pages.Accounting_Clients_Return_Edit =
	{
		btn_Back : "titlebar_back",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Add : "button_add",

		btn_Next : "button_next",
		
		pageInit : function ()
		{
			var me = webapp.pages.Accounting_Clients_Return_Edit;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Next).click (function () { me.cmdNext (); } );
		},

		cmdBack : function ()
		{ webapp.goBack (); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },
		
		cmdNext : function ()
		{ 
			var me = webapp.pages.Accounting_Clients_Return_Edit;
			
			var objData = 
			{
				ID : 0,
				username : "",
				password : "",
				firstname : "",
				lastname : "",
				street1 : "",
				street2 : "",
				city : "",
				state : "",
				zip : "",
				email : "",
				telephone : "",
			};

			objData.nID = me.nID;
			objData.username = $("#field_username").val ();
			objData.password = $("#field_password").val ();
			objData.firstname = $("#field_firstname").val ();
			objData.lastname = $("#field_lastname").val ();
			objData.street1 = $("#field_street1").val ();
			objData.street2 = $("#field_street2").val ();
			objData.city = $("#field_city").val ();
			objData.state = $("#field_state").val ();
			objData.zip = $("#field_zip").val ();
			objData.email = $("#field_email").val ();
			objData.telephone = $("#field_telephone").val ();
			
			var szParams = JSON.stringify (objData);
			// window.alert (szParams);
			
			webapp.queryServer ("accounting::clients::return::update", szParams, function (objJSON)
			{ 
				var nID = objJSON.return;
				
				webapp.showPage ("Accounting_Clients_Return_Edit2", nID); 
			});
		},
		
	};
