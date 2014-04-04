webapp.pages.Accounting_Vendors_Credit_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Vendors_Credit_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Vendors_Credit_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Credit_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_credit); 
	},

	data_credit : 
	{
		target : "panel_view_credit",
		template : "view_credit_template",
		buttons : {},
		get_Data : "accounting::vendors::credit::get",
		params : { nID : 123 },
	},




};
