webapp.pages.Accounting_Client_Edit =
	{
		btn_Back : "titlebar_back",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Update : "button_update",
		nID : 0,
		
		pageInit : function ()
		{
			var me = webapp.pages.Accounting_Client_Edit;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Update).click (function () { me.cmdUpdate (); } );

			me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.goBack (); },

		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },
		
		cmdUpdate : function ()
		{ 
			var me = webapp.pages.Accounting_Client_Edit;
			var objData = 
			{
				ID : 0,
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
			
			webapp.queryServer ("clients::add", szParams, function ()
				{ webapp.showPage ("Client_View", me.nID); });
		},

		cmdRefresh : function ()
		{ 
			var me = webapp.pages.Accounting_Client_Edit;
			
			var szParam = JSON.stringify ({ "nID" : me.nID } );
			
			webapp.queryServer ("client::get", szParam, me.draw_Client);
		},
		
		draw_Client : function (objJSON)
		{
			var me = webapp.pages.Accounting_Client_Edit;
			var objData = objJSON.return;
			
			$("#field_username").html (objData.username);
			$("#field_firstname").val (objData.firstname);
			$("#field_lastname").val (objData.lastname);
			$("#field_street1").val (objData.street1);
			$("#field_street2").val (objData.street2);
			$("#field_city").val (objData.city);
			$("#field_state").val (objData.state);
			$("#field_zip").val (objData.zip);
			$("#field_email").val (objData.email);
			$("#field_telephone").val (objData.telephone);
		}
	};
	
