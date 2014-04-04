webapp.pages.Accounting_Vendors_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.showPage ("Options"); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		
		 button_Vendors : function () { webapp.showPage ("Accounting_Vendors_List"); },
		 button_Payments : function () { webapp.showPage ("Accounting_Vendors_Payments_Home"); },
		 button_Credits : function () { webapp.showPage ("Accounting_Vendors_Credits_Home");  },
		 button_POs : function () { webapp.showPage ("Accounting_Vendors_POs_Home");  },
		 button_Fees : function () { webapp.showPage ("Accounting_Vendors_Fees_Home");  },
		 button_Reimburse : function () { webapp.showPage ("Accounting_Vendors_Reimbursements_Home");  },
		 button_Statement : function () { webapp.showPage ("Accounting_Vendors_Statements_Home");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Home;
		
		webapp.linkButtons (me.buttons);
	},
	
	
};
