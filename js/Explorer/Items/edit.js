webapp.pages.Explorer_Item_Edit = 
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_options : function () { webapp.page_Options.show(); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		
		titlebar_save : function () 
		{
			var me = webapp.pages.Explorer_Item_Edit;
			var nID = $.cookie ("Explorer_View_Item:ID");

			me.field_list.row.data.nID = nID;

			me.field_list.row.data.fields = Array();
			$(".field_row").each ( function () 
			{ 
				var szField = $(this).find ("#field_name").text ();
				var szValue = $(this).find ("#field_value").text ();

				me.field_list.row.data.fields.push  
				( { 
					"szField" : szField, 
					"szValue" : szValue, 
				} );
			} );

			webapp.queryServer ("explorer::item::update", me.field_list.row.data);
		},
	},
	
	pageInit : function (szParams)
	{
		var me = webapp.pages.Explorer_Item_Edit;
		
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
		
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.field_list); 
		
		$(".field_data").each ( function () 
		{ $(this).attr ("contentEditable", "true"); } );
	},
	
	field_list : 
	{
		table :  "field_list",

		row :
		{
			template : "field_list_template",
			buttons : { },
			get_Data : "explorer::item::get",
			params : { nID : 0, },
			data : 
			{ 
				nID : 0 , 
				fields : Array (),
			},
		},
		
	},
	
};
