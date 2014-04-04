webapp.pages.Clients_List =
{
	szPageURL : "Clients_List",
	btn_Back : "titlebar_back",
	btn_Add : "titlebar_add",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Search : "button_search",		
	fld_Search : "field_search",
	
	template_List : "client_list_row_template", 
	tblList : "client_list",
	get_List :  "clients::list",
	btn_view : "client_viewmore",
	
	pageInit : function ()
	{
		var me = webapp.pages.Clients_List;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Refresh).click (function () { me.cmdRefresh (); } );
		$("#" + me.btn_Add).click (function () { me.cmdAdd (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Search).click (function () { me.cmdSearch (); } );

		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack(); },

	cmdAdd : function ()
	{ webapp.showPage ("Client_New"); },
	
	cmdSearch : function ()
	{
		var me = webapp.pages.Clients_List;
		var szTerms = $("#" + me.btn_Search).val();
		
		var objData = { terms : szTerms };
		var szParams = JSON.stringify (objData);
		
		$("#" + me.tblClient_List).html ("");
		
		webapp.queryServer (me.get_List, szParams, me.draw_List);
	}, 
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Clients_List;
		
		$("#" + me.tblList).html ("");
		
		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	cmdOptions : function ()
	{ webapp.page_Options.show(); },

	cmdExit : function ()
	{ webapp.howPage ("Security_Login"); },

	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Clients_List;
		
		// need to do some transforms on the JSON object here
		// then dump it out as HTML
		
		var szTemplate = $("#" + me.template_List).html();
		
		var szHTML = "";
		
		$("#debug").html ("<BR>" + objData.length);
		
		for (var t=0; t<objData.length; t++)
		{
			// need to mangle the template here
			
			szReplaced = webapp.jsonReplace (objData[t], szTemplate);
			szReplaced = szReplaced.replace ("[?= t ?]", t);
			
			$("#" + me.tblList).append (szReplaced);
			
			$("#" + me.btn_view + "_" + t).click ( function () 
				{ 
					var nID = $("#" + me.btn_view + "_" + t).prop ("value");
					me.cmdView (nID); 
				} );
		}
	},
	
	cmdView : function (nID)
	{	webapp.showPage ("Client_View", nID); }
};
