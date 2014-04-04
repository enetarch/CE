webapp.pages.Accounting_Vendors_List =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Vendors_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () { webapp.page_Options.show(); },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Vendors_List;
				webapp.drawList (me.list); 
		 },
		 
		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Vendors_List;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblVendor_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},
		
		 button_Vendors : function () { webapp.showPage ("Accounting_Vendors_List"); },
		 button_Payments : function () { webapp.showPage ("Accounting_Vendors_Payments"); },
		 button_Credits : function () { webapp.showPage ("Accounting_Vendors_Credits");  },
		 button_Deposits : function () { webapp.showPage ("Accounting_Vendors_Deposits");  },
		 button_Fees : function () { webapp.showPage ("Accounting_Vendors_Fees");  },
		 button_Reimburse : function () { webapp.showPage ("Accounting_Vendors_Reimburse");  },
		 button_Transfers : function () { webapp.showPage ("Accounting_Vendors_Transfers");  },
		 button_Statement : function () { webapp.showPage ("Accounting_Vendors_Statement");  },
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "vendor_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "vendor_list_row_template",
			buttons : 
			{ 
				vendor_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Vendors_View", nID); }, 
			},
			get_Data : "accounting::vendors::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
