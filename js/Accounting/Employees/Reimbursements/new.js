webapp.pages.Accounting_Employees_Reimbursement_New =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Employees_Reimbursement_New;
			webapp.saveData (me.data_reimbursement, "Accounting_Employees_Reimbursement_View");
		},
	},

	popupEmployeeList : null,
	select_list :  "Accounting_Employees_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Reimbursement_New;
		me.popupEmployeeList = webapp.popup ("employee_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_employee); 
		webapp.drawData (me.data_reimbursement); 
	},

	data_employee : 
	{
		target :  "panel_new_employee",
		template : "new_employee_template",
		buttons : 
		{ 
			button_view_employees : function ()
			{ 
				var me = webapp.pages.Accounting_Employees_Reimbursement_New;
				me.cmdListEmployees ();
			},
		},
		get_Data : "accounting::employees::get",
		params : { nID : 0 },
	},

	data_reimbursement :
	{
		target :  "panel_new_reimbursement",
		template : "new_reimbursement_template",
		fields : 
		{
			field_employeeID : 0,
			field_no : "",
			field_date : "",
			field_to : "",
			field_Notes : "",
			field_Memo : "",
		},
		save_Data : "accounting::employees::reimbursement::add",
		params : { nID : 0 },
	},
	
	cmdListEmployees : function () 
	{ 
		var me = webapp.pages.Accounting_Employees_Reimbursement_New;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list, 
			szParams, 
			"employee_list_panel", 
			function () 
			{ 
				me.popupEmployeeList.toggle();
				
				webapp.pages [me.select_list].cbClose = me.cmdClose;
				webapp.pages [me.select_list].cbSelected = me.cmdSelected;
			}
		);
	},		 

	cmdClose : function ()
	{
		var me = webapp.pages.Accounting_Employees_Reimbursement_New;	
		me.popupEmployeeList.toggle(); 
	},
	
	cmdSelected : function (nID)
	{
		var me = webapp.pages.Accounting_Employees_Reimbursement_New;	

		me.popupEmployeeList.toggle(); 
		
		me.data_employee.params.nID = nID;
		me.data_reimbursement.fields.field_employee = nID;
		
		webapp.drawData (me.data_employee); 
	},

};
