<?
if (!function_exists('json_last_error_msg')) {
    function json_last_error_msg() {
        static $errors = array(
            JSON_ERROR_NONE             => null,
            JSON_ERROR_DEPTH            => 'Maximum stack depth exceeded',
            JSON_ERROR_STATE_MISMATCH   => 'Underflow or the modes mismatch',
            JSON_ERROR_CTRL_CHAR        => 'Unexpected control character found',
            JSON_ERROR_SYNTAX           => 'Syntax error, malformed JSON',
            JSON_ERROR_UTF8             => 'Malformed UTF-8 characters, possibly incorrectly encoded'
        );
        $error = json_last_error();
        return array_key_exists($error, $errors) ? $errors[$error] : "Unknown error ({$error})";
    }
}

// ========================================================

$dirRoot = $_SERVER ["DOCUMENT_ROOT"] ;
$dirShared = $dirRoot . "/CE/shared";
$dirModel = $dirRoot . "/CE/objmodel";

include_once ($dirShared . "/app.php");

if (! isset ($_POST ["szCommand"]) )
exit ();

$rtn = Array ();
$szError = "";

$szCommand = $_POST  ["szCommand"];

if (isset ($_POST  ["szParams"]))
	$aryParams = json_decode ($_POST  ["szParams"], true);
// if ( json_last_error () != 0 )
	// print ( "json error = " . json_last_error_msg () . "<BR>");
	

