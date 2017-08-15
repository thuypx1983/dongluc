<?php
class partner extends base
{	
	function run($task="")
	{	
		$this->table      = "partner";
		$this->where      = " WHERE 1 = 1 ";
		$this->imageThumb = "upload/partner/thumb/";
		
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"     => $_POST["title"],
				"is_active" => $_POST["is_active"]+0,
				"z_index"   => ($_POST["z_index"]>0)?$_POST["z_index"]:9999
			);

			if($_FILES['thumb']['name']!='') {
				$row['thumb'] = $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->imageThumb.$_FILES['thumb']['name'], 120, 120, "");
			}

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->display('partner_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"     => $_POST["title"],
				"is_active" => $_POST["is_active"]+0,
				"z_index"   => $_POST["z_index"]+0
			);

			if($_POST["che_delthumb"]=="on")
			{
				if(is_file($this->imageThumb.$_POST["hid_oldthumb"]))
					$this->unlinkPhoto($this->imageThumb, $_POST["hid_oldthumb"], "");
				$row["thumb"]= "";		
			}
			if($_FILES['thumb']['name']!='') {
				$row['thumb'] = $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->imageThumb.$_FILES['thumb']['name'], 120, 120, "");
			}
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('partner_form.tpl');
	}
	
	function grid()
	{		
		$table = "(select * from {$this->table} {$this->where} ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Tiêu đề",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
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
				"field" => "id",					
				"primary_key" =>true,
				"visible"=>"hidden",
				"type" => "text",
				"width" => "60",
				"sortable" => true,
				"searchable" => true,
				
			),	
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"type" => "text",
				"width" => "160",
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
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"width" => "60",
				"type" => "number",
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