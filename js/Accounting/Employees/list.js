webapp.pages.Accounting_Employees_List =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Employees_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Employees_List;
				webapp.drawList (me.list); 
		 },
		 
		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Employees_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblEmployee_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},
		
		 button_Employees : function () { webapp.showPage ("Accounting_Employees_List"); },
		 button_Checks : function () { webapp.showPage ("Accounting_Employees_Checks"); },
		 button_Credits : function () { webapp.showPage ("Accounting_Employees_Credits");  },
		 button_Deposits : function () { webapp.showPage ("Accounting_Employees_Deposits");  },
		 button_Fees : function () { webapp.showPage ("Accounting_Employees_Fees");  },
		 button_Reimburse : function () { webapp.showPage ("Accounting_Employees_Reimburse");  },
		 button_Transfers : function () { webapp.showPage ("Accounting_Employees_Transfers");  },
		 button_Statement : function () { webapp.showPage ("Accounting_Employees_Statement");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "employee_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "employee_list_row_template",
			buttons : 
			{ 
				employee_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Employees_View", nID); }, 
			},
			get_Data : "accounting::employees::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
