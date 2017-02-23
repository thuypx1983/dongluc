<?php
class rootpath extends base
{
	
	function run($task= "")
	{
		global $oSmarty;
		if($_GET["mod"]=="")
			$rootpath= "Quản trị hệ thống";
		else if($_GET["task"]=="login")
			$rootpath= "Đăng nhập hệ thống";
		else if($_GET["task"]=="password")
			$rootpath= "Tìm lại mật khẩu";
		else
		{		
			$sql= "select id from admin_menu where link <> '' AND INSTR('{$this->submit_url}', link)>0";

			//$sql = "select id from admin_menu where link = '{$this->submit_url}'";
			$id = $this->db->getOne($sql);

			$parent_title= $this->db->getOne("select title from admin_menu where id= (select parent_id from admin_menu where id='$id')");
			
			$title= $this->db->getOne("select title from admin_menu where id= '$id'");
			$rootpath= $parent_title." > ".$title;
			
			if($_GET['task']=='add')
			{
				$rootpath .= " > Thêm bản ghi";
			}
			else if($_GET['task']=='edit')
			{
				$rootpath .= " > Sửa bản ghi";
			}
		}
		
		if($rootpath!=" > ")
			$rootpath = str_replace(">","<span style='postision:absolute;top:0px;'><img src='".SITE_URL."admin/modules/datagrid/templates/images/root3.gif' border='0'  /></span>", $rootpath);
		else
			$rootpath= "";
	
		$oSmarty->assign("rootpath", $rootpath);
		
		if($_GET["msg"]!="" && $oSmarty->getVariable("msg"))
			$oSmarty->assign("msg", $_GET["msg"]);
		
		$oSmarty->display("rootpath.tpl");
	}
}
?>