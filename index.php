<?
session_start();

$szPage = "";

if 
( isset ($_SESSION ["szLastPage_Viewed"] )  &&
  (strlen (trim ($_SESSION ["szLastPage_Viewed"] )) != 0)
)
	$szPage = $_SESSION ["szLastPage_Viewed"];

// ====================================================

if (! isset ($_POST ["szCommand"]) )
{
?>
<html>
<head>
<title>Chism Elecrtic</title>
<link rel="stylesheet" type="text/css" href="shared/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>
<script src="js/3rdparty/jquery-1.10.2.min.js"></script>
<script src="js/3rdparty/jquery.cookie.js"></script>
<script src="js/webapp.js"></script>
<script> webapp.init ("<?= $szPage ?>"); </script>
<body>
<div id="debug" class="debug"></div>
</body>
</html>
<?
exit ();
}

// ====================================================
$aryParams = json_decode ($_POST  ["szParams"], true);

$aryPages = Array
(
	"Home" => "Home.php",
	"Get_Appropriate_Page" => "get/page.php",
	
	"Security_Login" => "security/login/Login.php",
	"Security_Register" => "security/ogin/Register.php",
	"Security_ForgotPSW" => "security/ogin/ForgotPSW.php",
	"Security_ThankYou" => "security/ogin/ThankYou.php",
	
	"Users_List" => "security/user/List.php",
	"User_View" => "security/user/View.php",
	"User_New" => "security/user/New.php",
	"User_Edit" => "security/user/Edit.php",	
	"User_ResetPSW" => "security/user/ResetPSW.php",
	
	"Policies_List" => "security/policies/List.php",
	"Policiy_View" => "security/policies/View.php",
	"Policiy_New" => "security/policies/New.php",
	"Policiy_Edit" => "security/policies/Edit.php",	

	"Groups_List" => "security/groups/List.php",
	"Group_View" => "security/groups/View.php",
	"Group_New" => "security/groups/New.php",
	"Group_Edit" => "security/groups/Edit.php",	

	"Clients_List" => "clients/List.php",
	"Client_Edit" => "clients/Edit.php",
	"Client_New" => "clients/New.php",
	"Client_View" => "clients/View.php",
	
	"WorkOrders_List" => "workorders/List.php",
	"WorkOrder_Edit" => "workorders/Edit.php",
	"WorkOrder_New" => "workorders/New.php",
	"WorkOrder_View" => "workorders/View.php",
	
	"Locations_List" => "locations/List.php",
	"Location_Edit" => "locations/Edit.php",
	"Location_New" => "locations/New.php",
	"Location_View" => "locations/View.php",

	"Inventory_List" => "inventory/List.php",
	"Inventory_Edit" => "inventory/Edit.php",
	"Inventory_New" => "inventory/New.php",
	"Inventory_View" => "inventory/View.php",
	
	"Employees_List" => "employees/List.php",
	"Employee_Edit" => "employees/Edit.php",
	"Employee_New" => "employees/New.php",
	"Employee_View" => "employees/View.php",

	"Appointment_List" => "common/appointment/List.php",
	"Appointment_Edit" => "common/appointment/Edit.php",
	"Appointment_New" => "common/appointment/New.php",
	"Appointment_View" => "common/appointment/View.php",

	"Calendar_List" => "common/calendar/List.php",
	"Calendar_Edit" => "common/calendar/Edit.php",
	"Calendar_New" => "common/calendar/New.php",
	"Calendar_View" => "common/calendar/View.php",

	"Todos_List" => "common/todos/List.php",
	"Todo_Edit" => "common/todos/Edit.php",
	"Todo_New" => "common/todos/New.php",
	"Todo_View" => "common/todos/View.php",
	
	"Accounting_Home" => "accounting/Home.php",
	
	// ================================================
	
	"Accounting_Banking_Select" => "accounting/banking/Select.php",
	"Accounting_Banking_Home" => "accounting/banking/Home.php",
	"Accounting_Banking_List" => "accounting/banking/List.php",
	"Accounting_Banking_View" => "accounting/banking/View.php",
	"Accounting_Banking_New" => "accounting/banking/New.php",
	"Accounting_Banking_Edit" => "accounting/banking/Edit.php",

	"Accounting_Banking_Statements_Home" => "accounting/banking/statements/Home.php",
	"Accounting_Banking_Statements_Bank" => "accounting/banking/statements/Bank.php",

	"Accounting_Banking_Checks_Home" => "accounting/banking/checks/Home.php",
	"Accounting_Banking_Checks_List" => "accounting/banking/checks/List.php",
	"Accounting_Banking_Check_View" => "accounting/banking/checks/View.php",
	"Accounting_Banking_Check_New" => "accounting/banking/checks/New.php",
	"Accounting_Banking_Check_Edit" => "accounting/banking/checks/Edit.php",

	"Accounting_Banking_Credits_Home" => "accounting/banking/credits/Home.php",
	"Accounting_Banking_Credits_List" => "accounting/banking/credits/List.php",
	"Accounting_Banking_Credit_View" => "accounting/banking/credits/View.php",
	"Accounting_Banking_Credit_New" => "accounting/banking/credits/New.php",
	"Accounting_Banking_Credit_Edit" => "accounting/banking/credits/Edit.php",

	"Accounting_Banking_Fees_Home" => "accounting/banking/fees/Home.php",
	"Accounting_Banking_Fees_Client" => "accounting/banking/fees/Client.php",
	"Accounting_Banking_Fee_New" => "accounting/banking/fees/New.php",
	"Accounting_Banking_Fee_Edit" => "accounting/banking/fees/Edit.php",
	"Accounting_Banking_Fee_View" => "accounting/banking/fees/View.php",

	"Accounting_Banking_Reimbursements_Home" => "accounting/banking/reimbursements/Home.php",
	"Accounting_Banking_Reimbursements_Client" => "accounting/banking/reimbursements/Client.php",
	"Accounting_Banking_Reimbursement_New" => "accounting/banking/reimbursements/New.php",
	"Accounting_Banking_Reimbursement_Edit" => "accounting/banking/reimbursements/Edit.php",
	"Accounting_Banking_Reimbursement_View" => "accounting/banking/reimbursements/View.php",

	"Accounting_Banking_Transfers_Home" => "accounting/banking/transfers/Home.php",
	"Accounting_Banking_Transfers_Client" => "accounting/banking/transfers/Client.php",
	"Accounting_Banking_Transfer_New" => "accounting/banking/transfers/New.php",
	"Accounting_Banking_Transfer_Edit" => "accounting/banking/transfers/Edit.php",
	"Accounting_Banking_Transfer_View" => "accounting/banking/transfers/View.php",

	"Accounting_Banking_Deposits_Home" => "accounting/banking/deposits/Home.php",
	"Accounting_Banking_Deposits_Client" => "accounting/banking/deposits/Client.php",
	"Accounting_Banking_Deposit_New" => "accounting/banking/deposits/New.php",
	"Accounting_Banking_Deposit_Edit" => "accounting/banking/deposits/Edit.php",
	"Accounting_Banking_Deposit_View" => "accounting/banking/deposits/View.php",

	// ================================================

	"Accounting_Clients_Home" => "accounting/clients/Home.php",
	"Accounting_Clients_List" => "accounting/clients/List.php",
	"Accounting_Client_View" => "accounting/clients/View.php",
	"Accounting_Client_New" => "accounting/clients/New.php",
	"Accounting_Client_Edit" => "accounting/clients/Edit.php",

	"Accounting_Clients_Fees_Home" => "accounting/clients/fees/Home.php",
	"Accounting_Clients_Fees_Client" => "accounting/clients/fees/Client.php",
	"Accounting_Clients_Fee_New" => "accounting/clients/fees/New.php",
	"Accounting_Clients_Fee_Edit" => "accounting/clients/fees/Edit.php",
	"Accounting_Clients_Fee_View" => "accounting/clients/fees/View.php",

	"Accounting_Clients_PayChecks_Select" => "accounting/clients/payments/Select.php",
	"Accounting_Clients_PayChecks_Home" => "accounting/clients/payments/Home.php",
	"Accounting_Clients_PayChecks_Client" => "accounting/clients/payments/Client.php",
	"Accounting_Clients_PayCheck_New" => "accounting/clients/payments/New.php",
	"Accounting_Clients_PayCheck_Edit" => "accounting/clients/payments/Edit.php",
	"Accounting_Clients_PayCheck_View" => "accounting/clients/payments/View.php",

	"Accounting_Clients_Reimbursements_Home" => "accounting/clients/reimbursements/Home.php",
	"Accounting_Clients_Reimbursements _Client" => "accounting/clients/reimbursements/Client.php",
	"Accounting_Clients_Reimbursement_New" => "accounting/clients/reimbursements/New.php",
	"Accounting_Clients_Reimbursement_Edit" => "accounting/clients/reimbursements/Edit.php",
	"Accounting_Clients_Reimbursement_View" => "accounting/clients/reimbursements/View.php",

	"Accounting_Clients_Statements_Home" => "accounting/clients/statements/Home.php",
	"Accounting_Clients_Statements_Client" => "accounting/clients/statements/Client.php",

	"Accounting_Clients_Invoices_Home" => "accounting/clients/invoices/Home.php",
	"Accounting_Clients_Invoices_List" => "accounting/clients/invoices/List.php",
	"Accounting_Clients_Invoice_View" => "accounting/clients/invoices/View.php",
	"Accounting_Clients_Invoice_New" => "accounting/clients/invoices/New.php",
	"Accounting_Clients_Invoice_New2" => "accounting/clients/invoices/New2.php",
	"Accounting_Clients_Invoice_Edit" => "accounting/clients/invoices/Edit.php",
	"Accounting_Clients_Invoice_Edit2" => "accounting/clients/invoices/Edit2.php",

	"Accounting_Clients_Credits_Home" => "accounting/clients/credits/Home.php",
	"Accounting_Clients_Credits_List" => "accounting/clients/credits/List.php",
	"Accounting_Clients_Credit_View" => "accounting/clients/credits/View.php",
	"Accounting_Clients_Credit_New" => "accounting/clients/credits/New.php",
	"Accounting_Clients_Credit_New2" => "accounting/clients/credits/New2.php",
	"Accounting_Clients_Credit_Edit" => "accounting/clients/credits/Edit.php",
	"Accounting_Clients_Credit_Edit2" => "accounting/clients/credits/Edit2.php",

	"Accounting_Clients_Quotes_Home" => "accounting/clients/quotes/Home.php",
	"Accounting_Clients_Quotes_List" => "accounting/clients/quotes/List.php",
	"Accounting_Clients_Quote_View" => "accounting/clients/quotes/View.php",
	"Accounting_Clients_Quote_New" => "accounting/clients/quotes/New.php",
	"Accounting_Clients_Quote_New2" => "accounting/clients/quotes/New2.php",
	"Accounting_Clients_Quote_Edit" => "accounting/clients/quotes/Edit.php",
	"Accounting_Clients_Quote_Edit2" => "accounting/clients/quotes/Edit2.php",

	"Accounting_Clients_Orders_Home" => "accounting/clients/orders/Home.php",
	"Accounting_Clients_Orders_List" => "accounting/clients/orders/List.php",
	"Accounting_Clients_Order_View" => "accounting/clients/orders/View.php",
	"Accounting_Clients_Order_New" => "accounting/clients/orders/New.php",
	"Accounting_Clients_Order_New2" => "accounting/clients/orders/New2.php",
	"Accounting_Clients_Order_Edit" => "accounting/clients/orders/Edit.php",
	"Accounting_Clients_Order_Edit2" => "accounting/clients/orders/Edit2.php",

	"Accounting_Clients_Returns_Home" => "accounting/clients/returns/Home.php",
	"Accounting_Clients_Returns_List" => "accounting/clients/returns/List.php",
	"Accounting_Clients_Return_View" => "accounting/clients/returns/View.php",
	"Accounting_Clients_Return_New" => "accounting/clients/returns/New.php",
	"Accounting_Clients_Return_New2" => "accounting/clients/returns/New2.php",
	"Accounting_Clients_Return_Edit" => "accounting/clients/returns/Edit.php",
	"Accounting_Clients_Return_Edit2" => "accounting/clients/returns/Edit2.php",

	"Accounting_Clients_ Quote s_Home" => "accounting/clients/quotes/Home.php",
	"Accounting_Clients_ Quote s_List" => "accounting/clients/quotes/List.php",
	"Accounting_Clients_ Quote _View" => "accounting/clients/quotes/View.php",
	"Accounting_Clients_ Quote _New" => "accounting/clients/quotes/New.php",
	"Accounting_Clients_ Quote _New2" => "accounting/clients/quotes/New2.php",
	"Accounting_Clients_ Quote _Edit" => "accounting/clients/quotes/Edit.php",
	"Accounting_Clients_ Quote _Edit2" => "accounting/clients/quotes/Edit2.php",

	// ================================================
	
	"Accounting_Employees_Home" => "accounting/employees/Home.php",

	// ================================================
	
	"Accounting_Inventory_Home" => "accounting/inventory/Home.php",
	"Accounting_Inventory_Items_List" => "accounting/inventory/items/List.php",
	"Accounting_Inventory_Items_Select" => "accounting/inventory/items/Select.php",
	"Accounting_Inventory_Item_View" => "accounting/inventory/items/View.php",
	"Accounting_Inventory_Item_Edit" => "accounting/inventory/items/Edit.php",
	"Accounting_Inventory_Item_New" => "accounting/inventory/items/New.php",
	
	"Accounting_Inventory_Catagories_Select" => "accounting/inventory/catagories/Select.php",
	"Accounting_Inventory_Catagories_List" => "accounting/inventory/catagories/List.php",
	"Accounting_Inventory_Catagory_View" => "accounting/inventory/catagories/View.php",
	"Accounting_Inventory_Catagory_New" => "accounting/inventory/catagories/New.php",
	"Accounting_Inventory_Catagory_Edit" => "accounting/inventory/catagories/Edit.php",
	
	// ================================================
	
	"Accounting_Vendors_Select" => "accounting/vendors/Select.php",
	"Accounting_Vendors_Home" => "accounting/vendors/Home.php",
	"Accounting_Vendors_List" => "accounting/vendors/List.php",
	"Accounting_Vendors_View" => "accounting/vendors/View.php",
	"Accounting_Vendors_New" => "accounting/vendors/New.php",
	"Accounting_Vendors_Edit" => "accounting/vendors/Edit.php",

	"Accounting_Vendors_Statements_Home" => "accounting/vendors/statements/Home.php",
	"Accounting_Vendors_Statements_Vendor" => "accounting/vendors/statements/Vendor.php",

	"Accounting_Vendors_PayChecks_Home" => "accounting/vendors/payments/Home.php",
	"Accounting_Vendors_PayChecks_List" => "accounting/vendors/payments/List.php",
	"Accounting_Vendors_PayCheck_View" => "accounting/vendors/payments/View.php",
	"Accounting_Vendors_PayCheck_New" => "accounting/vendors/payments/New.php",
	"Accounting_Vendors_PayCheck_Edit" => "accounting/vendors/payments/Edit.php",

	"Accounting_Vendors_Credits_Home" => "accounting/vendors/credits/Home.php",
	"Accounting_Vendors_Credits_List" => "accounting/vendors/credits/List.php",
	"Accounting_Vendors_Credit_View" => "accounting/vendors/credits/View.php",
	"Accounting_Vendors_Credit_New" => "accounting/vendors/credits/New.php",
	"Accounting_Vendors_Credit_Edit" => "accounting/vendors/credits/Edit.php",

	"Accounting_Vendors_Fees_Home" => "accounting/vendors/fees/Home.php",
	"Accounting_Vendors_Fees_Client" => "accounting/vendors/fees/Client.php",
	"Accounting_Vendors_Fee_New" => "accounting/vendors/fees/New.php",
	"Accounting_Vendors_Fee_Edit" => "accounting/vendors/fees/Edit.php",
	"Accounting_Vendors_Fee_View" => "accounting/vendors/fees/View.php",

	"Accounting_Vendors_Reimbursements_Home" => "accounting/vendors/reimbursements/Home.php",
	"Accounting_Vendors_Reimbursements_Client" => "accounting/vendors/reimbursements/Client.php",
	"Accounting_Vendors_Reimbursement_New" => "accounting/vendors/reimbursements/New.php",
	"Accounting_Vendors_Reimbursement_Edit" => "accounting/vendors/reimbursements/Edit.php",
	"Accounting_Vendors_Reimbursement_View" => "accounting/vendors/reimbursements/View.php",

	"Accounting_Vendors_Transfers_Home" => "accounting/vendors/transfers/Home.php",
	"Accounting_Vendors_Transfers_Client" => "accounting/vendors/transfers/Client.php",
	"Accounting_Vendors_Transfer_New" => "accounting/vendors/transfers/New.php",
	"Accounting_Vendors_Transfer_Edit" => "accounting/vendors/transfers/Edit.php",
	"Accounting_Vendors_Transfer_View" => "accounting/vendors/transfers/View.php",

	"Accounting_Vendors_POs_Home" => "accounting/vendors/pos/Home.php",
	"Accounting_Vendors_POs_Client" => "accounting/vendors/pos/Client.php",
	"Accounting_Vendors_PO_New" => "accounting/vendors/pos/New.php",
	"Accounting_Vendors_PO_Edit" => "accounting/vendors/pos/Edit.php",
	"Accounting_Vendors_PO_View" => "accounting/vendors/pos/View.php",

	// ================================================
	
	"Accounting_Employees_Select" => "accounting/employees/Select.php",
	"Accounting_Employees_Home" => "accounting/employees/Home.php",
	"Accounting_Employees_List" => "accounting/employees/List.php",
	"Accounting_Employees_View" => "accounting/employees/View.php",
	"Accounting_Employees_New" => "accounting/employees/New.php",
	"Accounting_Employees_Edit" => "accounting/employees/Edit.php",

	"Accounting_Employees_Statements_Home" => "accounting/employees/statements/Home.php",
	"Accounting_Employees_Statements_Employee" => "accounting/employees/statements/Employee.php",

	"Accounting_Employees_Credits_Home" => "accounting/employees/credits/Home.php",
	"Accounting_Employees_Credits_List" => "accounting/employees/credits/List.php",
	"Accounting_Employees_Credit_View" => "accounting/employees/credits/View.php",
	"Accounting_Employees_Credit_New" => "accounting/employees/credits/New.php",
	"Accounting_Employees_Credit_Edit" => "accounting/employees/credits/Edit.php",

	"Accounting_Employees_Fees_Home" => "accounting/employees/fees/Home.php",
	"Accounting_Employees_Fees_Client" => "accounting/employees/fees/Client.php",
	"Accounting_Employees_Fee_New" => "accounting/employees/fees/New.php",
	"Accounting_Employees_Fee_Edit" => "accounting/employees/fees/Edit.php",
	"Accounting_Employees_Fee_View" => "accounting/employees/fees/View.php",

	"Accounting_Employees_Expenses_Home" => "accounting/employees/expenses/Home.php",
	"Accounting_Employees_Expenses_Client" => "accounting/employees/expenses/Client.php",
	"Accounting_Employees_Expense_New" => "accounting/employees/expenses/New.php",
	"Accounting_Employees_Expense_Edit" => "accounting/employees/expenses/Edit.php",
	"Accounting_Employees_Expense_View" => "accounting/employees/expenses/View.php",

	"Accounting_Employees_PayChecks_Home" => "accounting/employees/paychecks/Home.php",
	"Accounting_Employees_PayChecks_List" => "accounting/employees/paychecks/List.php",
	"Accounting_Employees_PayCheck_View" => "accounting/employees/paychecks/View.php",
	"Accounting_Employees_PayCheck_New" => "accounting/employees/paychecks/New.php",
	"Accounting_Employees_PayCheck_Edit" => "accounting/employees/paychecks/Edit.php",

	"Accounting_Employees_Reimbursements_Home" => "accounting/employees/reimbursements/Home.php",
	"Accounting_Employees_Reimbursements_Client" => "accounting/employees/reimbursements/Client.php",
	"Accounting_Employees_Reimbursement_New" => "accounting/employees/reimbursements/New.php",
	"Accounting_Employees_Reimbursement_Edit" => "accounting/employees/reimbursements/Edit.php",
	"Accounting_Employees_Reimbursement_View" => "accounting/employees/reimbursements/View.php",

	// ================================================

	"Explorer_Folders_List" => "explorer/folders/List.php",
	"Explorer_Folder_View" => "explorer/folders/View.php",
	"Explorer_Folder_New" => "explorer/folders/New.php",
	"Explorer_Folder_Edit" => "explorer/folders/Edit.php",

	"Explorer_Item_View" => "explorer/items/View.php",
	"Explorer_Item_New" => "explorer/items/New.php",
	"Explorer_Item_Edit" => "explorer/items/Edit.php",

	"Explorer_Reference_View" => "explorer/references/View.php",
	"Explorer_Reference_New" => "explorer/references/New.php",
	"Explorer_Reference_Edit" => "explorer/references/Edit.php",

	"Explorer_Properties_Edit" => "explorer/properties/Edit.php",
	"Explorer_Properties_New" => "explorer/properties/New.php",
	"Explorer_Properties_View" => "explorer/properties/View.php",

	// ================================================
	
	"DayTimer_Home" => "daytimer/Home.php",
	"DayTimer_List" => "daytimer/List.php",
	"DayTimer_View" => "daytimer/View.php",
	"DayTimer_New" => "daytimer/New.php",
	"DayTimer_Edit" => "daytimer/Edit.php",

	"DayTimer_Calendar_Select" => "daytimer/Select.php",
	
	"DayTimer_Appointments_Home" => "daytimer/appointments/Home.php",
	"DayTimer_Appointments_List" => "daytimer/appointments/List.php",
	"DayTimer_Appointment_View" => "daytimer/appointments/View.php",
	"DayTimer_Appointment_New" => "daytimer/appointments/New.php",
	"DayTimer_Appointment_Edit" => "daytimer/appointments/Edit.php",

	"DayTimer_Notes_Home" => "daytimer/notes/Home.php",
	"DayTimer_Notes_List" => "daytimer/notes/List.php",
	"DayTimer_Note_View" => "daytimer/notes/View.php",
	"DayTimer_Note_New" => "daytimer/notes/New.php",
	"DayTimer_Note_Edit" => "daytimer/notes/Edit.php",

	"DayTimer_Projects_Home" => "daytimer/projects/Home.php",
	"DayTimer_Projects_List" => "daytimer/projects/List.php",
	"DayTimer_Project_View" => "daytimer/projects/View.php",
	"DayTimer_Project_New" => "daytimer/projects/New.php",
	"DayTimer_Project_Edit" => "daytimer/projects/Edit.php",

	"DayTimer_Rolodex_Home" => "daytimer/rolodex/Home.php",
	"DayTimer_Rolodex_List" => "daytimer/rolodex/List.php",
	"DayTimer_Rolodex_View" => "daytimer/rolodex/View.php",
	"DayTimer_Rolodex_New" => "daytimer/rolodex/New.php",
	"DayTimer_Rolodex_Edit" => "daytimer/rolodex/Edit.php",

	"DayTimer_Todos_Home" => "daytimer/todos/Home.php",
	"DayTimer_Todos_List" => "daytimer/todos/List.php",
	"DayTimer_Todo_View" => "daytimer/todos/View.php",
	"DayTimer_Todo_New" => "daytimer/todos/New.php",
	"DayTimer_Todo_Edit" => "daytimer/todos/Edit.php",

	"DayTimer_Settings_Home" => "daytimer/settings/Home.php",
	"DayTimer_Settings_List" => "daytimer/settings/List.php",
	"DayTimer_Setting_View" => "daytimer/settings/View.php",
	"DayTimer_Setting_New" => "daytimer/settings/New.php",
	"DayTimer_Setting_Edit" => "daytimer/settings/Edit.php",
);

// ====================================================
// validation 

//		if the page is not found, then stay on the current page.

$szPage = (isset ($_POST ["szPage"]) ? $_POST ["szPage"] : "");

if (! isset ($aryPages [ $szPage ] ))
	exit();
	
//	$szPage = $_SESSION ["szLastPage_Viewed"];

// ====================================================

$szCommand = $_POST ["szCommand"];
switch ($szCommand)
{
	case "getPage" : 
	{
			$_SESSION ["szLastPage_Viewed"] = $szPage;
			include ("forms/" . $aryPages [ $szPage ]);
	} break;
	
	case "loadPage" :
	{ 
		include ("forms/" . $aryPages [ $szPage ]);
	} break;
}

?>
