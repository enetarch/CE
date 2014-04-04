webapp.pages.Accounting_Banking_Select =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Accounting_Banking_Select;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Select;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},

	list : 
	{
		table : "bank_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "bank_list_row_template",
			buttons : 
			{ 
				bank_select :  function (nID) 
				{ 
					var me = webapp.pages.Accounting_Banking_Select;
					if (me.cbSelected)
						me.cbSelected (nID);
				}, 
			},
			get_Data : "accounting::banking::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
