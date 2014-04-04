<?
	function dirPath () { return ("../../"); }
	Include_Once (dirPath() . "Shared/_app.inc");

Function php_Main ()
{
	Include_Once ("Install_Functions.inc");
	Global $gblLadder;

	// ==================================
	// AccountsRecievable
	//	Account
	//		Clients
	//		Invoices
	// 			Invoice
	// 		Credits
	// 			Credit_Memo
	//		Payments
	//		Fees
	//			Amount
	//		Reimbursement
	//			Amount
	//		Notes
	//		RMAs

	CreateClass ("AccountsRecievable_AccountsRecievable", ldrGlobals::cisFolder(), 0 , true);

	$clsClients_Client = $gblLadder->getClass ("Clients_Client")->ID();
	CreateClass ("AccountsRecievable_Client", ldrGlobals::cisFolder(), $clsClients_Client , true);

	CreateClass ("AccountsRecievable_Invoices", ldrGlobals::cisFolder(), 0 , true);

	$clsInvoices_Invoice = $gblLadder->getClass ("Invoices_Invoice")->ID();
	CreateClass ("AccountsRecievable_Invoice", ldrGlobals::cisFolder(), $clsInvoices_Invoice , true);

	$clsCredit_Credit = $gblLadder->getClass ("Credits_Credit")->ID();
	CreateClass ("AccountsRecievable_Credits", ldrGlobals::cisFolder(), $clsCredit_Credit , true);

	CreateClass ("AccountsRecievable_Credit_Memo", ldrGlobals::cisFolder(), 0 , true);

	$clsPayments_Payment = $gblLadder->getClass ("Payments_Payment")->ID();
	CreateClass ("AccountsRecievable_Payments", ldrGlobals::cisFolder(), $clsPayments_Payment , true);

	CreateClass ("AccountsRecievable_Fees", ldrGlobals::cisFolder(), 0 , true);

	$szStr =
		" nAmount real ";
	CreateClass ("AccountsRecievable_Amount", ldrGlobals::cisItem(), 0 , true, $szStr);

	CreateClass ("AccountsRecievable_Reimbursements", ldrGlobals::cisFolder(), 0 , true);

	$clsCommon_Notes = $gblLadder->getClass ("Common_Notes")->ID();
	CreateClass ("AccountsRecievable_Notes", ldrGlobals::cisFolder(), $clsCommon_Notes , true);

	CreateClass ("AccountsRecievable_RMAs", ldrGlobals::cisFolder(), 0 , true);

return ;
}
?>