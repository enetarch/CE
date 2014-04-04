webapp.pages.Accounting_Client_View =
	{
		btn_Back : "titlebar_back",
		btn_Options : "titlebar_options",
		btn_Add : "titlebar_add",
		btn_Exit : "titlebar_exit",
		btn_Edit : "titlebar_edit",

		btn_contactinfo : "buttonbar_contactinfo",
		btn_workorders : "buttonbar_workorders",
		btn_billing : "buttonbar_billing",
		btn_invoices : "buttonbar_invoices",
		btn_calllog : "buttonbar_calllog",
		btn_locations : "buttonbar_locations",
		btn_calendar : "buttonbar_calendar",

		nID : 0,
		
		pageInit : function ()
		{
			var me = webapp.pages.Accounting_Client_View;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Edit).click (function () { me.cmdEdit (); } );

			$("#" + me.btn_contactinfo).click (function () { me.cmdContactInfo (me.nID); } );
			$("#" + me.btn_workorders).click (function () { me.cmdWorkorders (me.nID); } );
			$("#" + me.btn_billing).click (function () { me.cmdBilling (me.nID); } );
			$("#" + me.btn_invoices).click (function () { me.cmdInvoices (me.nID); } );
			$("#" + me.btn_calllog).click (function () { me.cmdCalllog (me.nID); } );
			$("#" + me.btn_locations).click (function () { me.cmdLocations (me.nID); } );
			$("#" + me.btn_calendar).click (function () { me.cmdCalendar (me.nID); } );

			me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.goBack (); },

		cmdEdit : function (nID)
		{ webapp.showPage ("Accounting_Client_Edit", nID); },

		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },

		cmdAdd : function ()
		{ webapp.showPage ("Accounting_Client_New"); },

		cmdRefresh : function ()
		{ 
			var me = webapp.pages.Accounting_Client_View;
			
			var objData = { nID : me.nID };
			var szParam = JSON.stringify ( objData );
			
			webapp.queryServer ("accounting::client::get", szParam, me.draw_Client);
		},
		
		draw_Client : function (objJSON)
		{
			var me = webapp.pages.Accounting_Client_View;
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
		
		cmdWorkorders : function (nID)
		{ webapp.showPage ("WorkOrders_List"); },
		
	};
	
