webapp.pages.Accounting_Employees_PayCheck_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Employees_PayCheck_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Employees_PayCheck_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_PayCheck_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_check); 
	},

	data_check : 
	{
		target : "panel_view_check",
		template : "view_PayCheck_template",
		buttons : {},
		get_Data : "accounting::employees::paycheck::get",
		params : { nID : 123 },
	},




};
