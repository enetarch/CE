webapp.pages.DayTimer_Appointments_List = 
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("DayTimer_Appointment_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Appointments_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "appointment_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "appointment_list_row_template",
			buttons : 
			{ 
				appointment_viewmore :  function (nID) 
				{ webapp.showPage ("DayTimer_Appointment_View", nID); }, 
			},
			get_Data : "daytimer::appointments::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},
	
};
