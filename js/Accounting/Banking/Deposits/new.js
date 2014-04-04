webapp.pages.Accounting_Banking_Deposit_New =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Banking_Deposit_New;
			webapp.saveData (me.data_deposit, "Accounting_Banking_Deposit_View");
		},
		button_view_payments : function () 
		{ 
			var me = webapp.pages.Accounting_Banking_Deposit_New;
			me.cmdListChecks ();
		},

	},

	popupBankList : null,
	popupCheckList : null,
	select_list_banks :  "Accounting_Banking_Select",
	select_list_checks :  "Accounting_Clients_Payments_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Deposit_New;
		me.popupBankList = webapp.popup ("bank_list_panel_background"); 
		me.popupCheckList = webapp.popup ("check_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_bank); 
		webapp.drawList (me.list_checks); 
		webapp.drawData (me.data_deposit); 
	},

	// ==================================================
	
	data_bank : 
	{
		target :  "panel_new_bank",
		template : "new_bank_template",
		buttons : 
		{ 
			button_view_banks : function ()
			{ 
				var me = webapp.pages.Accounting_Banking_Deposit_New;
				me.cmdListBanks ();
			},
		},
		get_Data : "accounting::banking::get",
		params : { nID : 0 },
	},

	list_checks : 
	{
		table :  "deposits_list",
		row : 
		{
			template : "checks_list_row_template",
			buttons : 
			{ 
				button_check_remove : function ()
				{ 
					var me = webapp.pages.Accounting_Banking_Deposit_New;
					me.cmdRemoveCheck ();
				},
			},
			get_Data : "accounting::banking::deposits::checks::list",
			remove_Data : "accounting::banking::deposits::check::delete",
			params : { nID : 0 },
		},
	},

	data_deposit :
	{
		target :  "panel_new_deposit",
		template : "new_deposit_template",
		fields : 
		{
			field_bankID : 0,
			field_no : "",
			field_date : "",
			field_to : "",
			field_Notes : "",
			field_Memo : "",
		},
		get_Data : "accounting::banking::deposit::get",
		save_Data : "accounting::banking::deposit::add",
		params : { nID : 0 },
	},
	
	// ==================================================
	
	cmdListBanks : function () 
	{ 
		var me = webapp.pages.Accounting_Banking_Deposit_New;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list_banks, 
			szParams, 
			"bank_list_panel", 
			function () 
			{ 
				me.popupBankList.toggle();
				
				webapp.pages [me.select_list_banks].cbClose = me.cmdClose_Banks;
				webapp.pages [me.select_list_banks].cbSelected = me.cmdSelected_Banks;
			}
		);
	},		 

	cmdClose_Banks : function ()
	{
		var me = webapp.pages.Accounting_Banking_Deposit_New;	
		me.popupBankList.toggle(); 
	},
	
	cmdSelected_Banks : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Deposit_New;	

		me.popupBankList.toggle(); 
		
		me.data_bank.params.nID = nID;
		me.data_deposit.fields.field_bank = nID;
		
		webapp.drawData (me.data_bank); 
	},

	// ==================================================

	cmdRemoveCheck : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Deposit_New;	

		var szParams = { "nID" : nID };
		webapp.queryServer 
		(
			me.list_checks.row.remove_Data, 
			szParams, 
			function ()
			{ webapp.drawList (me.data_checks); }
		);
	},

	// ==================================================
	
	cmdListChecks : function () 
	{ 
		var me = webapp.pages.Accounting_Banking_Deposit_New;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list_checks, 
			szParams, 
			"check_list_panel", 
			function () 
			{ 
				me.popupCheckList.toggle();
				
				webapp.pages [me.select_list_checks].cbClose = me.cmdClose_Checks;
				webapp.pages [me.select_list_checks].cbSelected = me.cmdSelected_Checks;
				webapp.pages [me.select_list_checks].cbUnSelected = me.cmdUnSelected_Checks;
			}
		);
	},		 
	
	cmdClose_Checks : function ()
	{
		var me = webapp.pages.Accounting_Banking_Deposit_New;	
		me.popupCheckList.toggle(); 
	},
	
	cmdSelected_Checks : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Deposit_Edit;	

		var szParams = { "nID" : nID };
		webapp.queryServer 
		(
			me.list_checks.row.add_Data, 
			szParams, 
			function ()
			{ webapp.drawList (me.data_checks); }
		);
	},

	cmdUnSelected_Checks : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Deposit_Edit;	

		var szParams = { "nID" : nID };
		webapp.queryServer 
		(
			me.list_checks.row.delete_Data, 
			szParams, 
			function ()
			{ webapp.drawList (me.data_checks); }
		);
	},
};
