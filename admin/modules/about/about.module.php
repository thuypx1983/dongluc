<?php
class about extends base {	

	function run($task="")
	{
		$this->table       = "about";
		$this->where       = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order       = " ORDER BY z_index DESC ";
		$this->imageEditor = "upload/editor/";
		$this->imageThumb  = 'upload/about/thumb/';
		$this->imagePath   = "upload/about/";
		$this->setRootPath("_menu_");
		switch ($task)
		{
			default:
				parent::run($task);
		}
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = array(
				"title"           => $_POST["title"],
				"link"            => ($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"lang"            => $_SESSION["lang"],
				"z_index"         => ($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"       => $_POST["is_active"]+0,
				
				"seo_title"       => $_POST["seo_title"],
				"seo_description" => $_POST["seo_description"],
				"seo_keyword"     => $_POST["seo_keyword"],
				
				"create_date"     =>date("Y-m-d H:i:s"),
			);
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
                $this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 200, "");
                
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 'auto', '');
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->display('about_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST") {
			$row = array(
				"title"           => $_POST["title"],
				"link"            => ($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"content"         => $_POST["content"],
				
				"lang"            => $_SESSION["lang"],
				"z_index"         => $_POST["z_index"]+0,
				"is_active"       => $_POST["is_active"]+0,
				
				"seo_title"       => $_POST["seo_title"],
				"seo_description" => $_POST["seo_description"],
				"seo_keyword"     => $_POST["seo_keyword"],
			);
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);
			
			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
                $this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 200, "");
                
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 'auto', '');
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE," id='".$_GET["id"]."' ");
			echo mysql_error();
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		 
		$row = $this->db->getRow("SELECT * FROM {$this->table} where id='".$_GET['id']."' ");
		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace($this->imageEditor, SITE_URL.$this->imageEditor, $row["content"]);
		
		$this->smarty->assign("row", $row);
		$this->smarty->display("about_form.tpl");
	}
	
	function grid()
	{
		$table = "(select * from {$this->table} ) as _table";
		
		$this->arr_filter= array(
			
			array(
				"field"    => "title",
				"display"  => "Tiêu đề",
				"style"    => "width:160px;",
				"type"     => "text",
				"selected" => isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),
			array(
				"field"    => "is_active",
				"display"  => "Hiện ?",
				"type"     => "select",
				"style"    => "width:160px;",
				"option"   => array("0"=>"No", "1"=>"Yes"),
				"selected" => isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
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
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false
			),
			
			array(
				"field" => "link",
				"display" => "Link",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false
			),
			
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"width" => "50",
				"type" => "number",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "is_active",
				"display" => "Hiện?",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "datetime",
				"sortable" => true,
				"editable" => false
			),
		);
		
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}

?>