<?

class ENetArch_Ladder_Links
{
		private $cn = null;
		private $aryLinks = null;
		
		function __construct (rpc $cn, $rows)
		{
				$this->cn = $cn;
				$this->aryLinks = $rows;
		}
		
		function __destruct ()
		{
		}
		
		function count ()
		{	return (count ($this->aryLinks) );	}

	function getItem ($nPos)
	{
		if (count ($this->aryLinks) < $nPos) 
			return (null);

		$row = $this->aryLinks [$nPos-1];
		$objItem = null;
		
		switch ($row [4])
		{
			case ENetArch_Ladder_Globals::cisRoot() :
			{
				$objItem = new ENetArch_Ladder_Folder ();
				break;
			}

			case ENetArch_Ladder_Globals::cisFolder() :
			{
				$objItem = new ENetArch_Ladder_Folder ();
				break;
			}

			case ENetArch_Ladder_Globals::cisItem() :
			{
				$objItem = new ENetArch_Ladder_Item ();
				break;
			}

			case ENetArch_Ladder_Globals::cisReference() :
			{
				$objItem = new ENetArch_Ladder_Reference ();
				break;
			}
		}

		if ($objItem != null)
		{
			$objItem->Connect ($this->cn);
			$objItem->setState ($row);
		}

		return ($objItem);
	}
	
	function getObject ($nPos, $thsObject)
	{

		if (count ($this->aryLinks) < $nPos) 
			return (null);
			
		$row = $this->aryLinks [$nPos-1];
			
		$thsObject->Connect ($this->cn);
		$thsObject->setState ($row);

		return ($thsObject);
	}
	
}

?>
