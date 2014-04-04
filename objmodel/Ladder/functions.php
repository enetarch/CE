<?
/*	=======================================
	Copyright 1998, 2000, 2003, 2007, 2009 - E Net Arch
	This program is distributed under the terms of the GNU 
	General Public License (or the Lesser GPL).
	www.ENetArch.net
	======================================= */

Function isReservedWord ($szWord)
{
   $szWord = strToUpper($szWord);
   
   If ($szWord == "SELECT") return true;
   If ($szWord == "DELETE") return true;
   If ($szWord == "INSERT") return true;
   If ($szWord == "UPDATE") return true;
   If ($szWord == "DROP") return true;
   If ($szWord == "TABLE") return true;
   If ($szWord == "CREATE") return true;

   return False;
}
   
   // =========================================

Function IIF ($tf, $ifTrue, $ifFalse)
{
   if ($tf)
   { return $ifTrue; }
   else
   { return $ifFalse; }
}


Function stringIDs ($aryIDs) 
{
   If (! is_Array ($aryIDs)) return;
   
   $nIDs = "";
   For ($t = 1; $t < count ($aryIDs)+1; $t++)
   {
      $nIDs = $nIDs . $aryIDs [$t];
      If ($t < count ($aryIDs)) $nIDs .= ", ";
   }
   
   return $nIDs;
}


   // =========================================

Function ParseString  ( $szStr ,  $szKey ) 
{   
   global $gblError, $gblDebugW, $bDebugging;

   $szArray = explode ($szKey, $szStr);

   If ($bDebugging) { $gblDebugW->iprint (" count (szArray) = " . count ($szArray)); }

   return $szArray;   


//   $szStr = Trim($szStr);
   
//   If (strLen($szStr) == 0) return;
   
//   $szArray = array(); // As String
//   $nIndex = 1;
   
//   For ($t = 1; $t< strLen(szStr); $t++)
//   {
//      $c = substr ($szStr, $t, 1);
      
//      switch ($c)
//      {
//         Case $szKey:
//            $nIndex += 1;
           
//         default:
//            $szArray [$nIndex] .= $c;
//      }   
//   }
   
}


   // =========================================

Function ParsePath( $szStr ) 
{
   $szStr = Trim($szStr);
   If (strLen($szStr) == 0) return;
   
   $szArray = explode (subStr ($szStr, 0, 1), $szStr);
   unset ($szArray[0]);
   
   // print ($szStr . "<P>");
   // print (count ($szArray) . "<P>");
   // var_dump ($szArray);
   // print ( "<P>");
   
   return ($szArray);
   
   
   If (strLen($szStr) == 0) return;
   If ((Left($szStr, 1) == "\\") || (Left($szStr, 1) == "/")) 
      $szStr = Right($szStr, Len($szStr) - 1);
   
   $szArray = array(); // As String
   $nIndex = 1;
   
   For ($t = 1; $t< strLen($szStr); $t++)
   {
      $c = substr ($szStr, $t, 1);
      
      switch ($c)
      {
         Case "\\":
         Case "/":
            $nIndex .= 1;
            
         default:
            $szArray [$nIndex] .= $c;
      }   
   }
   
   return szArray;   
}

   // =========================================

Function stringPath ($aryPath, $nStart)
{
   If (! is_array ($aryPath)) return;
      
   $szPath = "";
   
   For ($t = $nStart; $t < count($aryPath); $t++)
   {
      $szPath .= $aryPath(t);
      If ($t < count($aryPath)) 
         $szPath .= "\\";
      
   }
   
   return $szPath;
   
}

   // =========================================

Function strReplace ($szTarget , $szFind , $szReplace ) 
{
   If (Len($szTarget) == 0) return $szTarget;
   If (Len($szFind) == 0) return $szTarget;
   If (Len($szReplace) == 0) return $szTarget;
   
   $x = InStr($szTarget, $szFind);
   If ($x == 0) return $szTarget;
   
   $szLeft = Left($szTarget, x - 1);
   $szRight = Right($szTarget, Len($szTarget) - x - Len($szFind) + 1);
   
   return ($szLeft . $szReplace . $szRight );
   
}

   // =========================================

