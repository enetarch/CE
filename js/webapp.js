var thispage = null;
var webapp = 
{
	init : function (szPage) 
	{
		// show user authentication page
		if (szPage.length == 0)
		{ webapp.showPage ("Security_Login"); }
		else
		{ webapp.showPage (szPage); }
	},
	
	getPage : function (szPage, szParams, cbPageInit)
	{
			window.alert ("calling decomissioned funtion getPage()");
			
			var jsonParams =  JSON.stringify (szParams);
			
			var szCommand = 
				"szCommand=getPage&" +
				"szPage=" + szPage + "&" +
				"szParams=" + jsonParams + "&";
				
			$.ajax (
			{
				url : "index.php",
				method : "POST",
				data : szCommand,
				success : function (szHtml) 
				{
					 if (szHtml.length >0)
					 {
						 $("body").html (szHtml + "<div id=\"debug\"></div>"); 
						 if (cbPageInit) 
						 {
							webapp.linkImageSwaps ();
							webapp.linkDropDownLists ();
							cbPageInit (); 
						 }
					}
					else
					{
						window.alert ("nothing returned for " + szPage);
					}
				},
				error : function ()
				{ window.alert ("ajax call failed"); },
			});
	},

	queryServer : function (szCommand, szParams, cb)
	{
			var jsonParams =  encodeURIComponent ( JSON.stringify (szParams) );
			
			var szCommand = 
				"szCommand=" + szCommand + "&" +
				"szParams=" + jsonParams + "&";
				
			$.ajax (
			{
				url : "query.php",
				method : "POST",
				data : szCommand,
				success : function (szJSON) 
				{
					$("#debug").append ("szCommand = " + szCommand + "<BR> szJson = " + szJSON + "<BR>");
					
					 var objJSON = JSON.parse (szJSON);
					 if (cb) 
						cb (objJSON); 
				},
				error : function ()
				{ window.alert ("ajax call failed"); },
			});
	},
	
	jsonReplace : function (objData, szString)
	{
		window.alert ("calling decomissioned funtion jsonReplace()");
		
		if (szString == null) return ("");
		
		for (var t=0; t<objData.length; t++)
		{
			szString = szString.replace ("[?= " + objData[t].field + " ?]", objData[t].data);
		}
		return (szString);
	},
	
	jsonReplace2 : function (objData, szString)
	{
		if (! objData) return (szString);
		if (szString == null) return (szString);
		
		for (var f in objData)
			szString = szString.replace ("[?= " + f + " ?]", objData[f]);

		return (szString);
	},
	
	// ========================================================
	
	showPage : function (szPage, szParams)
	{
			var jsonParams =  JSON.stringify (szParams);

			var szCommand = 
				"szCommand=getPage&" +
				"szPage=" + szPage + "&" +
				"szParams=" + jsonParams + "&";
			
			// save the page requested to the history list
			// note have to handle page refreshes
			webapp.history.push ( { 0 : szPage, 1 : szParams } );
			
			// call the page to be viewed
			
			$.ajax (
			{
				url : "index.php",
				method : "POST",
				data : szCommand,
				success : function (szHtml) 
				{
					 if (szHtml.length >0)
					 {
						 $("body").html (szHtml + "<div id=\"debug\"></div>"); 
						 
						 webapp.linkImageSwaps ();
						 webapp.linkDropDownLists ();
						 
						 if (webapp.pages [ szPage ])
						 if (webapp.pages [ szPage ].pageInit) 
							webapp.pages [ szPage ].pageInit (szParams); 
					}
					else
					{
						window.alert ("nothing returned for " + szPage);
					}
				},
				error : function ()
				{ window.alert ("ajax call failed"); },
			});		
	},
	
	
	loadPage : function (szPage, szParams, szTarget, cbLoaded)
	{
		var jsonParams =  JSON.stringify (szParams);
		
		var szCommand = 
			"szCommand=loadPage&" +
			"szPage=" + szPage + "&" +
			"szParams=" + jsonParams + "&";
		
		// call the page to be loaded
		
		$.ajax (
		{
			url : "index.php",
			method : "POST",
			data : szCommand,
			success : function (szHtml) 
			{
				 if (szHtml.length >0)
				 {
					 $("#" + szTarget).html (szHtml); 
					 
					 webapp.linkImageSwaps ();
					 webapp.linkDropDownLists ();

					 if (webapp.pages [ szPage ])
					 if (webapp.pages [ szPage ].pageInit) 
						webapp.pages [ szPage ].pageInit (szParams); 
					
					if (cbLoaded)
						cbLoaded ();
				}
				else
				{
					window.alert ("nothing returned for " + szPage);
				}
			},
			error : function ()
			{ window.alert ("ajax call failed"); },
		});		
	},
	
	saveData : function (data, nextPage)
	{
		if (! data) return;
		if (! data.save_Data) return;
		
		for (var i in data.fields)
			if ($("#" + i).length > 0)
				data.fields [i] = $("#" + i).text();
		
		var cb = function (objJSON) 
		{ 
			var nID = objJSON.return;
			webapp.showPage (nextPage, nID); 
		};
			
		szCommand = data.save_Data;
		webapp.queryServer (szCommand, data.fields, cb)
	},
	
	// ========================================================

	linkButtons : function (buttons)
	{
		for (var i in buttons)
			$("#" + i).click (buttons[i]); 
	},

	// ========================================================

	drawData : function (data, cb)
	{
		if (! data) return;
		
		data.clicks = {};
		
		if (data.get_Data)
		{
			webapp.queryServer 
			(
				data.get_Data, 
				data.params,
				function (objJSON) 
				{ 
					webapp.drawData2 (data, objJSON); 
					if (cb)
						cb ();
				} 			
			);
		}
		else 
		{
			var objJSON = { return : {} }
			webapp.drawData2 (data, objJSON);
			if (cb)
				cb ();
		}
	},
	
	drawData2 : function (data, objJSON)
	{
		var objData = objJSON.return;
		
		var szTemplate = $("#" + data.template).html();
		
		var szHTML = "";
		
		szReplaced = webapp.jsonReplace2 (objData, szTemplate);
		
		$("#" + data.target).html (szReplaced);
		
		for (var i in data.buttons)
			$("#" + i).click ( data.buttons[i] );
			
		webapp.linkImageSwaps ();
		webapp.linkDropDownLists ();
	},


	// ========================================================

	drawList : function (list)
	{
		if (! list) return;

		if (list.header)
		{
			list.header.clicks = {};
			
			if (list.header.get_Data)
			{
				webapp.queryServer 
					(
						list.header.get_Data, 
						list.header.params,
						function (objJSON) 
						{ webapp.drawList_Header (list, objJSON); } 
					);
			}
			else
			{
				var objJSON = { return : {} }
				webapp.drawList_Header (list, objJSON);
			}
		}

		if (list.row) 
		{
			list.row.clicks = {};
			
			webapp.queryServer 
				(
					list.row.get_Data, 
					list.row.params, 
					function (objJSON) 
					{ webapp.drawList_Row (list, objJSON); } 
				);
		}

		if (list.footer)
		{
			list.footer.clicks = {};
			
			if (list.footer.get_Data)
			{
				webapp.queryServer 
				(
					list.footer.get_Data, 
					list.footer.params, 
					function (objJSON) 
					{ webapp.drawList_Footer (list, objJSON); } 
				);
			}
			else
			{
				var objJSON = { return : {} }
				webapp.drawList_Footer (list, objJSON);
			}
		}
		
	},
	
	drawList_Header : function (list, objJSON)
	{
		var objData = objJSON.return;
		
		var szTemplate = $("#" + list.header.template).html();
		
		var szHTML = "";
		
		szReplaced = webapp.jsonReplace2 (objData, szTemplate);
		
		$("#" + list.table).append (szReplaced);
		
		for (var i in list.header.buttons)
		{
			list.header.clicks[i] = list.header.buttons[i];
			
			$("#" + i ).click ( function ( eventHandler ) 
			{ 
				var me = $(this).attr ("id");

				var foo = list.row.clicks[me];
				if (foo) 
					foo (eventHandler, this); 
			} );
		}

		$(".contentEditable").each ( function () 
		{ $(this).attr ("contentEditable", "true"); } );
		
		webapp.linkImageSwaps ();
		webapp.linkDropDownLists ();
	},
	
	drawList_Row : function (list, objJSON)
	{
		var objData = objJSON.return;
		
		var szTemplate = $("#" + list.row.template).html();
		if (!szTemplate) window.alert ("the template '" + list.row.template + "' is not found");
		if (!szTemplate.length) window.alert ("the template '" + list.row.template + "' is empty");
		
		var szHTML = "";
		
		var t = 0;
		for (var key in objData)
		{
			szReplaced = webapp.jsonReplace2 (objData[key], szTemplate);
			szReplaced = szReplaced.replace ("[?= t ?]", t);
			
			$("#" + list.table).append (szReplaced);
			
			for (var i in list.row.buttons)
			{
				list.row.clicks[i + "_" + t] = list.row.buttons[i];
				
				$("#" + i + "_" + t).click ( function ( eventHandler ) 
				{ 
					var me = $(this).attr ("id");

					var foo = list.row.clicks[me];
					if (foo) 
						foo (eventHandler, this); 
				} );
			}
			
			t++;
		}
		
		if (t == 0)
		if (list.row.template_empty)
		{
			var szTemplate = $("#" + list.row.template_empty).html();
			$("#" + list.table).append (szTemplate);
		}
		
		$("#" + list.table).find(".contentEditable").each ( function () 
		{ $(this).attr ("contentEditable", "true"); } );
		
		webapp.linkImageSwaps ();
		webapp.linkDropDownLists ();
	},

	drawList_Footer : function (list, objJSON)
	{
		var objData = objJSON.return;
		
		var szTemplate = $("#" + list.footer.template).html();
		
		var szHTML = "";
		
		szReplaced = webapp.jsonReplace2 (objData, szTemplate);
		
		$("#" + list.table).append (szReplaced);
		
		for (var i in list.header.buttons)
		{
			list.footer.clicks[i]  = list.footer.buttons[i];
			
			$("#" + i).click ( function () 
			{ 
				var me = $(this).attr ("id");

				var foo = list.row.clicks[me];
				if (foo) 
					foo (eventHandler, this); 
			} );
		}

		$(".contentEditable").each ( function () 
		{ $(this).attr ("contentEditable", "true"); } );
		
		webapp.linkImageSwaps ();
		webapp.linkDropDownLists ();
		
	},
	


	// ========================================================

	pages : {},
	
	history : Array (),
	
	goBack : function () 
	{
		webapp.history.pop ();
		obj = webapp.history.pop ();
		
		if (obj)
		{ webapp.showPage (obj [0], obj[1]); }
		else
		{ webapp.showPage ("Home"); }
	},

	reFreshPage : function ()
	{
		obj = webapp.history.pop ();
		
		if (obj)
		{ webapp.showPage (obj [0], obj[1]); }
		else
		{ webapp.showPage ("Home"); }
	},
	
	// ========================================================

	popup :  function (id)
	{
		var popup = 
		{
			id : "",
			x : 0,
			y : 0,
			w : 0,
			h : 0,
			bShowing : false,
			
			setWH : function (w, y)
			{ 
				this.w = w;
				this.h = h;

				$("#" + this.id).css ("width", w);
				$("#" + this.id).css ("height", h);
			},
			
			setXY : function (x,y)
			{
				this.x = x;
				this.y = y;

				$("#" + this.id).css ("left", x);
				$("#" + this.id).css ("top", y);
			},
			
			show : function (x,y)
			{
				this.x = x;
				this.y = y;

				$("#" + this.id).css ("left", x);
				$("#" + this.id).css ("top", y);

				$("#" + this.id).show ();
				this.bShowing = true;
			},
			
			hide : function ()
			{
				$("#" + this.id).hide ();
				this.bShowing = false;
			},
			
			remove : function ()
			{
				$("#" + this.id).remove ();
			},
			
			toggle : function ()
			{
				if (this.bShowing)
				{ this.hide ();  }
				else
				{ 
					var x;
					var y = $("body").scrollTop();
					this.show (x,y);  
				}
			},
			
		};
		
		popup.id = id;

		return (popup);
	},
	
	getGUID :  function ()
	{
		var szGUID = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) 
		{
			var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
			return v.toString(16);
		});
		
		return (szGUID);
	},

	// ========================================================
	
	linkImageSwaps : function ()
	{
		var onClick = function () 
	 	{ 
			var me = $(this);
			webapp.swapImage (me); 
		};
			
		$("div").each (function ()
		{ 
			var me = $(this);
			switch (me.attr ("type"))
			{
				case "radiobutton" :
				case "checkbox" :
				{
					me.off();
					me.click ( onClick );					
				} break;
			}
		});
	},
	
	swapImage : function (me)
	{
		if (me.is (".buttonbar_checkbox_on" ) )
		{
			me
			.addClass ("buttonbar_checkbox_off")
			.removeClass ("buttonbar_checkbox_on");
		}
		else if (me.is (".buttonbar_checkbox_off") )
		{
			me
			.addClass ("buttonbar_checkbox_on")
			.removeClass ("buttonbar_checkbox_off");
		}
		else if (me.is (".buttonbar_radiobutton_on") )
		{
			me
			.addClass ("buttonbar_radiobutton_off")
			.removeClass ("buttonbar_radiobutton_on");
			webapp.updateRadioGroup (me.attr ("group"), me);
		}
		else if (me.is (".buttonbar_radiobutton_off") )
		{
			me
			.addClass ("buttonbar_radiobutton_on")
			.removeClass ("buttonbar_radiobutton_off");
			webapp.updateRadioGroup (me.attr ("group"), me);
		}
	},
	
	updateRadioGroup : function (group, skip)
	{
		$("div").each (function ()
		{
			var ths = $(this);
			if (ths.attr ("group") == group)
			if (ths.attr ("id")  != skip.attr ("id") )
			{
				ths
				.addClass ("buttonbar_radiobutton_off")
				.removeClass ("buttonbar_radiobutton_on");
			}			
		});
	},

	// ========================================================
	// Drop Down Image List Box

