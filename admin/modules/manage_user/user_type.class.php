<?php
class user_type extends base{	

	function run($task="")
	{
		$this->table= "user_type";

		parent::run($task);
	}
	
	function getPermission()
	{
		$permission= array();
		
		$arr= $this->db->getAssoc("select id, title from admin_menu where parent_id=0 order by z_index asc");
		foreach($arr as $key=>$value)
		{
			$permission[$key]= $value;
			$sub_arr= $this->db->getAssoc("select id, title from admin_menu where parent_id={$key} order by z_index asc");
			foreach($sub_arr as $sub_key=>$sub_value)
			{
				$permission[$sub_key]= "--- ".$sub_value;
			}
		}
		$this->smarty->assign("permission", $permission);
		
		$user_permission= $this->db->getCol("select admin_menu_id from user_permission where user_type_id=".$_GET["id"]);
		$this->smarty->assign("user_permission", $user_permission);
	}
	
	function savePermission($user_type_id=0)
	{
		$this->db->query("delete from user_permission where user_type_id=".$user_type_id);
		
		foreach($_POST["permission"] as $admin_menu_id)
		{
			$sql = "insert into user_permission(user_type_id, admin_menu_id) values($user_type_id, $admin_menu_id)";
			$this->db->query($sql);
		}
	}
	
	function add()
	{
		global $oForm, $oFCKeditor, $oDb, $oSmarty;

		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$row= array(
				"title" => $_POST["title"],
				"description" => $_POST["description"],
				"is_registered" => $_POST["is_registered"]+0		
			);
							
									
			$oDb -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			

			$user_type_id= $this->db->getOne("select max(id) from user_type");
			$this->savePermission($user_type_id);
			

			$this->redirect("add");
			exit();
			
		
			$oSmarty->assign("row", $row);	
		}
		
		$this->getPermission();
		
		$oSmarty->display("user_type.tpl");
	}
	
	function edit()
	{
		global $oSmarty, $oDb;
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$row= array(
				"title" => $_POST["title"],
				"description" => $_POST["description"],
				"is_registered" => $_POST["is_registered"]+0
			);
				
			$exist= $oDb->getRow("select * from user_type where title='".$_POST["title"]."'"); 
			if(is_array($exist) && $exist["id"]!=$_GET["id"])
			{
				if($exist["title"]==$_POST["title"])
				{							
						$oSmarty->assign("msg", "User type exist");																	
				}				
			}
			else
			{		
									
				$oDb -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_GET["id"]."'");
				$this->savePermission($_GET["id"]);
				
				/*$this->redirect("edit");
				exit();*/
			}
		}
		
		if(!is_array($row))
			$row= $oDb->getRow("select * from user_type where id='".$_GET["id"]."'");
		
		$oSmarty->assign("row", $row);
		
		$this->getPermission();
		
		$oSmarty->display("user_type.tpl");
	}

	
	function grid()
	{		
		
		$this->arr_filter= array(
			
		); 
		
		$this->arr_cols= array(		
			
			array(
				"field" => "id",					
				"primary_key" =>true,
				"visible"=>"hidden",
				"type" => "text",
				"sortable" => true,
				"searchable" => true
			),	
			array(
				"field" => "title",
				"display" => "Tên nhóm",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true,
				"width" => 200
			),			
			array(
				"field" => "description",
				"display" => "Ghi chú",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true,
				"width" => 400
			),			
			array(
				"field" => "is_registered",
				"display" => "Nhóm mặc định",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true,
				"width" => 200
			)			
		);
				
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, $this->debug);			
		
	}		
	
}

?>