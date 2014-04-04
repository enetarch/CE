webapp.pages.Accounting_Employees_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Employees_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Employees_Edit"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Employees_View;
				webapp.drawData (me.data); 
		 },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_View;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data); 
	},

	data : 
	{
		template : "panel_view",
		buttons : {},
		get_Data : "accounting::employees::get",
	}

};
