webapp.pages.Accounting_Banking_Deposit_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_Deposit_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Banking_Deposit_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Deposit_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_deposit); 
	},

	data_deposit : 
	{
		target : "panel_view_deposit",
		template : "view_deposit_template",
		buttons : {},
		get_Data : "accounting::banking::deposit::get",
		params : { nID : 123 },
	},




};
