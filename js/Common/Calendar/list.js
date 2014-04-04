webapp.pages.Calendar_List =
	{
		btn_Back : "titlebar_back",
		btn_Logo : "titlebar_logo",
		btn_Add : "titlebar_add",
		btn_Refresh : "titlebar_refresh",
		btn_Options : "titlebar_options",
		btn_Exit : "titlebar_exit",
		btn_Update : "button_update",

		btn_Search : "button_search",		
		fld_Search : "field_search",

		template_List : "",
		tblList : "calendar_list",
		get_List :  "calendar::list",
		
		btn_view : "todo_viewmore",
		
		pageInit : function ()
		{
			var me = webapp.pages.Calendar_List;

			$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
			$("#" + me.btn_Logo).click (function () { me.cmdHome (); } );
			$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
			$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
			$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
			$("#" + me.btn_Update).click (function () { me.cmdUpdate (); } );

			me.cmdRefresh ();
		},

		cmdHome : function ()
		{ webapp.showPage ("Home"); },
		
		cmdBack : function ()
		{ webapp.goBack(); },

		cmdAdd : function ()
		{ webapp.showPage ("Todo_New"); },
		
		cmdSearch : function ()
		{
			var me = webapp.pages.Calendar_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, szParams, me.draw_List);
		}, 
		
		cmdRefresh : function ()
		{ 
			var me = webapp.pages.Calendar_List;
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, "", me.draw_List);
		},
		
		cmdOptions : function ()
		{ webapp.showPage ("Options"); },

		cmdExit : function ()
		{ webapp.showPage ("Security_Login"); },
	
		draw_List : function (objJSON)
		{
		},
		
		cmdView : function (nID)
		{
			szPage = "Get::AppropriatePage";
			szParams =  { nID : nID },
			cbPageInit = null;
			
			webapp.getPage (szPage, szParams, cbPageInit);
		}
	};
