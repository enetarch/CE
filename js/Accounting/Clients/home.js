webapp.pages.Accounting_Clients_Home =
{
	szPageURL : "Home",
	btn_Back : "titlebar_back",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	
	btn_Clients : "button_Clients",
	btn_Invoice : "button_Invoice",
	btn_Quote : "button_Quote",
	btn_Return : "button_Return",
	btn_Order : "button_Order",
	btn_Credit : "button_Credit",
	btn_Reimburse : "button_Reimburse",
	btn_Payment : "button_Payment",
	btn_Overdue : "button_Overdue",
	btn_Fees : "button_Fees",
	btn_Statement : "button_Statement",
	
	show : function ()
	{
		var me = webapp.pages.Accounting_Clients_Home;
		
		webapp.getPage (me.szPageURL, "", me.pageInit);
	},

	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Home;
		
		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Logo).click (function () { me.cmdHome (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

		$("#" + me.btn_Clients).click (function () { me.cmdClients (); } );
		$("#" + me.btn_Invoice).click (function () { me.cmdInvoice (); } );
		$("#" + me.btn_Quote).click (function () { me.cmdQuote (); } );
		$("#" + me.btn_Return).click (function () { me.cmdReturn (); } );
		$("#" + me.btn_Order).click (function () { me.cmdOrder (); } );
		$("#" + me.btn_Credit).click (function () { me.cmdCredit (); } );
		$("#" + me.btn_Reimburse).click (function () { me.cmdReimburse (); } );
		$("#" + me.btn_Payment).click (function () { me.cmdPayment (); } );
		$("#" + me.btn_Overdue).click (function () { me.cmdOverdue (); } );
		$("#" + me.btn_Fees).click (function () { me.cmdFees (); } );
		$("#" + me.btn_Statement).click (function () { me.cmdStatement (); } );
		
	},
	
	cmdBack : function ()
	{ webapp.goBack(); },

	cmdHome : function ()
	{ webapp.showPage ("Home"); },

	cmdOptions : function ()
	{ webapp.showPage ("Options"); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	

	cmdClients : function ()
	{ webapp.showPage ("Accounting_Clients_List"); },
	
	cmdInvoice : function ()
	{ webapp.showPage ("Accounting_Clients_Invoices_Home"); },
	
	cmdQuote : function ()
	{ webapp.showPage ("Accounting_Clients_Quotes_Home"); },

	cmdReturn : function ()
	{ webapp.showPage ("Accounting_Clients_Returns_Home"); },

	cmdOrder : function ()
	{ webapp.showPage ("Accounting_Clients_Orders_Home"); },

	cmdCredit : function ()
	{ webapp.showPage ("Accounting_Clients_Credits_Home"); },

	cmdReimburse : function ()
	{ webapp.showPage ("Accounting_Clients_Reimbursements_Home"); },

	cmdPayment : function ()
	{ webapp.showPage ("Accounting_Clients_Payments_Home"); },

	cmdOverdue : function ()
	{ webapp.showPage ("Accounting_Clients_Overdues_Home"); },

	cmdFees : function ()
	{ webapp.showPage ("Accounting_Clients_Fees_Home"); },

	cmdStatement : function ()
	{ webapp.showPage ("Accounting_Clients_Statements_Home"); },
	
};
