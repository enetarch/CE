webapp.pages.Explorer_Folders_List = 
{
	buttons : 
	{
		titlebar_back : function () { webapp.goBack();  },
		titlebar_home : function () { webapp.showPage ("Home");  },
		titlebar_options : function () { webapp.page_Options.show(); },
		titlebar_exit : function () { webapp.showPage ("Security_Login"); },
		 
		// ============================
		
		buttonbar_home : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			webapp.reFreshPage ();
		},
		
		buttonbar_up : function ()
		{
			var me = webapp.pages.Explorer_Folders_List;
			var params = { nID : me.folder_list.row.params.nID };

			webapp.queryServer 
			(
				"explorer::properties::get_parent", 
				params, 
				function (objJSON)
				{
					params.nID = objJSON.return.nID;
					webapp.showPage ("Explorer_Folders_List", params);
				});
		},
		
		buttonbar_search : function () {},
		
		// ============================
		
		buttonbar_create : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupNewInstance.toggle();
			webapp.drawList (me.newinstance_list);
		},
		
		// ============================
		
		button_close_newinstance : function ()
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupNewInstance.toggle();
		},

		buttonbar_refresh : function () 
		{	webapp.reFreshPage (); },
		
		button_close_options : function ()  
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
		},
		
		// ============================
		
		button_Delete : function (thsID) 
		{
			var me = webapp.pages.Explorer_Folders_List;
			
			me.popupOptions.toggle();
			me.popupDelete.toggle();
		},
		
		button_close_delete : function ()  
		{
			var me = webapp.pages.Explorer_Folders_List;
			
			me.popupDelete.toggle();
		},
		
		button_confirm_delete : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			var Params = { nID : me.currentButtonID } ;
			
			me.popupDelete.toggle();
			
			webapp.queryServer ("explorer::folder::delete", Params, function () 
			{	webapp.drawList (me.list); } );
		},
		
		// ============================
		
		button_Rename : function (thsID) 
		{
			var me = webapp.pages.Explorer_Folders_List;
			
			me.popupOptions.toggle();
			me.popupRename.toggle();

			me.rename_data.params.nID = me.currentButtonID;
			
			webapp.drawData (me.rename_data, function ()
			{
				$("#field_current_name").attr ("contentEditable", "true");
				$("#field_current_description").attr ("contentEditable", "true");
			});			
		},

		button_close_rename : function ()  
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupRename.toggle();
		},

		button_rename_confirm : function ()
		{
			var me = webapp.pages.Explorer_Folders_List;

			var params = 
			{ 
				nID : me.currentButtonID,
				szName : $("#field_current_name").text().trim(),
				szDescription : $("#field_current_description").text().trim(),
			 } ;
			
			me.popupRename.toggle();
			
			webapp.queryServer ("explorer::properties::rename", params, function () 
			{	webapp.reFreshPage ();  } );
		},
		
		// ============================
		 
		button_Open : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
			
			var nType = parseInt (me.currentButton.attr ("type"));
			var params = 
			{
				nID : me.currentButtonID,
			};
			
			switch (nType)
			{	
				case 1 : webapp.showPage ("Explorer_Folders_List", params);  break;
				case 2 : webapp.showPage ("Explorer_Folders_List", params);  break;
				case 3 : webapp.showPage ("Explorer_Item_View", params);  break;
				case 4 : webapp.showPage ("Explorer_Reference_View", params);  break;
			}
		},
		
		// ============================
		
		buttonbar_paste : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			
			var params =
			{
				nID : $.cookie ("Explorer_Folder_paste:ID"),
				toID :  me.thsFolderID,
			};
			
			var szCommand = $.cookie ("Explorer_Folder_paste:Command");
			
			webapp.queryServer ("explorer::properties::" + szCommand, params, function () 
			{	
				// webapp.reFreshPage (); 
			} );
		},
		
		button_Copy : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
			
			$.cookie ("Explorer_Folder_paste:ID", me.currentButtonID);
			$.cookie ("Explorer_Folder_paste:Command", "copy");
		},
		
		button_Move : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
			
			$.cookie ("Explorer_Folder_paste:ID", me.currentButtonID);
			$.cookie ("Explorer_Folder_paste:Command", "move");
		 },
		 
		button_Duplicate : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
			
			$.cookie ("Explorer_Folder_paste:ID", me.currentButtonID);
			$.cookie ("Explorer_Folder_paste:Command", "dupe");
		},
		
		buttonbar_reference : function ()
		{
			var me = webapp.pages.Explorer_Folders_List;

			$.cookie ("Explorer_Folder_paste:ID", me.thsFolderID);
			$.cookie ("Explorer_Folder_paste:Command", "reference");			
		},
		
		// ============================
		
		button_Properties : function () 
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupOptions.toggle();
			me.popupProperties.toggle();
			
			me.properties_data.params.nID = me.currentButtonID;
			
			webapp.drawData (me.properties_data);
		},

		button_close_properties : function ()  
		{
			var me = webapp.pages.Explorer_Folders_List;
			me.popupProperties.toggle();
		},
		
	},

	// ===================================================

	
	thsFolderID : 1,
	
	currentButton : null,
	currentButtonID : 0,
	pasteCommand : "",
	
	popupOptions : null,
	popupRename : null,
	popupDelete : null,
	popupProperties : null,
	popupNewInstance : null,
	
	pageInit : function (szParams)
	{
		var me = webapp.pages.Explorer_Folders_List;
		
		if (szParams)
		if (szParams.nID)
		{
			me.thsFolderID = szParams.nID;
			me.folder_list.row.params.nID = szParams.nID;
			$.cookie ("Explorer_Folder_List:ID", szParams.nID);
		}
		
		if (me.folder_list.row.params.nID == 1)
		if ($.cookie ("Explorer_Folder_List:ID") )
		{
			me.folder_list.row.params.nID = $.cookie ("Explorer_Folder_List:ID");
			me.thsFolderID = $.cookie ("Explorer_Folder_List:ID");
		}
		
		me.popupOptions = webapp.popup ("options_panel_background");
		me.popupRename = webapp.popup ("rename_panel_background");
		me.popupDelete = webapp.popup ("delete_panel_background");
		me.popupProperties = webapp.popup ("properties_panel_background");
		me.popupNewInstance = webapp.popup ("newinstance_panel_background");
		
		webapp.linkButtons (me.buttons);
		
		webapp.drawList (me.folder_list); 
	},
	
	// ===================================================
	
	folder_list : 
	{
		table :  "folders_list",

		row :
		{
			template : "folder_list_template",
			buttons : 
			{ 
				viewmore :  function (eventHandler, thsTag) 
				{ 
					var me = webapp.pages.Explorer_Folders_List;
					
					me.currentButton = $(thsTag);
					me.currentButtonID = $(thsTag).attr("value");
					me.pasteCommand = "";
					
					me.popupOptions.toggle();					
				}, 
			},
			get_Data : "explorer::folders::list",
			params : { nID :  1, }
		},
	},

	properties_data :
	{
		target :  "properties_data",
		template : "properties_data_template",
		get_Data : "explorer::properties::get",
		params : { nID : 0 },
	},

	rename_data :
	{
		target :  "rename_data",
		template : "rename_data_template",
		get_Data : "explorer::properties::get",
		params : { nID : 0 },
	},

	newinstance_list : 
	{
		table :  "newisntance_list",

		row :
		{
			template : "newinstance_list_template",
			buttons : 
			{ 
				addclass :  function (eventHandler, thsTag) 
				{ 
					var me = webapp.pages.Explorer_Folders_List;
					me.popupNewInstance.toggle();
					me.cmdAddClass (thsTag);
				}, 
			},
			get_Data : "explorer::classes::list",
			params : { nID :  0 }
		},
		
	},

	// ===================================================
	
	cmdAddClass : function (thsTag)
	{
		var me = webapp.pages.Explorer_Folders_List;
		
		var params = 
		{ 
			nID : me.thsFolderID,
			nClassID : $(thsTag).attr ("value"),
		};
		
		webapp.queryServer 
		(
			"explorer::folder::newinstance", 
			params, 
			function (objJSON)
			{
				params.nID = objJSON.return.nID;
				// webapp.reFreshPage (); 
			});
	},
	
};
