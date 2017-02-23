<?php
class languages extends base {	
	
	function run($task="")
	{
		$this->table= "lang";
		$this->imagePath= "upload/lang/flag/";
		
		switch($task)
		{
			default:
				parent::run($task);
		}
	}

	function add()
	{
		if($_SESSION["username"]!='root') {
			header("Location: ".SITE_URL."admin");
		}
		if($_SERVER["REQUEST_METHOD"]=="POST") {
			$row= array(
				"code" => $_POST["code"],
				"title" => $_POST["title"],
				"content" => $_POST["content"],
				"is_default" =>$_POST["is_default"]+0,
				"is_active" =>$_POST["is_active"]+0,
				"create_date"=>date("Y-m-d H:i:s"),
			);
			if($_POST["is_default"]=="1") {
				$this->db->query("update {$this->table} set is_default = 0");
			}
			if($_FILES["photo"]["name"]!="")
			{
				$new_name = rand().$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"], $this->imagePath.$new_name);
				$row["photo"] = $new_name;			
			}
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$file_path = "upload/lang/".$_POST["code"].".conf";			
			$handle = fopen($file_path,'w');
			$contents = fwrite($handle,$_POST["content"]);				
			fclose($handle);		
			@chmod( $file_path, 0777);
			
			$msg = "Thêm thành công";
			$this->smarty->assign("msg", $msg);
		}
		
		$row = $this->db->getRow("select * from ".$this->table." where is_default = 1 ");
		$this->smarty->assign("row", $row);
							
		$this->smarty->display("form.tpl");
	}
	
	function edit()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST") {
			$row = array(
				"code" => $_POST["code"],
				"title" => $_POST["title"],
				"content" => $_POST["content"],
				"is_default" =>$_POST["is_default"]+0,
				"is_active" =>$_POST["is_active"]+0,
			);
			
			if($_POST["is_default"]=="1") {
				$this->db->query("update {$this->table} set is_default = 0");
			}
			
			if($_POST["che_delphoto"]=="on") {
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					unlink($this->imagePath.$_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			$file_path = "upload/lang/".$_POST["code"].".conf";		
				
			$handle = fopen($file_path,'w');
			$contents = fwrite($handle,  $_POST["content"]);			
			fclose($handle);	
			
			if($_FILES["photo"]["name"]!="") {	
				$new_name = rand().$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"], $this->imagePath.$new_name);
				$row["photo"] = $new_name;
			}
			
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE, "id='".$_GET["id"]."'");
			$msg= "Cập nhật thành công";
			$this->smarty->assign("msg", $msg);
		}
		
		$row = $this->db->getRow("select * from ".$this->table." where id='".$_GET["id"]."'");
		
		$this->smarty->assign("row", $row);	
		$this->smarty->display("form.tpl");
	}
		
	function grid()
	{		
		$this->arr_filter= array(
			array(
				"field" 	=>"code",
				"display" 	=> "Code",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),
			array(
				"field" 	=>"is_active",
				"display" 	=> "Kích hoạt?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
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
			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "datetime",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "code",
				"display" => "Code",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => false,
			),
			array(
				"field" => "title",
				"display" => "Languges",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => false,
			),				
			array(
				"field" => "photo",
				"display" => "Flag",
				"type" => "img",
				"img_path" => $this->imagePath,
				"img_size"=>"23"
			),
			array(
				"field" => "is_default",
				"display" => "Default",
				"type" => "boolean",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "is_active",
				"display" => "Active",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			)
		);
		
		if($_SESSION["username"]!='root') {
			$this->arr_action[0] = array();
			$this->arr_action[2] = array();
			$this->arr_check = array();
		}
		$this->datagrid->display($this->table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, $this->debug);		
		
	}		
	
}

?>