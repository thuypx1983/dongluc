<?php
class type extends base
{	
	function run($task="")
	{	
		$this->table= "type";
		$this->imagePath = 'upload/type/';
		$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		
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
				"title_jp"=>$_POST["title_jp"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"is_menu"=>$_POST["is_menu"]+0,
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				/*"menu_level"=>$_POST["menu_level"],*/
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
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
				"title_jp"=>$_POST["title_jp"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"is_menu"=>$_POST["is_menu"]+0,
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				/*"menu_level"=>$_POST["menu_level"],*/
				"z_index"=>$_POST["z_index"]+0,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
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
				"field" 	=>"title_jp",
				"display" 	=> "Tiêu đề Nhật",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title_jp"])?$_REQUEST["title_jp"]:"",
			),
			array(
				"field" 	=>"is_active",
				"display" 	=> "Hiện ?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
			),	
			array(
				"field" 	=>"is_menu",
				"display" 	=> "Hiện Đ.Hướng?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_menu"])?$_REQUEST["is_menu"]:"",
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
			/*array(
				"field" => "photo",
				"display" => "Photo",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imagePath,
				"sortable" => true,
			),*/
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"width" => "160",
				"sql" => "",
				"type" => "text",
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
			array(
				"field" => "link",
				"display" => "Link",
				"sql" => "",
				"width" => "220",
				"type" => "text",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			
			/*array(
				"field" => "menu_level",
				"display" => "Menu cấp",
				"sql" => "",
				"width" => "120",
				"type" => "text",
				"sortable" => true,
				"editable" => false
			),*/
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
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "is_menu",
				"display" => "Hiện Đ.Hướng?",
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
		
		if($_SESSION["username"]!='root') {
			$this->arr_action[0] = array();
			$this->arr_action[2] = array();
			$this->arr_check = array();
		}
		
		/*$this->arr_check[] = array(
			"task" => "multi_duplicate",
			"display" => "Sao chép sang ".strtoupper($this->lang_convert[$_SESSION["lang"]]),
		);*/
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}
?>