webapp.pages.Accounting_Employees_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.showPage ("Options"); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		
		 button_employees : function () { webapp.showPage ("Accounting_Employees_List"); },		 
		 button_credits : function () { webapp.showPage ("Accounting_Employees_Credits_Home");  },
		 button_fees : function () { webapp.showPage ("Accounting_Employees_Fees_Home");  },
		 button_expenses : function () { webapp.showPage ("Accounting_Employees_Expenses_Home");  },
		 button_paychecks : function () { webapp.showPage ("Accounting_Employees_Pays_Home");  },
		 button_reimburse : function () { webapp.showPage ("Accounting_Employees_Reimbursements_Home");  },
		 button_statements : function () { webapp.showPage ("Accounting_Employees_Statements_Home");  },
		 
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Home;
		
		webapp.linkButtons (me.buttons);
	},
	
	
};
