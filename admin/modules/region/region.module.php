<?php
class region extends base
{	
	function run($task="")
	{	
		$this->table= "region";
		$this->where = " WHERE 1 = 1 ";
		
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
				"title"   =>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"z_index" =>($_POST["z_index"]>0)?$_POST["z_index"]:9999
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->display('region_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"   =>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"z_index" =>$_POST["z_index"]+0
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('region_form.tpl');
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
				"field" => "link",
				"display" => "Đường dẫn",
				"width" => "160",
				"sortable" => true,
				"editable" => false
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
		);
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}
?>