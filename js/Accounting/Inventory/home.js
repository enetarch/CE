webapp.pages.Accounting_Inventory_Home =
{
	btn_Back : "titlebar_back",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	
	btn_Items : "button_items",
	btn_Catagories : "button_catagories",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Inventory_Home;
		
		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Logo).click (function () { me.cmdHome (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );

		$("#" + me.btn_Items).click (function () { me.cmdItems (); } );
		$("#" + me.btn_Catagories).click (function () { me.cmdCatagories (); } );
	},
	
	cmdBack : function ()
	{ webapp.goBack (); },

	cmdHome : function ()
	{ webapp.showPage ("Home"); },

	cmdOptions : function ()
	{ webapp.showPage ("Options"); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	

	cmdItems : function ()
	{ webapp.showPage ("Accounting_Inventory_Items_List"); },
	
	cmdCatagories : function ()
	{ webapp.showPage ("Accounting_Inventory_Catagories_List"); },	
	
};
