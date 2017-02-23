<?php
class faq extends base
{	
	function run($task="")
	{	
		$this->table= "faq";
		$this->table_category= "faq_category";
		$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order = " ORDER BY z_index DESC ";
			
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function getOptions()
	{
		return $this->db->getAssoc("SELECT id, title FROM {$this->table_category} {$this->where} {$this->order} ");
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row=array(
				"faq_category_id"=>$_POST["faq_category_id"],
				"title"=>$_POST["title"],
				"description"=>$_POST["description"],
				
				"is_active"=>$_POST["is_active"]+0,
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"lang"=>$_SESSION["lang"],
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->assign("parent", $this->getOptions());
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"faq_category_id"=>$_POST["faq_category_id"],
				"title"=>$_POST["title"],
				"description"=>$_POST["description"],
				
				"is_active"=>$_POST["is_active"]+0,
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"lang"=>$_SESSION["lang"],	
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$row["title"] = stripslashes($row["title"]);
		
		$this->smarty->assign("parent", $this->getOptions());
		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
	}
	
	
	function grid()
	{		
		$table = "(select * from {$this->table} {$this->where} ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field" 	=> "faq_category_id",
				"display" 	=> "Nhóm câu hỏi",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["faq_category_id"])?$_REQUEST["faq_category_id"]:"",
			),
			array(
				"field" 	=>"title",
				"display" 	=> "Câu hỏi",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),	
			array(
				"field" 	=>"description",
				"display" 	=> "Trả lời",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["description"])?$_REQUEST["description"]:"",
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
				"sortable" => true,
				"searchable" => true,
				
			),	
			array(
				"field" => "faq_category_id",
				"display" => "Nhóm câu hỏi",
				"type" => "select",
				"width"	=> "120",
				"option" => $this->getOptions(),
				"sortable" => true,
				"editable" => true,
			),
			array(
				"field" => "title",
				"display" => "Câu hỏi",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			
			array(
				"field" => "description",
				"display" => "Trả lời",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "is_active",
				"display" => "Hiện?",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
		);
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
}
?>