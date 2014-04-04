webapp.pages.Accounting_Clients_Payments_Select =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Accounting_Clients_Payments_Select;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
	cbUnSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Payments_Select;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},

	list : 
	{
		table : "payment_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "payment_list_row_template",
			buttons : 
			{ 
				check_select :  function (nID) 
				{ 
					var me = webapp.pages.Accounting_Clients_Payments_Select;
					if (me.cbSelected)
						me.cbSelected (nID);
				}, 
			},
			get_Data : "accounting::clients::payments::list",
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
