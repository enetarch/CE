webapp.pages.DayTimer_Projects_List =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_calendar :  function () { webapp.showPage ("DayTimer_Project_New");  }, 
		titlebar_add : function () { webapp.showPage ("DayTimer_Project_New");  }, 
		titlebar_options : function () { webapp.page_Options.show(); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 
		button_add : function () {}, 
		
		button_search : function () 
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblList).html ("");
			
			webapp.queryServer (me.get_List, szParams, me.draw_List);
		},
		
		button_showlist_2 :  function () 
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			me.popupOptions.toggle ();
		},
		
		button_folder_x :   function () 
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			me.popupOptions.toggle ();
			$("#button_addtype").removeClass (me.currentAddType).addClass ("buttonbar_folder");
			me.currentAddType = "buttonbar_folder";
		},

		button_note_x :  function () 
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			me.popupOptions.toggle ();
			$("#button_addtype").removeClass (me.currentAddType).addClass ("buttonbar_notes");
			me.currentAddType = "buttonbar_notes";
			
		},
		
		button_todo_x :  function ()
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			me.popupOptions.toggle ();
			$("#button_addtype").removeClass (me.currentAddType).addClass ("buttonbar_checkbox_on");
			me.currentAddType = "buttonbar_checkbox_on";
		},
		
		button_appointment_x :  function ()
		{ 
			var me = webapp.pages.DayTimer_Projects_List;
			me.popupOptions.toggle ();
			$("#button_addtype").removeClass (me.currentAddType).addClass ("buttonbar_calendar");
			me.currentAddType = "buttonbar_calendar";
		},
		
		button_add :  function () {},
	},
	
	popupOptions : null,
	currentAddType : "buttonbar_CheckBox_On",

	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Projects_List;
		// me.popupOptions = new webapp.popup ("options_panel_background");
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "project_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "project_list_row_template",
			buttons : 
			{ 
				project_viewmore :  function (nID) 
				{ webapp.showPage ("DayTimer_Project_View", nID); }, 
			},
			get_Data : "daytimer::projects::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},
	
};

