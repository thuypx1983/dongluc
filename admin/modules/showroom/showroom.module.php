<?php
class showroom extends base
{	
	function run($task="")
	{	
		$this->table      = "showroom";
		$this->where      = " WHERE is_active = 1 ";
		$this->imageThumb = "upload/showroom/thumb/";
		
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function getOptions()
	{
		return $this->db->getAssoc("SELECT id, title FROM region ORDER BY z_index DESC");
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"     => $_POST["title"],
				"link"      => ($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"z_index"   => ($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active" => $_POST["is_active"]+0,
				"region_id" => $_POST["region_id"]+0,
				"address"   => $_POST["address"],
				"email"     => $_POST["email"],
				"hotline"   => $_POST["hotline"],
                "fax"   => $_POST["fax"],
                "longitude"   => $_POST["longitude"],
                "latitude"   => $_POST["latitude"],
			);
			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);

			if($_FILES['thumb']['name']!='') {
				$row['thumb'] = $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->imageThumb.$_FILES['thumb']['name'], 146, 217, "");
			}

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->assign('region', $this->getOptions());
		$this->smarty->display('showroom_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"     => $_POST["title"],
				"link"      => ($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"z_index"   => $_POST["z_index"]+0,
				"is_active" => $_POST["is_active"]+0,
				"region_id" => $_POST["region_id"]+0,
				"address"   => $_POST["address"],
				"email"     => $_POST["email"],
				"hotline"   => $_POST["hotline"],
                "fax"   => $_POST["fax"],
                "longitude"   => $_POST["longitude"],
                "latitude"   => $_POST["latitude"],
			);

			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);

			if($_POST["che_delthumb"]=="on")
			{
				if(is_file($this->imageThumb.$_POST["hid_oldthumb"]))
					$this->unlinkPhoto($this->imageThumb, $_POST["hid_oldthumb"], "");
				$row["thumb"]= "";		
			}
			if($_FILES['thumb']['name']!='') {
				$row['thumb'] = $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->imageThumb.$_FILES['thumb']['name'], 146, 217, "");
			}

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}

		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");

		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		$this->smarty->assign('row', $row);

		$this->smarty->assign('region', $this->getOptions());
		$this->smarty->display('showroom_form.tpl');
	}
	
	function grid()
	{		
		$table = "(select * from {$this->table} ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field"    =>"title",
				"display"  => "Tiêu đề",
				"style"    => "width:160px;",
				"type"     => "text",
				"selected" => isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),
			array(
				"field"    => "region_id",
				"display"  => "Vùng miền",
				"style"    => "width:160px;",
				"type"     => "select",
				"option"   => $this->getOptions(),
				"selected" => isset($_REQUEST["region_id"])?$_REQUEST["region_id"]:"",
			),
			array(
				"field" 	=>"is_active",
				"display" 	=> "Hiện?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
			),
		); 
		$this->arr_cols= array(			
			array(
				"field"       => "id",					
				"primary_key" =>true,
				"visible"     =>"hidden",
				"type"        => "text",
				"width"       => "60",
				"sortable"    => true,
				"searchable"  => true,
				
			),
			array(
				"field"    => "region_id",
				"display"  => "Vùng miền",
				"type"     => "select",
				"width"    => "220",
				"option"   => $this->getOptions(),
				"sortable" => true,
				"editable" => true
			),
			array(
				"field"    => "thumb",
				"display"  => "Ảnh",
				"sql"      => "",
				"type"     => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),	
			array(
				"field"    => "title",
				"display"  => "Tiêu đề",
				"type"     => "text",
				"width"    => "160",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field"    => "link",
				"display"  => "Đường dẫn",
				"width"    => "160",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field"    => "z_index",
				"display"  => "Thứ tự",
				"sql"      => "",
				"width"    => "60",
				"type"     => "number",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "is_active",
				"display" => "Hiện?",
				"sql" => "",
				"width" => "60",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
		);
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}
?>