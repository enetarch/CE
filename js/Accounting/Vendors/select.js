webapp.pages.Accounting_Vendors_Select =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Accounting_Vendors_Select;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Select;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},

	list : 
	{
		table : "vendor_list",

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
				vendor_select :  function (nID) 
				{ 
					var me = webapp.pages.Accounting_Vendors_Select;
					if (me.cbSelected)
						me.cbSelected (nID);
				}, 
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