Function szBR() 
{   return ( "\r" ); }


Function szP() 
{  return ( "\r\r" ); }


   // =========================================

Function ConvertTo_ArrayCtrl ($rs) 
{
   If (isNothing(rs)) return;
   
   
   $aryIDs = array();

   $x = 0;
   While (! ($rs->BOF() || $rs->EOF()))
   {
      $x += 1;
      $aryIDs[x] = $rs->Field ("ID");
      $rs->MoveNext();
   }
   
   
   $ID2s = New ArrayCtrl();
   $ID2s->init($aryIDs);
   
   return ($ID2s);
}


Function printError($thsError)
{   
   print ("<BR>");
   print ("<BR>");
  
   print ("errSrc = " . $thsError->Source() . "<BR>");
   print ("errNo = " . $thsError->No() . "<BR>");
   print ("errDesc = " . $thsError->Description() . "<BR>");
   print ("errSQL = " . $thsError->SQL() . "<BR>");
   print ("errCallPath = " . "<BR>");
   
   $aryBuffer = explode (" ", $thsError->CallPath());
   
   foreach ($aryBuffer as $szBuffer)
   { print (str_pad("", 8, " ") . $szBuffer . "<BR>"); }
   
   print ("<BR>");
   print ("<BR>");
}

Function typeOf ($objClass)
 {  return get_class ($objClass); }

Function is_Boolean ($objClass)
{
   global $gblError, $gblDebugW, $bDebugging;
   
   
   $szClassType = get_class ($objClass) . gettype ($objClass);

   if ($bDebugging) { $gblDebugW->iprint ("Class = '" . $szClassType . "'"); }
   if ($bDebugging) { $gblDebugW->iprint ("Value = " . $objClass); }

   $bRtn = false;
   
   switch ($szClassType)
   { 
      case "boolean" :
         $bRtn = true; 
         break;
         
      case "string": 
      {
         $objClass = strToLower ($objClass);
         switch ($objClass)
         {
            case "0":
            case "1":
            case "true":
            case "false":
               $bRtn = true;
         }
         break;
      }
         
      case "integer": 
         switch ($objClass)
         {
            case 0: 
            case 1:
               $bRtn = true;
         }
         break;
   }
   
   return ($bRtn);
}

Function is_Date ($objClass)
{
   global $gblError, $gblDebugW, $bDebugging;
   
   $szClassType = gettype ($objClass);
   if ($szClassType == "object")
      $szClassType = get_class ($objClass);

   if ($bDebugging) { $gblDebugW->iprint ("Class = '" . $szClassType . "'"); }

   $bRtn = false;
   
   switch ($szClassType)
   { 
      case "DateTime" :
         if ($bDebugging) { $gblDebugW->iprint ("Value = " . $objClass->format ("Y-m-d")); }
         $bRtn = true; 
         break;
         
      case "string": 
         if ($bDebugging) { $gblDebugW->iprint ("Value = " . $objClass); }
         if (date_parse ($objClass)) $bRtn =  true; 
         break;
         
      case "integer": 
         if ($bDebugging) { $gblDebugW->iprint ("Value = " . $objClass); }
         if (getdate ($objClass) == null) $bRtn =  true; 
         break;
   }
   
   if ($bDebugging) { $gblDebugW->iprint ("bRtn = " . IIF (($bRtn), "true", "false")); }

   return ($bRtn);
}

Function Now ()
 { return Date ("Y-m-d H:i:s"); }
 
 // if an error is recieved from using this function
 // make sure that the Date / Time Zone is set correctly 
 // in the PHP INI file.  
 //
 // ex .. date.timezone = America/New_York
 
Function SQLEncode ($szString)
{
   $szRtn = "";
   $nlen = strLen($szString);
   If ($nlen == 0) return;

   For ($t = 0; $t < $nlen; $t++)
   {
      $szChar = substr($szString, $t, 1);
      $szRtn .= $szChar;
      If ($szChar == "'") $szRtn .= $szChar;
   }

   return ($szRtn);
}

Function printVars ()
{
	foreach ($_REQUEST as $key => $value)
		print ($key . " = " . $value . "<BR>");
}

?>
