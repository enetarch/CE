webapp.pages.DayTimer_Note_Edit = 
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("DayTimer_Note_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_save : function () { webapp.showPage ("DayTimer_Note_View"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.DayTimer_Note_Edit;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data_appointment); 
	},

	data_appointment :
	{
		target : "note_new",
		template : "note_new_template",
		buttons :  
		{ 
			button_date : function () {},
			button_time : function () {},
			button_length : function () {},
		},
		get_Data : "daytimer::note::get",
		params : { nID : 0 },
	}

};
