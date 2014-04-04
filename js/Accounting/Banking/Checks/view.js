webapp.pages.Accounting_Banking_Check_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_Check_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Banking_Check_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Check_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_check); 
	},

	data_check : 
	{
		target : "panel_view_check",
		template : "view_check_template",
		buttons : {},
		get_Data : "accounting::banking::check::get",
		params : { nID : 123 },
	},




};
