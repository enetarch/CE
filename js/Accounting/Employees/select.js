webapp.pages.Accounting_Employees_Select =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Accounting_Employees_Select;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Employees_Select;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},

	list : 
	{
		table : "employee_list",

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
				employee_select :  function (nID) 
				{ 
					var me = webapp.pages.Accounting_Employees_Select;
					if (me.cbSelected)
						me.cbSelected (nID);
				}, 
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
