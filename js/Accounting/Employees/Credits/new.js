webapp.pages.Accounting_Employees_Credit_New =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Employees_Credit_New;
			webapp.saveData (me.data_credit, "Accounting_Employees_Credit_View");
		},
	},

	popupEmployeeList : null,
	select_list :  "Accounting_Employees_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Credit_New;
		me.popupEmployeeList = webapp.popup ("employee_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_employee); 
		webapp.drawData (me.data_credit); 
	},

	data_employee : 
	{
		target :  "panel_new_employee",
		template : "new_employee_template",
		buttons : 
		{ 
			button_view_employees : function ()
			{ 
				var me = webapp.pages.Accounting_Employees_Credit_New;
				me.cmdListEmployees ();
			},
		},
		get_Data : "accounting::employees::get",
		params : { nID : 0 },
	},

	data_credit :
	{
		target :  "panel_new_credit",
		template : "new_credit_template",
		fields : 
		{
			field_employeeID : 0,
			field_no : "",
			field_date : "",
			field_to : "",
			field_Notes : "",
			field_Memo : "",
		},
		save_Data : "accounting::employees::credit::add",
		params : { nID : 0 },
	},
	
	cmdListEmployees : function () 
	{ 
		var me = webapp.pages.Accounting_Employees_Credit_New;
		
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
		var me = webapp.pages.Accounting_Employees_Credit_New;	
		me.popupEmployeeList.toggle(); 
	},
	
	cmdSelected : function (nID)
	{
		var me = webapp.pages.Accounting_Employees_Credit_New;	

		me.popupEmployeeList.toggle(); 
		
		me.data_employee.params.nID = nID;
		me.data_credit.fields.field_employee = nID;
		
		webapp.drawData (me.data_employee); 
	},

};
