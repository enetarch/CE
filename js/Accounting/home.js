webapp.pages.Accounting_Home =
{
	btn_Back : "titlebar_back",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	
	btn_Banking : "button_banking",
	btn_Clients : "button_clients",
	btn_Employees : "button_employees", 
	btn_Inventory : "button_inventory", 
	btn_Vendors : "button_vendors",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Home;
		
		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Logo).click (function () { me.cmdHome (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

		$("#" + me.btn_Banking).click (function () { me.cmdBanking (); } );
		$("#" + me.btn_Clients).click (function () { me.cmdClients (); } );
		$("#" + me.btn_Employees).click (function () { me.cmdEmployees (); } );
		$("#" + me.btn_Inventory).click (function () { me.cmdInventory (); } );
		$("#" + me.btn_Vendors).click (function () { me.cmdVendors (); } );
	},
	
	cmdBack : function ()
	{ webapp.goBack(); },

	cmdOptions : function ()
	{ webapp.showPage ("Options"); },

	cmdHome : function ()
	{ webapp.showPage ("Home"); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	

	cmdBanking : function ()
	{ webapp.showPage ("Accounting_Banking_Home"); },
	
	cmdClients : function ()
	{ webapp.showPage ("Accounting_Clients_Home"); },
	
	cmdEmployees : function ()
	{ webapp.showPage ("Accounting_Employees_Home"); },
	
	cmdInventory : function ()
	{ webapp.showPage ("Accounting_Inventory_Home"); },
	
	cmdVendors : function ()
	{ webapp.showPage ("Accounting_Vendors_Home"); },
	
	
};
