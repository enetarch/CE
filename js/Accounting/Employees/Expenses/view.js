webapp.pages.Accounting_Employees_Expense_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Employees_Expense_New");  }, 
		 titlebar_options : function ()
		{ 
			var me = webapp.pages.Accounting_Employees_Expense_View;	
			me.popOptions.toggle();
		},
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Employees_Expense_Edit"); },

	},

	popOptions : null,

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Expense_View;
		
		me.popOptions = webapp.popup ("options_panel_background"); 

		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.data_expense_header); 
		webapp.drawList (me.list_expense_detail); 
		webapp.drawData (me.data_expense_notes); 
	},
	
	data_expense_header : 
	{
		target : "expense_header",
		template : "expense_header_template",
		buttons : {},
		get_Data : "accounting::employees::expense::get",
		params : { nID : 123 },
	},
	
	list_expense_detail : 
	{
		table :  "expense_detail_list",

		header :
		{
			template : "expense_detail_list_header_template",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "expense_detail_list_row_template",
			template_empty : "expense_detail_list_empty_row_template",
			buttons : 
			{ 
				po_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Employees_Expense_View", nID);}, 
			},
			get_Data : "accounting::employees::expenses::items::list",
			szParams : 
			{ 
				szFilter: "", 
				sortBy : "",
			},
		},
		
		footer : 
		{
			template : "po_detail_list_footer_template",
			buttons : {},
			get_Data : "accounting::employees::expense::get",
		},

	},

	data_expense_notes : 
	{
		target : "expense_notes",
		template : "expense_notes_template",
		buttons : {},
		get_Data : "accounting::employees::expense::get",
		params : { nID : 123 },
	},
	
	
	// =================================================

	

	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Employees_Expense_View;

		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Empty = $("#" + me.template_List_Empty).html();
		
		$("#" + me.tblList).html (szTemplate_Header);
		$("#" + me.tblList).append (szTemplate_Empty);

		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	
};
