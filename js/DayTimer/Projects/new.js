webapp.pages.DayTimer_Project_New = 
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("DayTimer_Project_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_save : function () { webapp.showPage ("DayTimer_Project_View"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Project_New;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data_appointment); 
	},

	data_appointment :
	{
		target : "project_new",
		template : "project_new_template",
		buttons :  
		{ 
			button_date : function () {},
			button_time : function () {},
			button_length : function () {},
		},
		get_Data : "daytimer::project::get",
		params : { nID : 0 },
	}

};
