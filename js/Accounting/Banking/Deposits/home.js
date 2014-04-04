webapp.pages.Accounting_Banking_Deposits_Home =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_options : function () 
		 { 
				var me = webapp.pages.Accounting_Banking_Deposits_Home;
				me.popupOptions.toggle(); 
		},
		
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 
		 titlebar_refresh : function ()  
		{ 
			var me = webapp.pages.Accounting_Banking_Deposits_Home;
			webapp.drawList (me.list, ""); 
		},		

		 button_search : function ()  
		{ 
			var me = webapp.pages.Accounting_Banking_Deposits_Home;
			var szTerms = $("#" + me.btn_Search).val();
			
			var objData = { terms : szTerms };
			var szParams = JSON.stringify (objData);
			
			$("#" + me.tblBank_List).html ("");
			
			webapp.drawList (me.list, szParams); 
		},		
		
		button_AddItem : function () { webapp.showPage ("Accounting_Banking_Deposit_New"); },
		button_SortByInvoiceNo : function () {  },
		button_SortByName : function () {  },
		button_SortByTotal : function () { },
		button_SortByDate : function () {  },
	},

	popupOptions : null,

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Deposits_Home;
		me.popupOptions = new webapp.popup ("options_panel_background");
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.list); 
	},
	
	list : 
		{
			table :  "deposits_list",

			header :
			{
				template : "",
				buttons : {},
				get_Data : "",
			},
			
			row :
			{
				template : "deposits_list_row_template",
				buttons : 
				{ 
					bank_viewmore :  function (nID) 
					{ webapp.showPage ("Accounting_Banking_Deposit_View", nID);}, 
				},
				get_Data : "accounting::banking::deposits::list",
			},
			
			footer : 
			{
				template : "",
				buttons : {},
				get_Data : "",
			},
		},
	
};
