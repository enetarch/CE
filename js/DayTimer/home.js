webapp.pages.DayTimer_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.showPage ("Options"); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		
		 button_calendar : function () { webapp.showPage ("DayTimer_Appointments_List"); },
		 button_notes : function () { webapp.showPage ("DayTimer_Notes_List"); },
		 button_projects : function () { webapp.showPage ("DayTimer_Projects_List");  },
		 button_rolodex : function () { webapp.showPage ("DayTimer_Rolodex_List");  },
		 button_todos : function () { webapp.showPage ("DayTimer_Todos_List");  },
		 button_settings : function () { webapp.showPage ("DayTimer_Settings_Home");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Home;
		
		webapp.linkButtons (me.buttons);
	},
	
	
};
