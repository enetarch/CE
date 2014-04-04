webapp.pages.Accounting_Vendors_Statements_Vendor =
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
			var me = webapp.pages.Accounting_Vendors_Statements_Vendor;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblVendor_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},
		
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Statements_Vendor;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "statement_detail_list",

		header :
		{
			template : "statement_detail_list_header_template",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "statement_detail_list_row_template",
			template_empty : "statement_detail_list_empty_row_template",
			buttons : 
			{ 
				button_view :  function (nID) 
				{ webapp.showPage ("Accounting_Vendors_Statements_Vendor", nID);}, 
			},
			get_Data : "accounting::vendors::statement::get",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
