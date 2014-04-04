webapp.pages.Accounting_Clients_Return_View =
{
	btn_Back : "titlebar_back",
	btn_Exit : "titlebar_exit",
	btn_Edit : "titlebar_edit",
	
	tblList : "return_detail_list",
	template_List : "return_detail_list_row_template", 
	template_List_Header : "return_detail_list_header_template", 
	template_List_Footer : "return_detail_list_footer_template", 
	template_List_Empty : "return_detail_list_empty_row_template",
	get_List :  "accounting::clients::returns::items::list",
	
	pageInit : function ()
	{
		var me = webapp.pages.Accounting_Clients_Return_View;

		$("#" + me.btn_Back).click (function () { me.cmdBack (); } );
		$("#" + me.btn_Exit).click (function () { me.cmdExit (); } );
		$("#" + me.btn_Edit).click (function () { me.cmdEdit (); } );
		
		me.popOptions = webapp.popup (me.popup_panel_background); 
		
		me.cmdRefresh ();
	},

	cmdBack : function ()
	{ webapp.goBack(); },

	cmdExit : function ()
	{ webapp.showPage ("Security_Login"); },
	
	cmdEdit : function (nID)
	{ webapp.showPage ("Accounting_Clients_Return_Edit", nID); },

	cmdRefresh : function ()
	{ 
		var me = webapp.pages.Accounting_Clients_Return_View;

		var szTemplate_Header = $("#" + me.template_List_Header).html();
		var szTemplate_Empty = $("#" + me.template_List_Empty).html();
		
		$("#" + me.tblList).html (szTemplate_Header);
		$("#" + me.tblList).append (szTemplate_Empty);

		webapp.queryServer (me.get_List, "", me.draw_List);
	},
	
	draw_List : function (objJSON)
	{
		var objData = objJSON.return;
		
		var me = webapp.pages.Accounting_Clients_Return_View;
		
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
				
				$("#" + me.btn_Delete + "_" + t).click ( function () 
					{ 
						var nID = $("#" + me.btn_Delete + "_" + t).prop ("value");
						me.cmdDelete (nID); 
					} );
			}
			
			szReplaced = szTemplate_Footer.replace ("[?= nSubTotal ?]", 123.45);
			szReplaced = szReplaced.replace ("[?= nTax ?]", 12.45);
			szReplaced = szReplaced.replace ("[?= nTotal ?]", 456.78);

			$("#" + me.tblList).append (szReplaced);
		}
	},
	
};
