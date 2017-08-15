<?php
class article extends base
{	
	function run($task="")
	{	
		$this->table= "article";
		
		$this->setRootPath("_menu_");
		switch($task)
		{		
			default:
				parent::run($task);
		}
	}
	
	function getOptions() {
		return $this->db->getAssoc("SELECT code, title FROM ads_position");
	}	
	
	function add()
	{
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"content"=>$_POST["content"],
				"create_date"=>date("Y-m-d"),
				"is_active"=>$_POST["is_active"]+0,
				
				"lang"=>$_SESSION["lang"],
				"is_active"=>$_POST["is_active"]+0,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);

			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			$this->redirect("add");
			exit();
		}
		
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"content"=>$_POST["content"],
				
				"lang"=>$_SESSION["lang"],
				"is_active"=>$_POST["is_active"]+0,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
		$this->smarty->assign("parent", $this->getOptions());	
		$row=$this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
	}
	
	
	function grid()
	{	
		$table = "(select * from {$this->table} ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Tiêu đề bài viết",
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
				"sortable" => true,
				"searchable" => true,
				
			),				
			
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"sql" => "",
				"type" => "text",
				"width" => "160",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "link",
				"display" => "Link",
				"sql" => "",
				"type" => "text",
				"width" => "160",
				"sortable" => true,
				"editable" => false,
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
				"type" => "date",
				"sortable" => true,
				"editable" => false
			),
			
		);
		
		/*$this->arr_action[0] = array();
		$this->arr_action[2] = array();
		
		$this->arr_check = array();*/
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>