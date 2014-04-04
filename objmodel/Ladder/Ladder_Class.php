<?
class ENetArch_Ladder_Class extends ENetArch_Ladder_Folder
{
	private $objDef = null;
	
	public function setState ($row)
	{
		parent::setState ($row);
		$this->objDef = $this->getItem ("", ENetArch_Ladder_Classes_Ladder_Defination);
		if ($this->objDef == null)
			print ("objDef == null <BR>");
	}
	
	public function get_BaseType () { return ($this->objDef->Field ("nBaseType") ); }
	public function get_ofClass () { return ($this->objDef->Field ("ofClass") ); }
	public function get_bAcceptsAll () { return ($this->objDef->Field ("bAcceptsAll") ); }
}
?>
