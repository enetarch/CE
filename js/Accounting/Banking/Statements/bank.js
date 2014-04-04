webapp.pages.Accounting_Banking_Statements_Bank =
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
			var me = webapp.pages.Accounting_Banking_Statements_Bank;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblBank_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},
		
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Statements_Bank;
		
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
				bank_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Banking_Statements_Bank", nID);}, 
			},
			get_Data : "accounting::banking::statement::get",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
