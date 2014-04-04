webapp.pages.Accounting_Banking_Transfer_New =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Banking_Transfer_New;
			webapp.saveData (me.data_transfer, "Accounting_Banking_Transfer_View");
		},
	},

	popupBankList : null,
	select_list :  "Accounting_Banking_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Transfer_New;
		me.popupBankList = webapp.popup ("bank_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_bank_from); 
		webapp.drawData (me.data_bank_to); 
		webapp.drawData (me.data_transfer); 
	},

	data_bank_from : 
	{
		target :  "panel_new_bankfrom",
		template : "new_bankfrom_template",
		buttons : 
		{ 
			button_view_banks_from : function ()
			{ 
				var me = webapp.pages.Accounting_Banking_Transfer_New;
				me.cmdListBanks_from ();
			},
		},
		get_Data : "accounting::banking::get",
		params : { nID : 123 },
	},

	data_bank_to : 
	{
		target :  "panel_new_bankto",
		template : "new_bankto_template",
		buttons : 
		{ 
			button_view_banks_to : function ()
			{ 
				var me = webapp.pages.Accounting_Banking_Transfer_New;
				me.cmdListBanks_to ();
			},
		},
		get_Data : "accounting::banking::get",
		params : { nID : 246 },
	},

	data_transfer_type : 
	{
		target :  "panel_new_transfer_type",
		template : "new_transfer_type_template",
		buttons : 
		{ 
			button_view_transfer_types : function ()
			{ 
				var me = webapp.pages.Accounting_Banking_Transfer_New;
				me.cmdListBanks_to ();
			},
		},
		get_Data : "accounting::banking::transfers::types::get",
		params : { nID : 246 },
	},

	data_transfer :
	{
		target :  "panel_new_transfer",
		template : "new_transfer_template",
		fields : 
		{
			field_bank_fromID : 0,
			field_bank_toID : 0,
			field_no : "",
			field_date : "",
			field_Notes : "",
			field_Memo : "",
		},
		save_Data : "accounting::banking::transfer::add",
		get_Data : "accounting::banking::transfer::get",
		params : { nID : 0 },
	},
	
	cmdListBanks_from : function () 
	{ 
		var me = webapp.pages.Accounting_Banking_Transfer_New;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list, 
			szParams, 
			"bank_list_panel", 
			function () 
			{ 
				me.popupBankList.toggle();
				
				webapp.pages [me.select_list].cbClose = me.cmdClose;
				webapp.pages [me.select_list].cbSelected = me.cmdSelected_from;
			}
		);
	},		 

	cmdListBanks_to : function () 
	{ 
		var me = webapp.pages.Accounting_Banking_Transfer_New;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list, 
			szParams, 
			"bank_list_panel", 
			function () 
			{ 
				me.popupBankList.toggle();
				
				webapp.pages [me.select_list].cbClose = me.cmdClose;
				webapp.pages [me.select_list].cbSelected = me.cmdSelected_to;
			}
		);
	},		 

	cmdClose : function ()
	{
		var me = webapp.pages.Accounting_Banking_Transfer_New;	
		me.popupBankList.toggle(); 
	},
	
	cmdSelected_from : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Transfer_New;	

		me.popupBankList.toggle(); 
		
		me.data_bank_from.params.nID = nID;
		me.data_transfer.fields.field_bank_from = nID;
		
		webapp.drawData (me.data_bank_from); 
	},

	cmdSelected_to : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Transfer_New;	

		me.popupBankList.toggle(); 
		
		me.data_bank_to.params.nID = nID;
		me.data_transfer.fields.field_bank_to = nID;
		
		webapp.drawData (me.data_bank_to); 
	},

};
