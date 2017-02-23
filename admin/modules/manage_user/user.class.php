<?php
class user extends base
{
	function run($task="")
	{
		$this->table = "user";
		$this->table_category = "user_type";
		

		switch ($task)
		{
			case "edit_profile":
				$this->edit_profile();
				break;
			case "log":
					$log= $this->db->getAll("select * from user_log where user_id='{$_GET[id]}' order by create_date desc limit 100");
					$this->smarty->assign("log", $log);
					$this->smarty->display("user_log.tpl");
					break;
			default:
				parent::run($task);
		}
	}
	
	function getAssocUserType()
	{
		return $this->db->getAssoc("select id, title from {$this->table_category} order by title");
	}
	
	function getAssocUtype()
	{
		return array('adv'=>'Advertiser','pub'=>'Publisher','pub+adv'=>'Pub+adv');
	}
	
	function getProvince()
	{
		return $this->db->getAssoc("select id, title from province order by title asc");
	}

	function add()
	{
		if($_SESSION["username"]!='root') {
			header("Location: ".SITE_URL."admin");
		}
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$row= array(		
				"username" =>$_POST["username"],
				"password" =>sha1(md5(PASSSWORD_HASH.$_POST["password"])),
				"email" =>$_POST["email"],
				"user_type_id" => $_POST["user_type_id"]+0,
				"is_status" => $_POST["is_status"]+0,
				"is_active" => $_POST["is_active"]+0,
				"create_date" => date("Y-m-d H:i:s"),
				"fullname" => $_POST["fullname"],
				"phone" => $_POST["phone"],
				"address" => $_POST["address"],
			);
				
			$exist= $this->db->getRow("select * from {$this->table} where username='".$_POST["username"]."' or email='".$_POST["email"]."'");

			if(count($exist)>0)
			{ 
				if($exist["username"]==$_POST["username"])
				{							
					$this->smarty->assign("msg", "username_exist");																	
				}
				elseif($exist["email"]==$_POST["email"])
				{
					$this->smarty->assign("msg", "email_exist");
				}
			}
			else
			{						
				$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
				$this->smarty->assign("msg", "Thêm mới thành công");
				echo mysql_error();				
				/*$this->redirect("add");
				exit();*/
				
			}
		
			$this->smarty->assign("row", $row);	
		}
		
