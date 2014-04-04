webapp.pages.Todos_List =
	{
		btn_Back : "titlebar_back",
		btn_Add : "titlebar_add",
		btn_Refresh : "titlebar_refresh",
		btn_Calendar : "titlebar_calendar",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Update : "button_update",

		btn_Search : "button_search",		
		fld_Search : "field_search",

		template_List : "todo_list_row_template", 
		tblList : "todo_list",
		get_List :  "todos::list",
		
		btn_view : "todo_viewmore",
		
		pageInit : function ()
		{
			var me = webapp.pages.Todos_List;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
			$("#" + me.btn_Calendar).click (function () { me.cmdCalendar (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Update).click (function () { me.cmdUpdate (); } );

			me.cmdRefresh ();
		},

		cmdBack : function ()
		{ webapp.goBack (); },

		cmdAdd : function ()
		{ webapp.showPage ("Todo_New"); },
		
		cmdCalendar : function ()
		{ 
			var me = webapp.pages.Todos_List;
			webapp.showPage ("Calendar", me ); 
		},

		cmdSearch : function ()
		{
			var me = webapp.pages.Todos_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, szParams, me.draw_List);
		}, 
		
		cmdRefresh : function ()
		{ 
			var me = webapp.pages.Todos_List;
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, "", me.draw_List);
		},
		
		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },
	
		draw_List : function (objJSON)
		{
			var objData = objJSON.return;
			
			var me = webapp.pages.Todos_List;
			
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
		{
			webapp.showPage ("Todo_View", nID);
		}
	};
