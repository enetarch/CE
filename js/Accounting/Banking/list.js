webapp.pages.Accounting_Banking_List =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Banking_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Banking_List;
				webapp.drawList (me.list); 
		 },
		 
		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Banking_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblBank_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},
		
		 button_Banks : function () { webapp.showPage ("Accounting_Banking_List"); },
		 button_Checks : function () { webapp.showPage ("Accounting_Banking_Checks"); },
		 button_Credits : function () { webapp.showPage ("Accounting_Banking_Credits");  },
		 button_Deposits : function () { webapp.showPage ("Accounting_Banking_Deposits");  },
		 button_Fees : function () { webapp.showPage ("Accounting_Banking_Fees");  },
		 button_Reimburse : function () { webapp.showPage ("Accounting_Banking_Reimburse");  },
		 button_Transfers : function () { webapp.showPage ("Accounting_Banking_Transfers");  },
		 button_Statement : function () { webapp.showPage ("Accounting_Banking_Statement");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "bank_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "bank_list_row_template",
			buttons : 
			{ 
				bank_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Banking_View", nID); }, 
			},
			get_Data : "accounting::banking::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
