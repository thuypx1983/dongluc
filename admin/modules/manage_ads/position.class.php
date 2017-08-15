<?php
class position extends base
{	
	function run($task="")
	{	
		$this->table= "ads_position";
		
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
			$width  = $_POST["width"];
			$height = $_POST["height"];
			if (!is_numeric($_POST["width"]) || $_POST["width"] <= 0) {
				$width = 'auto';
			}
			if (!is_numeric($_POST["height"]) || $_POST["height"] <= 0) {
				$height = 'auto';
			}
			$row = array(
				"code"   => $_POST["code"],
				"title"  => $_POST["title"],
				"width"  => $width,
				"height" => $height
			);
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			$this->redirect("add");
			exit();
		}	
		$this->smarty->display('position.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$width  = $_POST["width"];
			$height = $_POST["height"];
			if (!is_numeric($_POST["width"]) || $_POST["width"] <= 0) {
				$width = 'auto';
			}
			if (!is_numeric($_POST["height"]) || $_POST["height"] <= 0) {
				$height = 'auto';
			}
			$row = array(
				"code"   => $_POST["code"],
				"title"  => $_POST["title"],
				"width"  => $width,
				"height" => $height
			);
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
			echo mysql_error();
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}	
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$this->smarty->assign('row',$row);
		$this->smarty->display('position.tpl');
	}
	
	
	function grid()
	{	
		$table = "(select * from {$this->table}  ) as _table";	
		$this->arr_filter= array(
			array(
				"field"    => "title",
				"display"  => "Tiêu đề",
				"style"    => "width:160px;",
				"type"     => "text",
				"selected" => isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			)
		); 
		$this->arr_cols= array(			
			array(
				"field"       => "id",					
				"primary_key" => true,
				"visible"     =>"hidden",
				"type"        => "text",
				"sortable"    => true,
				"searchable"  => true,
			),	
			array(
				"field"    => "code",
				"display"  => "Code",
				"sql"      => "",
				"type"     => "text",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field"    => "title",
				"display"  => "Tiêu đề",
				"sql"      => "",
				"type"     => "text",
				"width"    => "160",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field"    => "width",
				"display"  => "width",
				"sql"      => "",
				"type"     => "text",
				"width"    => "160",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field"    => "height",
				"display"  => "height",
				"sql"      => "",
				"type"     => "text",
				"width"    => "160",
				"sortable" => true,
				"editable" => true
			),
		);
	
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}	
}
?>