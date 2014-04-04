webapp.pages.Accounting_Banking_Transfer_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_Transfer_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Banking_Transfer_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Transfer_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_transfer); 
	},

	data_transfer : 
	{
		target : "panel_view_transfer",
		template : "view_transfer_template",
		buttons : {},
		get_Data : "accounting::banking::transfer::get",
		params : { nID : 123 },
	},


};
