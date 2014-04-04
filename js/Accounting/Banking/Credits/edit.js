webapp.pages.Accounting_Banking_Credit_Edit =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Banking_Credit_Edit;
			webapp.saveData (me.data_credit, "Accounting_Banking_Credit_View");
		},
	},

	popupBankList : null,
	select_list :  "Accounting_Banking_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Banking_Credit_Edit;
		me.popupBankList = webapp.popup ("bank_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_bank); 
		webapp.drawData (me.data_credit); 
	},

	data_bank : 
	{
		target :  "panel_new_bank",
		template : "new_bank_template",
		buttons : 
		{ 
			button_view_banks : function ()
			{ 
				var me = webapp.pages.Accounting_Banking_Credit_Edit;
				me.cmdListBanks ();
			},
		},
		get_Data : "accounting::banking::get",
		params : { nID : 123 },
	},

	data_credit :
	{
		target :  "panel_new_credit",
		template : "new_credit_template",
		fields : 
		{
			field_bankID : 0,
			field_no : "",
			field_date : "",
			field_to : "",
			field_Notes : "",
			field_Memo : "",
		},
		save_Data : "accounting::banking::credit::add",
		get_Data : "accounting::banking::credit::get",
		params : { nID : 0 },
	},
	
	cmdListBanks : function () 
	{ 
		var me = webapp.pages.Accounting_Banking_Credit_Edit;
		
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
				webapp.pages [me.select_list].cbSelected = me.cmdSelected;
			}
		);
	},		 

	cmdClose : function ()
	{
		var me = webapp.pages.Accounting_Banking_Credit_Edit;	
		me.popupBankList.toggle(); 
	},
	
	cmdSelected : function (nID)
	{
		var me = webapp.pages.Accounting_Banking_Credit_Edit;	

		me.popupBankList.toggle(); 
		
		me.data_bank.params.nID = nID;
		me.data_credit.fields.field_bank = nID;
		
		webapp.drawData (me.data_bank); 
	},

};
