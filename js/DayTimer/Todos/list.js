webapp.pages.DayTimer_Todos_List =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_calendar :  function () { webapp.showPage ("DayTimer_Todo_New");  }, 
		titlebar_add : function () { webapp.showPage ("DayTimer_Todo_New");  }, 
		titlebar_options : function () { webapp.page_Options.show(); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 
		button_add : function () {}, 
		button_search : function () 
		{ 
			var me = webapp.pages.DayTimer_Todos_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, szParams, me.draw_List);
		},
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Todos_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "todo_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "todo_list_row_template",
			buttons : 
			{ 
				todo_viewmore :  function (nID) 
				{ webapp.showPage ("DayTimer_Todo_View", nID); }, 
			},
			get_Data : "daytimer::todos::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},
	
};

