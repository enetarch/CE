webapp.pages.Client_New =
	{
		szPageURL : "Client_New",
		btn_Back : "titlebar_back",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Add : "button_add",
		
		pageInit : function ()
		{
			var me = webapp.pages.Client_New;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
		},

		cmdBack : function ()
		{ webapp.goBack(); },

		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },
		
		cmdAdd : function ()
		{ 
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
			window.alert (szParams);
			
			webapp.queryServer ("clients::add", szParams, function (objJSON)
				{ 
					var nID = objJSON.return;
					
					webapp.showPage ("Client_View.show", nID); 
				});
		},
		
	};
