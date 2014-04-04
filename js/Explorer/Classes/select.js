webapp.pages.Explorer_Classes_Select =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Explorer_Classes_Select;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Explorer_Classes_Select;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},

	list : 
	{
		table : "bank_list",

		row :
		{
			template : "class_list_row_template",
			buttons : 
			{ 
				bank_select :  function (nID) 
				{ 
					var me = webapp.pages.Explorer_Classes_Select;
					if (me.cbSelected)
						me.cbSelected (nID);
				}, 
			},
			get_Data : "explorer::classes::list",
		},
		
	},

};