switch ($szCommand)
{
		case "security::login" : include ("models/security/login.php");  break;
		case "security::add" : include ("models/security/add.php");  break;
		case "security::lockaccount" : include ("models/security/lockaccount.php");  break;
		case "security::unlockaccount" : include ("models/security/unlockaccount.php");  break;
		case "security::resetpsw" : include ("models/security/resetpsw.php");  break;
		
		case "clients::list" : include ("models/clients/list.php");  break;
		case "client::add" : include ("models/clients/add.php");  break;
		case "client::update" : include ("models/clients/update.php");  break;
		case "client::get" : include ("models/clients/get.php");  break;

		case "workorders::list" : include ("models/workorders/list.php");  break;
		case "workorder::add" : include ("models/workorders/add.php");  break;
		case "workorder::update" : include ("models/workorders/update.php");  break;
		case "workorder::get" : include ("models/workorders/get.php");  break;

		case "calendar::list" : include ("models/calendar/list.php");  break;
		case "calendar::add" : include ("models/calendar/add.php");  break;
		case "calendar::update" : include ("models/calendar/update.php");  break;
		case "calendar::get" : include ("models/calendar/get.php");  break;

		case "todos::list" : include ("models/todos/list.php");  break;
		case "todo::add" : include ("models/todos/add.php");  break;
		case "todo::update" : include ("models/todos/update.php");  break;
		case "todo::get" : include ("models/todos/get.php");  break;

		// ====================================================
		
		case "accounting::inventory::items::list" :  include ("models/accounting/inventory/items/list.php");  break;
		case "accounting::inventory::item::get" :  include ("models/accounting/inventory/items/get.php");  break;

		// ====================================================
		
		case "accounting::inventory::catagories::list" :  include ("models/accounting/inventory/catagories/list.php");  break;
		case "accounting::inventory::catagory::get" :  include ("models/accounting/inventory/catagories/get.php");  break;

		// ====================================================
		
		case "accounting::banking::list" :  include ("models/accounting/banking/list.php");  break;
		case "accounting::banking::get" :  include ("models/accounting/banking/get.php");  break;
		case "accounting::banking::add" :  include ("models/accounting/banking/add.php");  break;
		case "accounting::banking::update" :  include ("models/accounting/banking/update.php");  break;
		case "accounting::banking::delete" :  include ("models/accounting/banking/delete.php");  break;

		case "accounting::banking::statements::list" : include ("models/accounting/banking/statements/list.php"); break;
		case "accounting::banking::statement::get" : include ("models/accounting/banking/statements/get.php"); break;

		case "accounting::banking::checks::list" :  include ("models/accounting/banking/checks/list.php");  break;
		case "accounting::banking::check::get" :  include ("models/accounting/banking/checks/get.php");  break;
		case "accounting::banking::check::add" :  include ("models/accounting/banking/checks/add.php");  break;
		case "accounting::banking::check::update" :  include ("models/accounting/banking/checks/update.php");  break;
		case "accounting::banking::check::delete" : include ("models/accounting/banking/checks/delete.php"); break;

		case "accounting::banking::credits::list" :  include ("models/accounting/banking/credits/list.php");  break;
		case "accounting::banking::credit::get" :  include ("models/accounting/banking/credits/get.php");  break;
		case "accounting::banking::credit::add" :  include ("models/accounting/banking/credits/add.php");  break;
		case "accounting::banking::credit::update" :  include ("models/accounting/banking/credits/update.php");  break;
		case "accounting::banking::credit::delete" : include ("models/accounting/banking/credit/delete.php"); break;

		case "accounting::banking::fees::list" : include ("models/accounting/banking/fees/list.php"); break;
		case "accounting::banking::fee::get" : include ("models/accounting/banking/fees/get.php"); break;
		case "accounting::banking::fee::delete" : include ("models/accounting/banking/fees/delete.php"); break;
		case "accounting::banking::fee::update" : include ("models/accounting/banking/fees/update.php"); break;
		case "accounting::banking::fee::add" : include ("models/accounting/banking/fees/add.php"); break;

		case "accounting::banking::reimbursements::list" : include ("models/accounting/banking/reimbursements/list.php"); break;
		case "accounting::banking::reimbursement::get" : include ("models/accounting/banking/reimbursements/get.php"); break;
		case "accounting::banking::reimbursement::delete" : include ("models/accounting/banking/reimbursements/delete.php"); break;
		case "accounting::banking::reimbursement::update" : include ("models/accounting/banking/reimbursements/update.php"); break;
		case "accounting::banking::reimbursement::add" : include ("models/accounting/banking/reimbursements/add.php"); break;

		case "accounting::banking::transfers::list" : include ("models/accounting/banking/transfers/list.php"); break;
		case "accounting::banking::transfer::get" : include ("models/accounting/banking/transfers/get.php"); break;
		case "accounting::banking::transfer::delete" : include ("models/accounting/banking/transfers/delete.php"); break;
		case "accounting::banking::transfer::update" : include ("models/accounting/banking/transfers/update.php"); break;
		case "accounting::banking::transfer::add" : include ("models/accounting/banking/transfers/add.php"); break;

		case "accounting::banking::deposits::list" : include ("models/accounting/banking/deposits/list.php"); break;
		case "accounting::banking::deposit::get" : include ("models/accounting/banking/deposits/get.php"); break;
		case "accounting::banking::deposit::delete" : include ("models/accounting/banking/deposits/delete.php"); break;
		case "accounting::banking::deposit::update" : include ("models/accounting/banking/deposits/update.php"); break;
		case "accounting::banking::deposit::add" : include ("models/accounting/banking/deposits/add.php"); break;

		case "accounting::banking::deposits::checks::list" : include ("models/accounting/banking/deposits/checks/list.php"); break;
		case "accounting::banking::deposits::check::get" : include ("models/accounting/banking/deposits/checks/get.php"); break;
		case "accounting::banking::deposits::check::delete" : include ("models/accounting/banking/deposits/checks/delete.php"); break;
		case "accounting::banking::deposits::check::update" : include ("models/accounting/banking/deposits/checks/update.php"); break;
		case "accounting::banking::deposits::check::add" : include ("models/accounting/banking/deposits/checks/add.php"); break;

		// ====================================================

		case "accounting::clients::invoices::list" :  include ("models/accounting/clients/invoices/list.php");  break;
		case "accounting::clients::invoice::get" :  include ("models/accounting/clients/invoices/get.php");  break;
		case "accounting::clients::invoice::add" :  include ("models/accounting/clients/invoices/add.php");  break;
		case "accounting::clients::invoice::update" :  include ("models/accounting/clients/invoices/update.php");  break;
		
		case "accounting::clients::invoice::items::list" : include ("models/accounting/clients/invoices/items/list.php"); break;
		case "accounting::clients::invoice::item::add" : include ("models/accounting/clients/invoices/items/add.php"); break;
		case "accounting::clients::invoice::item::update" : include ("models/accounting/clients/invoices/items/update.php"); break;
		case "accounting::clients::invoice::item::delete" : include ("models/accounting/clients/invoices/items/delete.php"); break;
		
		case "accounting::clients::credits::list" :  include ("models/accounting/clients/credits/list.php");  break;
		case "accounting::clients::credit::get" :  include ("models/accounting/clients/credits/get.php");  break;
		case "accounting::clients::credit::add" :  include ("models/accounting/clients/credits/add.php");  break;
		case "accounting::clients::credit::update" :  include ("models/accounting/clients/credits/update.php");  break;
		
		case "accounting::clients::credit::items::list" : include ("models/accounting/clients/credits/items/list.php"); break;
		case "accounting::clients::credit::item::add" : include ("models/accounting/clients/credits/items/add.php"); break;
		case "accounting::clients::credit::item::update" : include ("models/accounting/clients/credits/items/update.php"); break;
		case "accounting::clients::credit::item::delete" : include ("models/accounting/clients/credits/items/delete.php"); break;
		

		case "accounting::clients::quotes::list" :  include ("models/accounting/clients/quotes/list.php");  break;
		case "accounting::clients::quote::get" :  include ("models/accounting/clients/quotes/get.php");  break;
		case "accounting::clients::quote::add" :  include ("models/accounting/clients/quotes/add.php");  break;
		case "accounting::clients::quote::update" :  include ("models/accounting/clients/quotes/update.php");  break;
		
		case "accounting::clients::quote::items::list" : include ("models/accounting/clients/quotes/items/list.php"); break;
		case "accounting::clients::quote::item::add" : include ("models/accounting/clients/quotes/items/add.php"); break;
		case "accounting::clients::quote::item::update" : include ("models/accounting/clients/quotes/items/update.php"); break;
		case "accounting::clients::quote::item::delete" : include ("models/accounting/clients/quotes/items/delete.php"); break;
		

		case "accounting::clients::orders::list" :  include ("models/accounting/clients/orders/list.php");  break;
		case "accounting::clients::order::get" :  include ("models/accounting/clients/orders/get.php");  break;
		case "accounting::clients::order::add" :  include ("models/accounting/clients/orders/add.php");  break;
		case "accounting::clients::order::update" :  include ("models/accounting/clients/orders/update.php");  break;
		
		case "accounting::clients::order::items::list" : include ("models/accounting/clients/orders/items/list.php"); break;
		case "accounting::clients::order::item::add" : include ("models/accounting/clients/orders/items/add.php"); break;
		case "accounting::clients::order::item::update" : include ("models/accounting/clients/orders/items/update.php"); break;
		case "accounting::clients::order::item::delete" : include ("models/accounting/clients/orders/items/delete.php"); break;
		
		case "accounting::clients::returns::list" :  include ("models/accounting/clients/returns/list.php");  break;
		case "accounting::clients::return::get" :  include ("models/accounting/clients/returns/get.php");  break;
		case "accounting::clients::return::add" :  include ("models/accounting/clients/returns/add.php");  break;
		case "accounting::clients::return::update" :  include ("models/accounting/clients/returns/update.php");  break;
		
		case "accounting::clients::return::items::list" : include ("models/accounting/clients/returns/items/list.php"); break;
		case "accounting::clients::return::item::add" : include ("models/accounting/clients/returns/items/add.php"); break;
		case "accounting::clients::return::item::update" : include ("models/accounting/clients/returns/items/update.php"); break;
		case "accounting::clients::return::item::delete" : include ("models/accounting/clients/returns/items/delete.php"); break;
		

		case "accounting::clients::fees::list" : include ("models/accounting/clients/fees/list.php"); break;
		case "accounting::clients::fee::get" : include ("models/accounting/clients/fees/get.php"); break;
		case "accounting::clients::fee::delete" : include ("models/accounting/clients/fees/delete.php"); break;
		case "accounting::clients::fee::update" : include ("models/accounting/clients/fees/update.php"); break;
		case "accounting::clients::fee::add" : include ("models/accounting/clients/fees/add.php"); break;

		case "accounting::clients::payments::list" : include ("models/accounting/clients/payments/list.php"); break;
		case "accounting::clients::payment::get" : include ("models/accounting/clients/payments/get.php"); break;
		case "accounting::clients::payment::delete" : include ("models/accounting/clients/payments/delete.php"); break;
		case "accounting::clients::payment::update" : include ("models/accounting/clients/payments/update.php"); break;
		case "accounting::clients::payment::add" : include ("models/accounting/clients/payments/add.php"); break;

		case "accounting::clients::reimbursements::list" : include ("models/accounting/clients/reimbursements/list.php"); break;
		case "accounting::clients::reimbursement::get" : include ("models/accounting/clients/reimbursements/get.php"); break;
		case "accounting::clients::reimbursement::delete" : include ("models/accounting/clients/reimbursements/delete.php"); break;
		case "accounting::clients::reimbursement::update" : include ("models/accounting/clients/reimbursements/update.php"); break;
		case "accounting::clients::reimbursement::add" : include ("models/accounting/clients/reimbursements/add.php"); break;

		case "accounting::clients::statements::list" : include ("models/accounting/clients/statements/list.php"); break;
		case "accounting::clients::statement::get" : include ("models/accounting/clients/statements/get.php"); break;

		// ====================================================

		case "accounting::vendors::list" :  include ("models/accounting/vendors/list.php");  break;
		case "accounting::vendors::get" :  include ("models/accounting/vendors/get.php");  break;
		case "accounting::vendors::add" :  include ("models/accounting/vendors/add.php");  break;
		case "accounting::vendors::update" :  include ("models/accounting/vendors/update.php");  break;
		case "accounting::vendors::delete" :  include ("models/accounting/vendors/delete.php");  break;

		case "accounting::vendors::statements::list" : include ("models/accounting/vendors/statements/list.php"); break;
		case "accounting::vendors::statement::get" : include ("models/accounting/vendors/statements/get.php"); break;

		case "accounting::vendors::pos::list" :  include ("models/accounting/vendors/pos/list.php");  break;
		case "accounting::vendors::po::get" :  include ("models/accounting/vendors/pos/get.php");  break;
		case "accounting::vendors::po::add" :  include ("models/accounting/vendors/pos/add.php");  break;
		case "accounting::vendors::po::update" :  include ("models/accounting/vendors/pos/update.php");  break;
		
		case "accounting::vendors::pos::items::list" : include ("models/accounting/vendors/pos/items/list.php"); break;
		case "accounting::vendors::pos::item::add" : include ("models/accounting/vendors/pos/items/add.php"); break;
		case "accounting::vendors::pos::item::update" : include ("models/accounting/vendors/pos/items/update.php"); break;
		case "accounting::vendors::pos::item::delete" : include ("models/accounting/vendors/pos/items/delete.php"); break;
		
		case "accounting::vendors::credits::list" :  include ("models/accounting/vendors/credits/list.php");  break;
		case "accounting::vendors::credit::get" :  include ("models/accounting/vendors/credits/get.php");  break;
		case "accounting::vendors::credit::add" :  include ("models/accounting/vendors/credits/add.php");  break;
		case "accounting::vendors::credit::update" :  include ("models/accounting/vendors/credits/update.php");  break;
		
		case "accounting::vendors::credit::items::list" : include ("models/accounting/vendors/credits/items/list.php"); break;
		case "accounting::vendors::credit::item::add" : include ("models/accounting/vendors/credits/items/add.php"); break;
		case "accounting::vendors::credit::item::update" : include ("models/accounting/vendors/credits/items/update.php"); break;
		case "accounting::vendors::credit::item::delete" : include ("models/accounting/vendors/credits/items/delete.php"); break;
		

		case "accounting::vendors::quotes::list" :  include ("models/accounting/vendors/quotes/list.php");  break;
		case "accounting::vendors::quote::get" :  include ("models/accounting/vendors/quotes/get.php");  break;
		case "accounting::vendors::quote::add" :  include ("models/accounting/vendors/quotes/add.php");  break;
		case "accounting::vendors::quote::update" :  include ("models/accounting/vendors/quotes/update.php");  break;
		
		case "accounting::vendors::quote::items::list" : include ("models/accounting/vendors/quotes/items/list.php"); break;
		case "accounting::vendors::quote::item::add" : include ("models/accounting/vendors/quotes/items/add.php"); break;
		case "accounting::vendors::quote::item::update" : include ("models/accounting/vendors/quotes/items/update.php"); break;
		case "accounting::vendors::quote::item::delete" : include ("models/accounting/vendors/quotes/items/delete.php"); break;
		

		case "accounting::vendors::orders::list" :  include ("models/accounting/vendors/orders/list.php");  break;
		case "accounting::vendors::order::get" :  include ("models/accounting/vendors/orders/get.php");  break;
		case "accounting::vendors::order::add" :  include ("models/accounting/vendors/orders/add.php");  break;
		case "accounting::vendors::order::update" :  include ("models/accounting/vendors/orders/update.php");  break;
		
		case "accounting::vendors::order::items::list" : include ("models/accounting/vendors/orders/items/list.php"); break;
		case "accounting::vendors::order::item::add" : include ("models/accounting/vendors/orders/items/add.php"); break;
		case "accounting::vendors::order::item::update" : include ("models/accounting/vendors/orders/items/update.php"); break;
		case "accounting::vendors::order::item::delete" : include ("models/accounting/vendors/orders/items/delete.php"); break;
		
		case "accounting::vendors::returns::list" :  include ("models/accounting/vendors/returns/list.php");  break;
		case "accounting::vendors::return::get" :  include ("models/accounting/vendors/returns/get.php");  break;
		case "accounting::vendors::return::add" :  include ("models/accounting/vendors/returns/add.php");  break;
		case "accounting::vendors::return::update" :  include ("models/accounting/vendors/returns/update.php");  break;
		
		case "accounting::vendors::return::items::list" : include ("models/accounting/vendors/returns/items/list.php"); break;
		case "accounting::vendors::return::item::add" : include ("models/accounting/vendors/returns/items/add.php"); break;
		case "accounting::vendors::return::item::update" : include ("models/accounting/vendors/returns/items/update.php"); break;
		case "accounting::vendors::return::item::delete" : include ("models/accounting/vendors/returns/items/delete.php"); break;
		

		case "accounting::vendors::fees::list" : include ("models/accounting/vendors/fees/list.php"); break;
		case "accounting::vendors::fee::get" : include ("models/accounting/vendors/fees/get.php"); break;
		case "accounting::vendors::fee::delete" : include ("models/accounting/vendors/fees/delete.php"); break;
		case "accounting::vendors::fee::update" : include ("models/accounting/vendors/fees/update.php"); break;
		case "accounting::vendors::fee::add" : include ("models/accounting/vendors/fees/add.php"); break;

		case "accounting::vendors::payments::list" : include ("models/accounting/vendors/payments/list.php"); break;
		case "accounting::vendors::payment::get" : include ("models/accounting/vendors/payments/get.php"); break;
		case "accounting::vendors::payment::delete" : include ("models/accounting/vendors/payments/delete.php"); break;
		case "accounting::vendors::payment::update" : include ("models/accounting/vendors/payments/update.php"); break;
		case "accounting::vendors::payment::add" : include ("models/accounting/vendors/payments/add.php"); break;

		case "accounting::vendors::reimbursements::list" : include ("models/accounting/vendors/reimbursements/list.php"); break;
		case "accounting::vendors::reimbursement::get" : include ("models/accounting/vendors/reimbursements/get.php"); break;
		case "accounting::vendors::reimbursement::delete" : include ("models/accounting/vendors/reimbursements/delete.php"); break;
		case "accounting::vendors::reimbursement::update" : include ("models/accounting/vendors/reimbursements/update.php"); break;
		case "accounting::vendors::reimbursement::add" : include ("models/accounting/vendors/reimbursements/add.php"); break;

		case "accounting::vendors::statements::list" : include ("models/accounting/vendors/statements/list.php"); break;
		case "accounting::vendors::statement::get" : include ("models/accounting/vendors/statements/get.php"); break;

		// ====================================================

		case "accounting::employees::list" :  include ("models/accounting/employees/list.php");  break;
		case "accounting::employees::get" :  include ("models/accounting/employees/get.php");  break;
		case "accounting::employees::add" :  include ("models/accounting/employees/add.php");  break;
		case "accounting::employees::update" :  include ("models/accounting/employees/update.php");  break;
		case "accounting::employees::delete" :  include ("models/accounting/employees/delete.php");  break;

		case "accounting::employees::statements::list" : include ("models/accounting/employees/statements/list.php"); break;
		case "accounting::employees::statement::get" : include ("models/accounting/employees/statements/get.php"); break;

		case "accounting::employees::expenses::list" :  include ("models/accounting/employees/expenses/list.php");  break;
		case "accounting::employees::expense::get" :  include ("models/accounting/employees/expenses/get.php");  break;
		case "accounting::employees::expense::add" :  include ("models/accounting/employees/expenses/add.php");  break;
		case "accounting::employees::expense::update" :  include ("models/accounting/employees/expenses/update.php");  break;
		
		case "accounting::employees::expenses::items::list" : include ("models/accounting/employees/expenses/items/list.php"); break;
		case "accounting::employees::expenses::item::add" : include ("models/accounting/employees/expenses/items/add.php"); break;
		case "accounting::employees::expenses::item::update" : include ("models/accounting/employees/expenses/items/update.php"); break;
		case "accounting::employees::expenses::item::delete" : include ("models/accounting/employees/expenses/items/delete.php"); break;
		
		case "accounting::employees::credits::list" :  include ("models/accounting/employees/credits/list.php");  break;
		case "accounting::employees::credit::get" :  include ("models/accounting/employees/credits/get.php");  break;
		case "accounting::employees::credit::add" :  include ("models/accounting/employees/credits/add.php");  break;
		case "accounting::employees::credit::update" :  include ("models/accounting/employees/credits/update.php");  break;
		
		case "accounting::employees::credit::items::list" : include ("models/accounting/employees/credits/items/list.php"); break;
		case "accounting::employees::credit::item::add" : include ("models/accounting/employees/credits/items/add.php"); break;
		case "accounting::employees::credit::item::update" : include ("models/accounting/employees/credits/items/update.php"); break;
		case "accounting::employees::credit::item::delete" : include ("models/accounting/employees/credits/items/delete.php"); break;
		
		case "accounting::employees::fees::list" : include ("models/accounting/employees/fees/list.php"); break;
		case "accounting::employees::fee::get" : include ("models/accounting/employees/fees/get.php"); break;
		case "accounting::employees::fee::delete" : include ("models/accounting/employees/fees/delete.php"); break;
		case "accounting::employees::fee::update" : include ("models/accounting/employees/fees/update.php"); break;
		case "accounting::employees::fee::add" : include ("models/accounting/employees/fees/add.php"); break;

		case "accounting::employees::paychecks::list" : include ("models/accounting/employees/paychecks/list.php"); break;
		case "accounting::employees::paycheck::get" : include ("models/accounting/employees/paychecks/get.php"); break;
		case "accounting::employees::paycheck::delete" : include ("models/accounting/employees/paychecks/delete.php"); break;
		case "accounting::employees::paycheck::update" : include ("models/accounting/employees/paychecks/update.php"); break;
		case "accounting::employees::paycheck::add" : include ("models/accounting/employees/paychecks/add.php"); break;

		case "accounting::employees::reimbursements::list" : include ("models/accounting/employees/reimbursements/list.php"); break;
		case "accounting::employees::reimbursement::get" : include ("models/accounting/employees/reimbursements/get.php"); break;
		case "accounting::employees::reimbursement::delete" : include ("models/accounting/employees/reimbursements/delete.php"); break;
		case "accounting::employees::reimbursement::update" : include ("models/accounting/employees/reimbursements/update.php"); break;
		case "accounting::employees::reimbursement::add" : include ("models/accounting/employees/reimbursements/add.php"); break;

		case "accounting::employees::statements::list" : include ("models/accounting/employees/statements/list.php"); break;
		case "accounting::employees::statement::get" : include ("models/accounting/employees/statements/get.php"); break;

		// ====================================================

		case "explorer::folders::list" : include ("models/explorer/folders/list.php");  break;
		case "explorer::folder::get" : include ("models/explorer/folders/get.php");  break;
		case "explorer::folder::delete" : include ("models/explorer/folders/delete.php");  break;
		case "explorer::folder::update" : include ("models/explorer/folders/update.php");  break;
		case "explorer::folder::add" : include ("models/explorer/folders/add.php");  break;
		
		case "explorer::folder::newinstance" : include ("models/explorer/folders/newinstance.php");  break;

		case "explorer::items::list" : include ("models/explorer/items/list.php");  break;
		case "explorer::item::get" : include ("models/explorer/items/get.php");  break;
		case "explorer::item::delete" : include ("models/explorer/items/delete.php");  break;
		case "explorer::item::update" : include ("models/explorer/items/update.php");  break;
		case "explorer::item::add" : include ("models/explorer/items/add.php");  break;

		case "explorer::references::list" : include ("models/explorer/reference/list.php");  break;
		case "explorer::reference::get" : include ("models/explorer/reference/get.php");  break;
		case "explorer::reference::delete" : include ("models/explorer/reference/delete.php");  break;
		case "explorer::reference::update" : include ("models/explorer/reference/update.php");  break;
		case "explorer::reference::add" : include ("models/explorer/reference/add.php");  break;

		case "explorer::properties::get" : include ("models/explorer/properties/get.php");  break;
		case "explorer::properties::rename" : include ("models/explorer/properties/rename.php");  break;
		case "explorer::properties::get_parent" : include ("models/explorer/properties/get_parent.php");  break;

		case "explorer::properties::copy" : include ("models/explorer/properties/copy.php");  break;
		case "explorer::properties::dupe" : include ("models/explorer/properties/dupe.php");  break;
		case "explorer::properties::move" : include ("models/explorer/properties/move.php");  break;
		case "explorer::properties::reference" : include ("models/explorer/properties/reference.php");  break;

		case "explorer::classes::list" :  include ("models/explorer/classes/list.php");  break;

		// ====================================================

		case "daytimer::appointments::list" : include ("models/daytimer/appointments/list.php");  break;
		case "daytimer::appointment::add" : include ("models/daytimer/appointments/add.php");  break;
		case "daytimer::appointment::update" : include ("models/daytimer/appointments/update.php");  break;
		case "daytimer::appointment::get" : include ("models/daytimer/appointments/get.php");  break;

		case "daytimer::calendar::list" : include ("models/daytimer/calendar/list.php");  break;
		case "daytimer::calendar::add" : include ("models/daytimer/calendar/add.php");  break;
		case "daytimer::calendar::update" : include ("models/daytimer/calendar/update.php");  break;
		case "daytimer::calendar::get" : include ("models/daytimer/calendar/get.php");  break;

		case "daytimer::projects::list" : include ("models/daytimer/projects/list.php");  break;
		case "daytimer::project::add" : include ("models/daytimer/projects/add.php");  break;
		case "daytimer::project::update" : include ("models/daytimer/projects/update.php");  break;
		case "daytimer::project::get" : include ("models/daytimer/projects/get.php");  break;

		case "daytimer::todos::list" : include ("models/daytimer/todos/list.php");  break;
		case "daytimer::todo::add" : include ("models/daytimer/todos/add.php");  break;
		case "daytimer::todo::update" : include ("models/daytimer/todos/update.php");  break;
		case "daytimer::todo::get" : include ("models/daytimer/todos/get.php");  break;

		case "daytimer::notes::folders::list" : include ("models/daytimer/notes/list.php");  break;
		case "daytimer::notes::folder::add" : include ("models/daytimer/notes/add.php");  break;
		case "daytimer::notes::folder::update" : include ("models/daytimer/notes/update.php");  break;
		case "daytimer::notes::folder::get" : include ("models/daytimer/notes/get.php");  break;

		case "daytimer::note::add" : include ("models/daytimer/note/add.php");  break;
		case "daytimer::note::update" : include ("models/daytimer/note/update.php");  break;
		case "daytimer::note::get" : include ("models/daytimer/note/get.php");  break;

		// ====================================================

}

$aryReturn = Array
(
	"command" => $szCommand,
	"szParams" => $_POST  ["szParams"],
	"json_Error" => json_last_error() . ": " . json_last_error_msg(),
	"params" => $aryParams,
	"return" => $rtn,
	"error" => $szError,
//	"path" => $dirShared,
//	"cwd" => $_SERVER ["SCRIPT_FILENAME"],
);

print ( json_encode ($aryReturn) );
?>
