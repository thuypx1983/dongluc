<?php
class header extends base
{	
	function run($task="")
	{
		global $oSmarty, $oDb;	
		
		$sql= "select admin_menu_id from user_permission where user_type_id='".$_SESSION["user_type_id"]."'";
		
		if($_SESSION["username"]=="root")
			$sql= "select id from admin_menu";
		
		$_SESSION['admin_permission']= $oDb->getCol($sql);
							
		//print_r($_SESSION['admin_permission']);
					
		if(is_array($_SESSION['admin_permission']) && count($_SESSION['admin_permission'])>0)
		{
			$menu = $oDb->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id=0 AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc"); echo mysql_error();
			
			foreach($menu as $key=>$value)
			{
				$menu[$key]["sub"]= $oDb->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id={$value['id']} AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc");
				
				foreach($menu[$key]["sub"] as $k=>$v)
				{
					$menu[$key]["sub"][$k]["sub"]= $oDb->getAll("SELECT * FROM admin_menu where is_show=1 AND parent_id={$v['id']} AND id in (".implode(",", $_SESSION['admin_permission']).") order by z_index asc");
				}
			}
			$_SESSION['admin_menu']= $menu;
		}

		$oSmarty->assign("date_day", date("d") );
		$oSmarty->assign("date_month", date("m") );
		$oSmarty->assign("date_year", date("Y") );		
		
		$slang= $this->db->getAssoc("select code, title from lang order by create_date asc");
		$oSmarty->assign("slang", $slang);
		
		// get photo
		$flag = $this->db->getOne("SELECT photo FROM lang WHERE code = '{$_SESSION['lang']}'");
		$oSmarty->assign("flag", $flag);
		$oSmarty->display('header.tpl');
	}
}
?>