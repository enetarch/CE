<?
$A = array (1, 3, 2, 5, 4, 4, 6, 3, 2);

print (solution ($A));


function solution($A) 
{
   /*
    the values in the given array represent the number of steps
    taken before a turn is made.
    
    {1, 3, 2, 5, 4, 4, 6, 3, 2}
    
    Find the first first time that the position is the exactly
    the starting position.
    
    if the start is (0,0), then find the first occurance of where
    (0,0) is found.
    
   */
   
   $px = 0;
   $py = 0;
   
   $nDir = 0; // 0 North, 1 East, 2 South, 3 West
   
   foreach ($A as $key => $value)
   {
        // print ($key . " - " . $nDir . " " . $value . " (" . $px . ", " . $py . ") <BR>");
        
        switch ($nDir)
        {
            case 0: { $px += $value; } break;
            case 1: { $py += $value; } break;
            case 2: { $px -= $value; } break;
            case 3: { $py -= $value; } break;
        }
        
        $nDir = ($nDir +1) %4;
   
     print ($key . " - " . $nDir . " " . $value . " (" . $px . ", " . $py . ") <BR>");
   
        if ($px == 0)
            if ($py == 0)
                return ($t);
   }
}

?>
