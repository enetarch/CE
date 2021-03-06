webapp.pages.Accounting_Vendors_Credit_Edit =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_save : function () 
		{ 
			var me = webapp.pages.Accounting_Vendors_Credit_Edit;
			webapp.saveData (me.data_credit, "Accounting_Vendors_Credit_View");
		},
	},

	popupVendorList : null,
	select_list :  "Accounting_Vendors_Select",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Credit_Edit;
		me.popupVendorList = webapp.popup ("vendor_list_panel_background"); 
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_vendor); 
		webapp.drawData (me.data_credit); 
	},

	data_vendor : 
	{
		target :  "panel_new_vendor",
		template : "new_vendor_template",
		buttons : 
		{ 
			button_view_vendors : function ()
			{ 
				var me = webapp.pages.Accounting_Vendors_Credit_Edit;
				me.cmdListVendors ();
			},
		},
		get_Data : "accounting::vendors::get",
		params : { nID : 123 },
	},

	data_credit :
	{
		target :  "panel_new_credit",
		template : "new_credit_template",
		fields : 
		{
			field_vendorID : 0,
			field_no : "",
			field_date : "",
			field_to : "",
			field_Notes : "",
			field_Memo : "",
		},
		save_Data : "accounting::vendors::credit::add",
		get_Data : "accounting::vendors::credit::get",
		params : { nID : 0 },
	},
	
	cmdListVendors : function () 
	{ 
		var me = webapp.pages.Accounting_Vendors_Credit_Edit;
		
		var szParams = "";
		webapp.loadPage
		(
			me.select_list, 
			szParams, 
			"vendor_list_panel", 
			function () 
			{ 
				me.popupVendorList.toggle();
				
				webapp.pages [me.select_list].cbClose = me.cmdClose;
				webapp.pages [me.select_list].cbSelected = me.cmdSelected;
			}
		);
	},		 

	cmdClose : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Credit_Edit;	
		me.popupVendorList.toggle(); 
	},
	
	cmdSelected : function (nID)
	{
		var me = webapp.pages.Accounting_Vendors_Credit_Edit;	

		me.popupVendorList.toggle(); 
		
		me.data_vendor.params.nID = nID;
		me.data_credit.fields.field_vendor = nID;
		
		webapp.drawData (me.data_vendor); 
	},

};