		$this->smarty->assign("user_type", $this->getAssocUserType());
		$this->smarty->display("user.tpl");
	}
	function edit_profile()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$pass = sha1(md5(PASSSWORD_HASH.$_POST["old_password"]));
		
			$rs = $this->db->getAll("select * from user where id = '{$_SESSION[user_id]}' and password = '{$pass}'");
			if(count($rs)>0)
			{
				$new_pass = sha1(md5(PASSSWORD_HASH.$_POST["new_password"]));
				/*$this->db->query("update user set password = '{$new_pass}' where id = '{$_SESSION[user_id]}'");*/
				
				$row= array(				
					"password" => $new_pass,
					"email" =>$_POST["email"],
					"fullname" => $_POST["fullname"],
					"phone" => $_POST["phone"],

				);
				
				$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_SESSION["user_id"]."'");
				$this->smarty->assign("msg", "Cập nhật thành công");
			}
			else
			{
				$this->smarty->assign("msg", "Mật khẩu cũ không đúng");
			}

		}
		
		$row = $this->db->getRow("select * from user where id = '{$_SESSION[user_id]}'");
		$this->smarty->assign("row", $row);
		
		$this->smarty->display('edit_profile.tpl');
	}
	function edit()
	{
		$error=0;
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$row= array(
				"email" =>$_POST["email"],
				"user_type_id" => $_POST["user_type_id"]+0,
				"is_status" => $_POST["is_status"]+0,
				"is_active" => $_POST["is_active"]+0,
				"fullname" => $_POST["fullname"],
				"phone" => $_POST["phone"],
				"address" => $_POST["address"],
				"username" => $_POST["username"],
			);
				
			if($_POST["password"]!='')
				$row['password']= sha1(md5(PASSSWORD_HASH.$_POST["password"]));
			
			$exist = $this->db->getRow("select * from {$this->table} where id !='".$_GET["id"]."'");
			if( $exist["email"] == $_POST["email"])	{
				echo  "<center> <B>Edit error! Email exits</b></center>";
				$error=1;
			}
			if($error!=1) {	
				$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_GET["id"]."'");
				/*echo mysql_error();*/
				$this->smarty->assign("msg", "Cập nhật thành công");
				/*$this->redirect("edit");
				exit();*/
			}
		}

		$row = $this->db->getRow("select * from {$this->table} where id = $_GET[id]");	

		$this->smarty->assign("row", $row);
		
		$this->smarty->assign($this->table_category, $this->getAssocUserType());
		
		$this->smarty->display("user.tpl");
	}
	
	function grid()
	{		
		global $oDb;
		global $oDatagrid;				
		
		$this->table = "(SELECT * FROM {$this->table} where username!='root') as _user ";
		
		$this->arr_filter= array(
			array(
				"field" 	=>"user_type_id",
				"display" 	=> "Loại người dùng",
				"style" 	=> "width:160px;",
				"name" 		=> "user_type_id",
				"selected" 	=> isset($_REQUEST["user_type_id"])?$_REQUEST["user_type_id"]:"",				
              	"option" 	=> $this->db->getAssoc("select id, title from {$this->table_category} order by title"),
				"filterable"=>true
			),
			
			array(
				"field" 	=> "username",
				"display" 	=> "Tên tài khoản",
				"name" 		=> "username",
				"type" 		=> "text",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["username"])?$_REQUEST["username"]:"",
				"filterable"=>true
			),
			
			array(
				"field" 	=> "email",
				"display" 	=> "Email",
				"name" 		=> "email",
				"type" 		=> "text",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["email"])?$_REQUEST["email"]:"",
				"filterable"=>true
			),
			
			array(
				"field" 	=> "create_date",
				"display" 	=> "Ngày tạo",
				"name" 		=> "create_date",
				"type" 		=> "date",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["create_date"])?$_REQUEST["create_date"]:"",
				"filterable"=>true
			),
			/*array(
				"field" 	=>"is_status",
				"display" 	=> "Online",				
				"name" 		=> "is_status",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["is_status"])?$_REQUEST["is_status"]:"",				
              	"option" 	=> array('1' => "Yes", '0' => "No"),
				"filterable"=>true
			),*/
			array(
				"field" 	=>"is_active",
				"display" 	=> "Kích hoạt",
				"name" 		=> "is_active",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",				
              	"option" 	=> array('1' => "Yes", '0' => "No"),
				"filterable"=>true
			),
			
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
			/*array(
				"field" => "avatar",
				"display" => "Avatar",
				"type" => "img",
				"img_path" => "upload/avatar/thumb/",
				"sortable" => true,
			),*/			
			array(
				"field" => "username",
				"display" => "Tài khoản",
				"sql" => "",
				"width" => 150,
				"type" => "text",
				"sortable" => true,
			),	
			array(
				"field" => "email",
				"display" => "Email",
				"sql" => "",
				"width" => 150,
				"type" => "text",
				"sortable" => true,
			),
			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "date",
				"sortable" => true,
			),
			array(
				"field" 	 => "user_type_id",		
				"display" 	 => "Loại người dùng",
				"option" => $this->db->getAssoc("select id, title from {$this->table_category} order by title"),
				"width" 	 => 100,
				"type" 	 => "select",		
				"editable" 	 => false,
			),
			
			array(
				"field" 	 => "fullname",		
				"display" 	 => "Tên đầy đủ",
				"sortable" 	 => true,
			),
			
			array(
				"field" 	 => "phone",		
				"display" 	 => "Phone",
				"sortable" 	 => true,
			),
			
			array(
				"field" 	 => "is_active",		
				"display" 	 => "Kích hoạt",
				"type" 	 => "boolean",
				"editable" => $_SESSION["username"]=="root"?true:false,		
				"sortable" 	 => true,
			),
					
		);
		
		if($_SESSION["username"]!='root') {
			$this->arr_action[0] = array();
			$this->arr_action[2] = array();
			$this->arr_check = array();
		}
		
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);	
		
	}		
}

?>