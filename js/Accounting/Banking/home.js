webapp.pages.Accounting_Banking_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.showPage ("Options"); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		
		 button_Banks : function () { webapp.showPage ("Accounting_Banking_List"); },
		 button_Checks : function () { webapp.showPage ("Accounting_Banking_Checks_Home"); },
		 button_Credits : function () { webapp.showPage ("Accounting_Banking_Credits_Home");  },
		 button_Deposits : function () { webapp.showPage ("Accounting_Banking_Deposits_Home");  },
		 button_Fees : function () { webapp.showPage ("Accounting_Banking_Fees_Home");  },
		 button_Reimburse : function () { webapp.showPage ("Accounting_Banking_Reimbursements_Home");  },
		 button_Transfers : function () { webapp.showPage ("Accounting_Banking_Transfers_Home");  },
		 button_Statement : function () { webapp.showPage ("Accounting_Banking_Statements_Home");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Home;
		
		webapp.linkButtons (me.buttons);
	},
	
	
};
