<?
class Error
{
   Private $errObjectName = "Error";
   
   Private $szDescription = "";
   Private $nNumber = 0;
   Private $szSource  = "";
   Private $szCallPath  = "";
   Private $szSQL  = "";

   // =============================================

	function __construct ($aryError)
	{
		$this->nNumber = $aryError ["nNumber"];
		$this->szDescription =  $aryError ["szDescription"];
		$this->szSource =  $aryError ["szSource"];
		$this->szCallPath =  $aryError ["szCallPath"];
		$this->szSQL =  $aryError ["szSQL"];
	}
	
   //  ===========================================

   Function No()
   { return $this->nNumber; }

   Function Description()
   { return $this->szDescription; }

   Function Number()
   { return $this->nNumber; }

   Function Source()
   { return $this->szSource; }

   Function CallPath()
   { return $this->szCallPath; }

   Function SQL() 
   { return $this->szSQL; }
}
?>
