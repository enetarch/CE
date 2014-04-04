webapp.pages.WorkOrder_View =
	{
		btn_Back : "titlebar_back",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Edit : "titlebar_edit",

		btn_contactinfo : "buttonbar_contactinfo",
		btn_workorders : "buttonbar_workorders",
		btn_billing : "buttonbar_billing",
		btn_invoices : "buttonbar_invoices",
		btn_calllog : "buttonbar_calllog",
		btn_locations : "buttonbar_locations",
		btn_calendar : "buttonbar_calendar",

		btn_workorder : "buttonbar_workorder",
		btn_start : "buttonbar_start",
		btn_pause : "buttonbar_pause",
		btn_stop : "buttonbar_stop",
		btn_view_log : "buttonbar_log",
		btn_todos_b4 : "buttonbar_todos_B4",
		btn_todos_during : "buttonbar_todos_During",
		btn_todos_next : "buttonbar_todos_Next",
		btn_invoice : "buttonbar_invoice",

		btn_view_client : "button_view_client", 
		btn_assigntech : "button_view_technicians", 
		btn_dRequested : "button_dRequested", 
		btn_dScheduled : "button_dScheduled", 
		btn_tInTransit : "button_tInTransit", 
		btn_tArrived : "button_tArrived", 
		btn_dRequested : "button_dRequested", 
		btn_clients_notes : "button_clients_notes", 
		btn_tech_notes : "button_tech_notes", 
		btn_signature : "button_signature",

		field_szClient : "field_szClient", 
		field_szTechnician : "field_szTechnician", 
		field_dRequested : "field_dRequested", 
		field_dScheduled : "field_dScheduled", 
		field_tInTransit : "field_tInTransit", 
		field_tArrived : "field_tArrived", 
		field_bReturn : "field_bReturn", 
		field_dReturn : "field_dReturn", 
		field_szSignedBy : "field_szSignedBy", 
		field_dSigned : "field_dSigned", 

		nID : 0,
		
		show : function (nID)
		{
			var me = webapp.pages.WorkOrder_View;
			me.nID = nID;
			
			var objData = { ID :  me.nID };			
			var szParams = JSON.stringify ( objData );
			
			webapp.getPage (me.szPageURL, szParams, me.pageInit);
		},

		pageInit : function ()
		{
			var me = webapp.pages.WorkOrder_View;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Edit).click (function () { me.cmdEdit (me.nID); } );

			$("#" + me.btn_contactinfo).click (function () { me.cmdContactInfo (me.nID); } );
			$("#" + me.btn_workorders).click (function () { me.cmdWorkorders (me.nID); } );
			$("#" + me.btn_billing).click (function () { me.cmdBilling (me.nID); } );
			$("#" + me.btn_invoices).click (function () { me.cmdInvoices (me.nID); } );
			$("#" + me.btn_calllog).click (function () { me.cmdCalllog (me.nID); } );
			$("#" + me.btn_locations).click (function () { me.cmdLocations (me.nID); } );
			$("#" + me.btn_calendar).click (function () { me.cmdCalendar (me.nID); } );

			$("#" + me.btn_workorder).click (function () { me.cmdViewWorkOrder (me.nID); } );
			$("#" + me.btn_start).click (function () { me.cmdStart (me.nID); } );
			$("#" + me.btn_pause).click (function () { me.cmdPause (me.nID); } );
			$("#" + me.btn_stop).click (function () { me.cmdStop (me.nID); } );
			$("#" + me.btn_view_log).click (function () { me.cmdViewLog (me.nID); } );
			$("#" + me.btn_todos_b4).click (function () { me.cmdTodosB4 (me.nID); } );
			$("#" + me.btn_todos_during).click (function () { me.cmdTodos (me.nID); } );
			$("#" + me.btn_todos_next).click (function () { me.cmdTodosNext (me.nID); } );
			$("#" + me.btn_invoice).click (function () { me.cmdInvoice (me.nID); } );

			$("#" + me.btn_view_client).click (function () { me.cmdClient (me.nID); } );
			$("#" + me.btn_assigntech).click (function () { me.cmdAssignTech (me.nID); } );
			$("#" + me.btn_dRequested).click (function () { me.cmdAppointment (me.nID); } );
			$("#" + me.btn_dScheduled).click (function () { me.cmdSchedule (me.nID); } );
			$("#" + me.btn_tInTransit).click (function () { me.cmdInTransit (me.nID); } );
			$("#" + me.btn_tArrived).click (function () { me.cmdArrived (me.nID); } );
			$("#" + me.btn_dRequested).click (function () { me.cmdGetDate (me.nID); } );
			$("#" + me.btn_clients_notes).click (function () { me.cmdCustNotes (me.nID); } );
			$("#" + me.btn_tech_notes).click (function () { me.cmdTechNotes (me.nID); } );
			$("#" + me.btn_signature).click (function () { me.cmdGetSig (me.nID); } );

			me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.goBack (); },

		cmdEdit : function (nID)
		{ webapp.showPage ("Client_Edit", nID); },

		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },

		cmdRefresh : function ()
		{ 
			var me = webapp.pages.WorkOrder_View;
			
			var objData = { nID : me.nID };
			var szParam = JSON.stringify ( objData );
			
			webapp.queryServer ("client::get", szParam, me.draw_Client);
		},
		
		draw_Client : function (objJSON)
		{
			var me = webapp.pages.WorkOrder_View;
			var objData = objJSON.return;
			
			$("#field_szClient").html (objData.szClient);
			$("#field_szTechnician").html (objData.szTechnician);
			$("#field_dRequested").html (objData.dRequested);
			$("#field_dScheduled").html (objData.dScheduled);
			$("#field_tInTransit").html (objData.tInTransit);
			$("#field_tArrived").html (objData.tArrived);
			$("#field_tBegan").html (objData.tBegan);
			$("#field_tEnded").html (objData.tEnded);
			$("#field_bReturn").html (objData.bReturn);
			$("#field_dReturn").html (objData.dReturn);
			$("#field_szSignedBy").html (objData.szSignedBy);
			$("#field_dSigned").html (objData.dSigned);
			
		},
		
		cmdWorkorders : function (nID)
		{ webapp.showPage ("WorkOrders_List"); },
		
	};

