webapp.pages.Accounting_Vendors_Reimbursement_View =
{
	buttons : 
	{
		 titlebar_back : function () { webapp.goBack();  },
		 titlebar_add : function () { webapp.showPage ("Accounting_Vendors_Reimbursement_New");  }, 
		 titlebar_home : function () { webapp.showPage ("Home");  },
		 titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 titlebar_edit : function () { webapp.showPage ("Accounting_Vendors_Reimbursement_Edit"); },
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Vendors_Reimbursement_View;
		
		webapp.linkButtons (me.buttons);
		webapp.drawData (me.data_reimbursement); 
	},

	data_reimbursement : 
	{
		target : "panel_view_reimbursement",
		template : "view_reimbursement_template",
		buttons : {},
		get_Data : "accounting::vendors::reimbursement::get",
		params : { nID : 123 },
	},




};