/*
 *  Example HTML Code
 * 
<div id="options_panel_background" class="options_panel_background background_75pct">
<div id="options_panel" class="row_vcenter options_panel background_Solid">
	
	<div id="button_folder" class="blank_row background_Solid" type="listoption" value="buttonbar_Folder">
		<div id="button_image" class="buttonbar_Folder buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Folder</div>
	</div>
	
	<div id="button_note" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_notes">
		<div id="button_image" class="buttonbar_notes buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Note</div>
	</div>
	
	<div id="button_todo" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_checkbox_on">
		<div id="button_image" class="buttonbar_checkbox_on buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Todo</div>
	</div>
		
	<div id="button_appointment" class="row_vcenter blank_row background_Solid" type="listoption" value="buttonbar_calendar">
		<div id="button_image" class="buttonbar_calendar buttonbar_button buttonbar_float_left"></div>
		<div id="" class="form_label_text">Appointment</div>
	</div>

</div>
</div>

<div id="button_droplistbox" class="buttonbar_float_left" type="droplistbox" options="options_panel_background">
	<div id="button_addtype" class="buttonbar_CheckBox_On buttonbar_button buttonbar_float_left" value="buttonbar_CheckBox_On"></div>
	<div id="button_showlist" class="buttonbar_DownArrow buttonbar_droplist_arrow buttonbar_float_left" ></div>
</div>
 
 */

	linkDropDownLists : function (popupOptions)
	{
		
		var droplistbox = function () {
			return (
		{
			selectorDropList :  "",
			selectorOptions :  "",
			optionsPanel : null,
			szSelected : "",
			optionPanel_posX : 0,
			optionPanel_posY : 0, 
			
			onSelect : function (event, me)
			{
				// an option was selected
				// hide the popup menu
				// get the button that is to be shown
				// set the option selected in this object
				// set the option selected in selected option box
				
				me.optionsPanel.toggle ();
				
				var szNewValue = $(event.delegateTarget).attr ("value");
				var currentValue = $("#button_addtype").attr ("value");
				
				$("#button_addtype").removeClass (currentValue);
				$("#button_addtype").addClass (szNewValue);
				
				$("#button_addtype").attr ("value", szNewValue);
				me.szSelected = szNewValue;
			},
			
			onShowHide : function (me) 
			{ 
				// show / hide the popup menu
				me.optionsPanel.toggle ();
				me.optionsPanel.setXY (me.optionPanel_posX, me.optionPanel_posY);
			},
			 
			 init : function (thsPanel)
			{
				var me = this;
				
				// connect onClick to the show / hide icon for the drop down menu

				me.selectorDropList = thsPanel.attr ("id");
				me.optionPanel_posX = thsPanel.offset().left;
				me.optionPanel_posY = thsPanel.offset().top + thsPanel.height();
				
				me.selectorOptions = thsPanel.attr ("options");

				me.optionsPanel = new webapp.popup (this.selectorOptions);
				 
				thsPanel.off();
				thsPanel.click (function () { me.onShowHide (me); });
				
				// connect onSelect to each option in the option menu
				
				$("#" + me.selectorOptions).find ("div").each (function ()
				{ 
					var thsOption = $(this);
					switch (thsOption.attr ("type"))
					{
						case "listoption" :
						{
							thsOption.off();
							thsOption.click 
							( 
								function (event) 
								{ me.onSelect (event, me); } 
							);					
						} break;
					}
				});		

				
			 },
		} ); };
		
		$("div").each (function ()
		{ 
			var me = $(this);
			switch (me.attr ("type"))
			{
				case "droplistbox" :
				{
					var newListBox = new droplistbox;
					newListBox.init (me);
				} break;
			}
		});		
	},

	// ========================================================
	
};

