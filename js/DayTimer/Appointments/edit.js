webapp.pages.DayTimer_Appointment_Edit = 
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("DayTimer_Appointment_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_save : function () { webapp.showPage ("DayTimer_Appointment_View"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Appointment_Edit;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data_appointment); 
	},

	data_appointment :
	{
		target : "appointment_new",
		template : "appointment_new_template",
		buttons :  
		{ 
			button_date : function () {},
			button_time : function () {},
			button_length : function () {},
		},
		get_Data : "daytimer::appointment::get",
		params : { nID : 0 },
	}

};
