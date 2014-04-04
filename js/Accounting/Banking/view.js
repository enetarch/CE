webapp.pages.Accounting_Banking_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Banking_Edit"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Banking_List;
				webapp.drawData (me.data); 
		 },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_View;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data); 
	},

	data : 
	{
		template : "panel_view",
		buttons : {},
		get_Data : "accounting::banking::get",
	}

};
