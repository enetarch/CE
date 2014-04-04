webapp.pages.Accounting_Banking_Fee_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_Fee_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Banking_Fee_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Fee_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_fee); 
	},

	data_fee : 
	{
		target : "panel_view_fee",
		template : "view_fee_template",
		buttons : {},
		get_Data : "accounting::banking::fee::get",
		params : { nID : 123 },
	},




};
