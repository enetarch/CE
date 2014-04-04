webapp.pages.WorkOrders_List =
	{
		btn_Back : "titlebar_back",
		btn_Add : "titlebar_add",
		btn_Refresh : "titlebar_refresh",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Update : "button_update",

		btn_Search : "button_search",		
		fld_Search : "field_search",

		template_List : "workorders_list_row_template",
		tblList : "workorders_list",
		get_List :  "workorders::list",
		
		btn_view : "button_viewmore",
		objReturnTo : null,
		
		pageInit : function ()
		{
			var me = webapp.pages.WorkOrders_List;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Update).click (function () { me.cmdUpdate (); } );

			me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.goBack (); },


		cmdRefresh : function ()
		{ 
			var me = webapp.pages.WorkOrders_List;
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, "", me.draw_List);
		},
		
		draw_List : function (objJSON)
		{
			var objData = objJSON.return;
			
			var me = webapp.pages.WorkOrders_List;
			
			// need to do some transforms on the JSON object here
			// then dump it out as HTML
			
			var szTemplate = $("#" + me.template_List).html();
			
			var szHTML = "";
			
			$("#debug").html ("<BR>" + objData.length);
			
			for (var t=0; t<objData.length; t++)
			{
				// need to mangle the template here
				
				szReplaced = webapp.jsonReplace (objData[t], szTemplate);
				var find = new RegExp ("[?= t ?]", "g");
				szReplaced = szReplaced.replace ("[?= t ?]", t);
				
				$("#" + me.tblList).append (szReplaced);
				
				$("#" + me.btn_view + "_" + t).click ( function () 
					{ 
						var nID = $("#" + me.btn_view + "_" + t).prop ("value");
						me.cmdView (nID); 
					} );
			}
		},
		
		cmdView : function (nID)
		{	webapp.showPage ("WorkOrder_View", nID); }
	};
