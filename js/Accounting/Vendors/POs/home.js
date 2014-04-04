webapp.pages.Accounting_Vendors_POs_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Vendors_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function ()
		{ 
			var me = webapp.pages.Accounting_Vendors_POs_Home;	
			me.popOptions.toggle();
		},
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_refresh : function ()  
		 { 	
				var me = webapp.pages.Accounting_Vendors_POs_Home;
				webapp.drawList (me.list); 
		 },
		 
		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Vendors_POs_Home;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			webapp.drawList (me.list, szParams); 
		},		

		button_AddItem : function ()	{ webapp.showPage ("Accounting_Vendors_PO_New"); },
		button_SortPONo : function () { },
		button_SortName : function () { },
		button_SortDate : function () { },
		button_SortTotal : function () { },

	},

	popOptions : null,

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_POs_Home;
		
		me.popOptions = webapp.popup ("options_panel_background"); 

		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
	{
		table :  "po_list",

		header :
		{
			template : "",
			buttons : {},
			get_Data : "",
		},
		
		row :
		{
			template : "po_list_row_template",
			buttons : 
			{ 
				po_viewmore :  function (nID) 
				{ webapp.showPage ("Accounting_Vendors_PO_View", nID);}, 
			},
			get_Data : "accounting::vendors::payments::list",
			szParams : 
			{ 
				szFilter: "", 
				sortBy : "",
			},
		},
		
		footer : 
		{
			template : "",
			buttons : {},
			get_Data : "",
		},

	},

};
