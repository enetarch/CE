webapp.pages.Accounting_Vendors_Payments_List =
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
				var me = webapp.pages.Accounting_Vendors_Payments_List;
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
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Payments_List;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "payments_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "payments_list_row_template",
			buttons : 
			{ 
				vendor_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Vendors_View", nID);}, 
			},
			get_Data : "accounting::vendors::payments::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
