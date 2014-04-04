<?

Function CreateClass ($thsName, $nBaseType, $ofClass, $bAcceptsAll, $szStr="")
{
	Global $gblLadder;

	printf ("Adding Class %s<BR>", $thsName);

	$gblLadder->CreateClass ($thsName, $nBaseType, $ofClass, $bAcceptsAll, $szStr);
}

// ========================================================

Function CreateVerbs ($thsPackage, $thsClass, $thsLanguage)
{
	CreateVerb ($thsPackage . "_" . $thsClass, $thsLanguage, "New", $thsPackage . "/" . $thsClass . "/". "New.php");
	CreateVerb ($thsPackage . "_" . $thsClass, $thsLanguage, "Edit", $thsPackage . "/" . $thsClass . "/". "Edit.php");
	CreateVerb ($thsPackage . "_" . $thsClass, $thsLanguage, "View", $thsPackage . "/" . $thsClass . "/". "View.php");
	CreateVerb ($thsPackage . "_" . $thsClass, $thsLanguage, "Delete", $thsPackage . "/" . $thsClass . "/". "Delete.php");
}

Function CreateVerb ($thsName, $thsLanguage, $thsAction, $thsURL)
{
	Global $gblLadder;

	$aryRoots = $gblLadder->getRoots();
	$objRoot = $gblLadder->getItem ($aryRoots [2]);

	$cClass_Verbs_Verbs = $gblLadder->getClass("Verbs_Verbs")->ID();
	$cClass_Verbs_Language = $gblLadder->getClass("Verbs_Language")->ID();
	$cClass_Verbs_Action = $gblLadder->getClass("Verbs_Action")->ID();

	if (! $objRoot->Exists ($thsName, ldrGlobals::cClass_Ladder_Class()))
	{ return; }

	$objClass = $objRoot->getFolder
		($thsName, ldrGlobals::cClass_Ladder_Class());

	if ($objClass == null) return;

	// ================================
	// Locate Verbs Folder

	$objVerbs = null;
	if (! $objClass->Exists ("Verbs", $cClass_Verbs_Verbs))
	{
		$objVerbs = $objClass->Create_Folder
			("Verbs", "Verbs", $cClass_Verbs_Verbs);
		$objVerbs->Store ();
	}
	else
	{
		$objVerbs = $objClass->getFolder
			("Verbs", $cClass_Verbs_Verbs);
	}

	// ================================
	// Locate Language Folder

	$objLanguage = null;
	if (! $objVerbs->Exists ($thsLanguage, $cClass_Verbs_Language))
	{
		$objLanguage = $objVerbs->Create_Folder
			($thsLanguage, "Laungauges", $cClass_Verbs_Language);
		$objLanguage->Store ();
	}
	else
	{
		$objLanguage = $objVerbs->getFolder ($thsLanguage, $cClass_Verbs_Language);
	}

	// ================================
	// Locate Action

	$objAction = null;
	if (! $objLanguage->Exists ($thsAction, $cClass_Verbs_Action))
	{
		$objAction = $objLanguage->Create_Item
			($thsAction, "Action", $cClass_Verbs_Action);

		$objAction->setField ("szURL", $thsURL);
		$objAction->Store();

	printf ("Added Verb to Class %s,  Langauge  %s, %s = %d<BR>",
		$thsName, $thsLanguage, $thsAction, $objAction->ID());

	}

	return;
}

// ========================================================

Function CreateForm ($thsName, $thsForm, $thsURL)
{
	Global $gblLadder;

	$aryRoots = $gblLadder->getRoots();
	$objRoot = $gblLadder->getItem ($aryRoots [2]);

	$cClass_Forms_Forms = $gblLadder->getClass("Forms_Forms")->ID();
	$cClass_Forms_Form = $gblLadder->getClass("Forms_Form")->ID();

	if (! $objRoot->Exists ($thsName, ldrGlobals::cClass_Ladder_Class()))
	{ return; }

	$objClass = $objRoot->getFolder
		($thsName, ldrGlobals::cClass_Ladder_Class());

	if ($objClass == null) return;

	// ================================
	// Locate Forms Folder

	$objForms = null;
	if (! $objClass->Exists ("Forms", $cClass_Forms_Forms))
	{
		$objForms = $objClass->Create_Folder
			("Forms", "Forms", $cClass_Forms_Forms);
		$objForms->Store ();
	}
	else
	{
		$objForms = $objClass->getFolder
			("Forms", $cClass_Forms_Forms);
	}

	// ================================
	// Locate Item

	$objForm = null;
	if (! $objForms->Exists ($thsForm, $cClass_Forms_Form))
	{
		$objForm = $objForms->Create_Item
			($thsForm, "Form", $cClass_Forms_Form);

		$objForm->setField ("szURL", $thsURL);
		$objForm->Store();

	printf ("Added Form to Class %s,  Form %s = %d<BR>",
		$thsName, $thsForm, $objForm->ID());

	}

	return;
}

?>