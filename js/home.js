webapp.pages.Home =
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_options : function () { webapp.showPage ("Options"); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		titlebar_refresh : function () { webapp.showPage ("Security_Login"); },

		button_accounting :function ()	{ webapp.showPage ("Accounting_Home"); },
		button_daytimer : function ()	{ webapp.showPage ("DayTimer_Home"); },
		button_calendar : function ()	{ webapp.showPage ("Calendar_List"); },
		button_todos : function ()	{ webapp.showPage ("Todos_List"); },
		button_clients : function ()	{ webapp.showPage ("Clients_List"); },
		button_locations : function ()	{ webapp.showPage ("Locations_List"); }, 
		button_workorders : function ()	{ webapp.showPage ("WorkOrders_List"); }, 
		button_employees : function ()	{ webapp.showPage ("Employees_List"); }, 
		button_inventory : function ()	{ webapp.showPage ("Inventory_List"); }, 
		button_trucks : function ()	{ webapp.showPage ("Trucks_List"); }, 
		button_security : function ()	{ webapp.showPage ("Security_List"); }, 
		button_messages : function ()	{ webapp.showPage ("Messanger_List"); }, 
		button_timer : function () {}, 
		button_explorer : function () { webapp.showPage ("Explorer_Folders_List"); }, 
	},
	
	pageInit : function ()
	{
		var me = webapp.pages.Home;
		webapp.linkButtons (me.buttons);
	},
	
	
};
