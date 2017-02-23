<?php
class faq_category extends base
{	
	function run($task="")
	{	
		$this->table= "faq_category";
		$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order= " ORDER BY z_index DESC ";
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"lang"=>$_SESSION["lang"],
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"=>$_POST["is_active"]+0,
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			$this->redirect("add");
			exit();
		}
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST") {
			$row = array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"lang"=>$_SESSION["lang"],
				"z_index"=>$_POST["z_index"]+0,
				"is_active"=>$_POST["is_active"]+0,
			);

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			echo mysql_error();
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		 
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");
		$this->smarty->assign("row", $row);
		$this->smarty->display("form.tpl");
	}
	
	function grid()
	{		
		$table = "( select * from {$this->table} {$this->where} ) as _table";	
		
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
				"display" 	=> "Hiện ?",
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
				"field" => "title",
				"display" => "Tiêu đề",
				"sql" => "",
				"width"=>"160",
				"sortable" => true,
				"editable" => false,
			),

			array(
				"field" => "link",
				"display" => "Đường dẫn",
				"sql" => "",
				"width"=>"160",
				"sortable" => true,
				"editable" => false,
			),	
							
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
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
			/*array(
				"field" => "lang_id",
				"display" => "Ngôn ngữ",
				"sql" => "",
				"width" => "80",
				"type" => "lang",
				"filter_default" => "title",
				"flag" => $this->db->getAssoc("SELECT code, concat('upload/lang/flag/', photo) FROM lang ORDER BY is_default DESC"),
				"sortable" => true,
			),*/
		);
		
		/*$this->arr_check[] = array(
			"task" => "multi_duplicate",
			"display" => "Sao chép sang ".strtoupper($this->lang_convert[$_SESSION["lang"]]),
		);*/
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>