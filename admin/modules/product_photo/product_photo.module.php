<?php
class product_photo extends base
{	
	function run($task="")
	{	
		$this->table= "product_photo";
		$this->imagePath = 'upload/photo/';
		$this->imageThumb = 'upload/photo/thumb/';
		$this->imageMedium = 'upload/photo/medium/';
		
		$this->setRootPath("_menu_");
		switch($task)
		{
			default:
				parent::run($task);
		}
	}
	
	
	function add()
	{
		$product_id = isset($_REQUEST["product_id"])?$_REQUEST["product_id"]:$_REQUEST["mod_id"];
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"      => $_POST["title"],
				"product_id" => $product_id,
				"z_index"    => ($_POST["z_index"]>0)?$_POST["z_index"]:9999,
			);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo'] = $_FILES['photo']['name'];
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 84, 84, "y");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageMedium.$_FILES['photo']['name'], 480, 480, "y");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
						
			exit();*/
		}
		
		$product_info = $this->db->getRow("select title, code from product where id = {$product_id} ");
		$this->smarty->assign("product_info", $product_info);
		
		$this->smarty->display('product_photo.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"      => $_POST["title"],
				"product_id" => $_GET["mod_id"],
				"z_index"    => $_POST["z_index"]+0,
			);
			
			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo'] = $_FILES['photo']['name'];
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 84, 84, "y");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageMedium.$_FILES['photo']['name'], 480, 480, "y");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
				
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
				
		$this->smarty->assign('row',$row);
		$this->smarty->display('product_photo.tpl');
	}
	
	function grid()
	{		
		$table = "(select * from {$this->table}  ) as _table";	
		
		
		$this->arr_filter= array(
			array(
				"field" 	=>"product_id",
				"display" 	=> "Sản phẩm",
				"style" 	=> "width:460px;",
				"type" => "select",
				"selected" 	=> isset($_REQUEST["product_id"])?$_REQUEST["product_id"]:$_REQUEST["mod_id"],		"option" => $this->db->getAssoc("select id, title from product"),
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
			array(
				"field" => "photo",
				"display" => "Ảnh",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),			
			/*array(
				"field" => "title",
				"display" => "Tiêu đề",
				"sql" => "",
				"type" => "text",
				"width" => "260",
				"sortable" => true,
				"editable" => true
			),*/
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"type" => "number",
				"sortable" => true,
				"editable" => true
			),
			
		);
		
		$this->arr_action= array(
			array(
				"task" => "add",
				"action" => "",
				"tooltip" => "Add record"		
			),
			
			array(
				"task" => "delete",
				"text" => "Delete",
				"icon" => "delete.jpg",
				"confirm" => "Are you sure?",
				"action" => "",
				"tooltip" => "Delete record"		
			)
			
		);
	
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
		
		$this->smarty->display('action.tpl');
	}	
}
?>