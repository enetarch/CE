webapp.pages.Explorer_Properties_Rename =
{
	buttons : 
	{
		button_close :  function ()
		{ 
			var me = webapp.pages.Explorer_Properties_Rename;
			
			if (me.cbClose) 
				me.cbClose ();
		},
	},
	
	cbClose : null,
	cbSelected : null,
		
	pageInit : function ()
	{
		var me = webapp.pages.Explorer_Properties_Rename;
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawData (me.rename_data); 
	},

	rename_data :
	{
		target :  "rename_panel",
		template : "rename_panel_template",
		get_Data : "explorer::properties::get",
		params : { nID : 0 },
	},
};
