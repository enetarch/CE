webapp.pages.Accounting_Clients_Statements_Home =
{
	btn_Back : "titlebar_back",
	btn_Options : "titlebar_options",
	btn_Exit : "titlebar_exit",
	btn_Edit : "titlebar_edit",
	btn_View : "button_view",
	
	tblList : "statement_detail_list",
	template_List : "statement_detail_list_row_template", 
	template_List_Header : "statement_detail_list_header_template", 
	template_List_Empty : "statement_detail_list_empty_row_template",
	get_List :  "accounting::clients::statements::list",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Statements_Home;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Options).click (function () { me.cmdOptions (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Edit).click (function () { me.cmdEdit (); } );
		
		me.popOptions = webapp.popup (me.popup_panel_background); 
		
		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack(); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdOptions : function ()	{  },
	
	cmdEdit : function (nID)
	{ webapp.showPage ("Accounting_Clients_Invoice_Edit", nID); },

	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Statements_Home;

		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Empty = $("#" + me.template_List_Empty).html();
		
		$("#" + me.tblList).html (szTemplate_Header);
		$("#" + me.tblList).append (szTemplate_Empty);

		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Clients_Statements_Home;
		
		// need to do some transforms on the JSON object here
		// then dump it out as HTML
		
		var szTemplate = $("#" + me.template_List).html();
		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Footer = $("#" + me.template_List_Footer).html();

		var szHTML = "";
		
		$("#debug").html ("<BR>" + objData.length);
		
		if (objData.length > 0)
		{
			$("#" + me.tblList).html (szTemplate_Header);

			for (var t=0; t<objData.length; t++)
			{
				// need to mangle the template here
				
				var regex = new RegExp ("/\[\?= t \?\]/", "g");
				
				szReplaced = webapp.jsonReplace2 (objData[t], szTemplate);
				
				szReplaced = szReplaced.replace ("[?= t ?]", t);
				// szReplaced = szReplaced.replace (regex, t);
				
				$("#" + me.tblList).append (szReplaced);
				
				$("#" + me.btn_View + "_" + t).click ( function () 
					{ 
						var nID = $("#" + me.btn_View + "_" + t).prop ("value");
						me.cmdView (nID); 
					} );
			}
		}
	},
	
	cmdView : function (nID)
	{ webapp.showPage ("Accounting_Clients_Statements_Client", nID); },
	
};
