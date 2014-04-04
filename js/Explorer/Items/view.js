webapp.pages.Explorer_Item_View = 
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_options : function () { webapp.page_Options.show(); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },

		titlebar_edit : function () 
		{ 
			var nID = $.cookie ("Explorer_View_Item:ID");
			webapp.showPage ("Explorer_Item_Edit", nID); 
		},
	},
	
	pageInit : function (szParams)
	{
		var me = webapp.pages.Explorer_Item_View;
		
		if (szParams)
		if (szParams.nID)
		{
			me.field_list.row.params.nID = szParams.nID;
			$.cookie ("Explorer_View_Item:ID", szParams.nID);
		}
		
		if (me.field_list.row.params.nID == 0)
		{
			if ($.cookie ("Explorer_View_Item:ID") )
			me.field_list.row.params.nID = $.cookie ("Explorer_View_Item:ID");
		}
		
		$("#debug").append (szParams + "<p>");
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.field_list); 
	},
	
	field_list : 
	{
		table :  "field_list",

		row :
		{
			template : "field_list_template",
			buttons : { },
			get_Data : "explorer::item::get",
			params : { nID :  0, }
		},
		
	},
	
};
