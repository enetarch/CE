webapp.pages.Accounting_Employees_Reimbursements_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () 
		 { 
				var me = webapp.pages.Accounting_Employees_Reimbursements_Home;
				me.popupOptions.toggle(); 
		},
		
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 
		 titlebar_refresh : function ()  
		{ 
			var me = webapp.pages.Accounting_Employees_Reimbursements_Home;
			webapp.drawList (me.list, ""); 
		},		

		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Employees_Reimbursements_Home;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblEmployee_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},		
		
		button_AddItem : function () { webapp.showPage ("Accounting_Employees_Reimbursement_New"); },
		button_SortByInvoiceNo : function () {  },
		button_SortByName : function () {  },
		button_SortByTotal : function () { },
		button_SortByDate : function () {  },
	},

	popupOptions : null,

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Reimbursements_Home;
		me.popupOptions = new webapp.popup ("options_panel_background");
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
		{
			table :  "reimbursements_list",

			header :
			{
				template : "",
				buttons : {},
				get_Data : "",
			},
			
			row :
			{
				template : "reimbursements_list_row_template",
				buttons : 
				{ 
					employee_viewmore :  function (nID) 
					{ webapp.showPage ("Accounting_Employees_Reimbursement_View", nID);}, 
				},
				get_Data : "accounting::employees::reimbursements::list",
			},
			
			footer : 
			{
				template : "",
				buttons : {},
				get_Data : "",
			},
		},
	
};
