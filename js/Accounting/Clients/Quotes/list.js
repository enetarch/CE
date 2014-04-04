webapp.pages.Accounting_Clients_Quotes_List =
{
	szPageURL : "Accounting_Clients_Quotes_List",
	
	btn_Back : "titlebar_back",
	btn_Add : "titlebar_add",
	btn_Refresh : "titlebar_refresh",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Search : "button_search",		
	fld_Search : "field_search",
	
	template_List : "quote_list_row_template", 
	tblList : "quote_list",
	get_List :  "accounting::clients::quote::list",
	btn_view : "quote_viewmore",

	btn_AddItem : "button_AddItem",
	btn_SortQuoteNo : "button_SortQuoteNo",
	btn_SortName : "button_SortName",
	btn_SortDate : "button_SortDate",
	btn_SortTotal : "button_SortTotal",


	popOptions : null,
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Quotes_List;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Refresh).click (function () { me.cmdRefresh (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Search).click (function () { me.cmdSearch (); } );

		me.popOptions = webapp.popup ("options_panel_background"); 

		$("#" + me.btn_AddItem).click (function () { me.cmdAddItem (); } );
		$("#" + me.btn_SortQuoteNo).click (function () { me.cmdSortInoviceNo (); } );
		$("#" + me.btn_SortName).click (function () { me.cmdSortName (); } );
		$("#" + me.btn_SortDate).click (function () { me.cmdSortDate (); } );
		$("#" + me.btn_SortTotal).click (function () { me.cmdSortTotal (); } );

		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack (); },

	cmdExit : function ()
	{ webapp.howPage ("Security_Login"); },

	cmdOptions : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Quotes_List;	
		me.popOptions.toggle();
	},

	cmdAddItem : function ()
	{ webapp.showPage ("Accounting_Clients_Quote_New"); },
	
	cmdSortInoviceNo : function ()
	{
		var me = webapp.pages.Accounting_Clients_Quotes_List;	
		me.popOptions.toggle();		
	},
	
	cmdSearch : function ()
	{
		var me = webapp.pages.Accounting_Clients_Quotes_List;
		var szTerms = $("#" + me.btn_Search).val();
		
		var objData = { terms : szTerms };
		var szParams = JSON.stringify (objData);
		
		$("#" + me.tblClient_List).html ("");
		
		webapp.queryServer (me.get_List, szParams, me.draw_List);
	}, 
	
	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Quotes_List;
		
		$("#" + me.tblList).html ("");
		
		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Clients_Quotes_List;
		
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
	{	webapp.showPage ("Accounting_Clients_Quote_View", nID); }
};
