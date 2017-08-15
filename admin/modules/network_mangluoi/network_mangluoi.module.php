<?php
class network_mangluoi extends base
{	
	function run($task="")
	{	
		$this->table= "network_mangluoi";
		//$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->where = " WHERE 1 = 1 ";
		$this->order= " ORDER BY z_index DESC ";
		
		$this->setRootPath("_menu_");
		switch($task)
		{
			default:
				parent::run($task);
		}
	}
	
	function getOptions() {
		$option= array();
		$opt_parent= $this->db->getAssoc("select id, title from {$this->table} {$this->where} and parent_id = 0 order by id asc");
		$sperator = " &#8594; ";
		foreach($opt_parent as $k=>$v) {
			$option[$k] = $v;
			
			$opt_sub1 = $this->db->getAssoc("select id, title from {$this->table} {$this->where} and parent_id = $k order by id asc");
			
			foreach($opt_sub1 as $k1=>$v1) {
				$option[$k1] = $v.$sperator.$v1;
				
				$opt_sub2 = $this->db->getAssoc("select id, title from {$this->table} {$this->where} and parent_id = $k1 order by id asc");
				
				foreach($opt_sub2 as $k2=>$v2) {
					$option[$k2] = $v.$sperator.$v1.$sperator.$v2;
					$opt_sub3 = $this->db->getAssoc("select id, title from {$this->table} {$this->where} and parent_id = $k2 order by id asc");
					
					foreach($opt_sub3 as $k3=>$v3) {
						$option[$k3] = $v.$sperator.$v1.$sperator.$v2.$sperator.$v3;
					}
				}
			}
		}
		return $option;
	}	
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"=>$_POST["title"],
				/*"parent_id"=>$_POST["parent_id"],*/
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"=>$_POST["is_active"]+0,
			);
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
			exit();*/
		}
		/*$this->smarty->assign("parent", $this->getOptions());*/
		$this->smarty->display('form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				/*"parent_id"=>$_POST["parent_id"],*/
				"z_index"=>$_POST["z_index"]+0,
				"is_active"=>$_POST["is_active"]+0,
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		
		/*$this->smarty->assign("parent", $this->getOptions());*/
		
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
				"display" 	=> "Tên",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),	
			/*array(
				"field" 	=>"parent_id",
				"display" 	=> "Menu cha",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["parent_id"])?$_REQUEST["parent_id"]:"",
			),*/	
			/*array(
				"field" 	=>"is_parent",
				"display" 	=> "Menu cha?",
				"filter_condition" => " parent_id {$_REQUEST['is_parent']} 0 ",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("!="=>"No", "="=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_parent"])?$_REQUEST["is_parent"]:"",
			),*/
			array(
				"field" 	=>"is_active",
				"display" 	=> "Kích hoạt?",
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
				"display" => "ID",
				"type" => "text",
				"width" => "30",
				"sortable" => true,
				"searchable" => true,
				
			),	
			/*array(
				"field" => "thumb",
				"display" => "Thumb",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),*/
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"width" => "160",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => false
			),
			/*array(
				"field" => "parent_id",
				"display" => "Danh mục cha",
				"sql" => "",
				"width" => "300",
				"type" => "select",
				"option" => $this->getOptions(),
				"sortable" => true,
				"order_default" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/
			
			array(
				"field" => "is_active",
				"display" => "Hiện?",
				"sql" => "",
				"width" => "60",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
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
			
			/*array(
				"field" => "lang_id",
				"display" => "Ngôn ngữ",
				"sql" => "",
				"width" => "80",
				"type" => "lang",
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