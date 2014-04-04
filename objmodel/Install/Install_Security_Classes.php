<?
	include_once ("Install_Functions.inc");
	include_once ("../../shared/app.php");
	include_once ("../Ladder/Ladder_Ladder.php");

	// ==================================
	//	Security
	//
	//	Security
	//		Groups
	//			Group
	//				User
	//				Policies
	//		Users
	//			User
	//				Policies
	//				ACLs
	//					ACL
	//						User
	//						Group
	//						ACL_Rights
	//				Login

	CreateClass ("Security_Security", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Security_Groups", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Security_Group",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Security_UserRef",  ENetArch_Ladder_Globals::cisReference(), 0 , true);

	$clsSite_Policies = $gblLadder->getClass ("Site_Policies")->ID();
	CreateClass ("Security_Policies", ENetArch_Ladder_Globals::cisFolder(), $clsSite_Policies , true);

	CreateClass ("Security_Users", ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Security_User", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Security_ACLs",  ENetArch_Ladder_Globals::cisFolder(), 0 , true);
	CreateClass ("Security_ACL", ENetArch_Ladder_Globals::cisFolder(), 0 , true);

	CreateClass ("Security_GroupRef",  ENetArch_Ladder_Globals::cisReference(), 0 , true);

	$szStr =
		" bCreate bool, " .
		" bRead bool, " .
		" bUpdate bool, " .
		" bDelete bool, " .
		" bList bool, " .
		" bExec bool ";
	CreateClass ("Security_ACLRights", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

	$szStr =
		" dLogin DateTime, " .
		" szPassword varChar(40), " .
		" bActive Bit, " .
		" dInActive Bit, " .
		" szEmail varChar(250) ";
	CreateClass ("Security_Login", ENetArch_Ladder_Globals::cisItem(), 0 , true, $szStr);

?>
