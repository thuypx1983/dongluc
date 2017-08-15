<?php
class menu_quick extends base
{	
	function run($task="")
	{	
		$this->table= "menu_quick";
		$this->imagePath = 'upload/menu_quick/';
		$this->imageThumb = 'upload/menu_quick/thumb/';
		
		$this->setRootPath("_menu_");
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
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row=array(
				"title"=>$_POST["title"],
				/*"description"=>$_POST["description"],*/
				"title_jp"=>$_POST["title_jp"],
				/*"link_to"=>$_POST["link_to"],*/
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
			);
			
			/*if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 400, 250, "");
			}*/
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
			exit();*/
		}
		
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				/*"description"=>$_POST["description"],*/
				"title_jp"=>$_POST["title_jp"],
				"z_index"=>$_POST["z_index"]+0,
				
			);
			
			if($_SESSION["username"]=='root') {
				/*$row["link_to"] = $_POST["link_to"];*/
			}
			/*if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 400, 250, "");
			}*/
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
	}
	
	
	function grid()
	{		
		$table = "(select * from {$this->table}  ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Tiêu đề",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),
			array(
				"field" 	=>"title_jp",
				"display" 	=> "Tiêu đề Nhật",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title_jp"])?$_REQUEST["title_jp"]:"",
			),			
		); 
		$this->arr_cols= array(			
			array(
				"field" => "id",					
				"primary_key" =>true,
				"visible"=>"hidden",
				"type" => "text",
				"sortable" => true,
				"searchable" => true,
				
			),				
			
			/*array(
				"field" => "photo",
				"display" => "Logo",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),*/
			
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"width" => "160",
				"type" => "text",
				"sql" => "",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			array(
				"field" => "title_jp",
				"display" => "Tiêu đề Nhật",
				"width" => "160",
				"type" => "text",
				"sql" => "",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			
			/*array(
				"field" => "description",
				"display" => "Mô tả",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),*/
			/*array(
				"field" => "link_to",
				"display" => "Đường dẫn",
				"width" => "260",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/
			
			/*array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"type" => "number",
				"sortable" => true,
				"editable" => true
			),,*/
		);
		
		if($_SESSION["username"]!='root') {
			$this->arr_action[0] = array();
			$this->arr_action[2] = array();
			$this->arr_check = array();
		}
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}
?>