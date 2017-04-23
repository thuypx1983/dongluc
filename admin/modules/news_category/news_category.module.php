<?php
class news_category extends base
{	
	function run($task="")
	{	
		$this->table= "news_category";
		$this->imagePath = 'upload/news_category/';
		$this->image252x158 = 'upload/news_category/thumb/';
		$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
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
			$row=array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"parent_id"=>$_POST["parent_id"],
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"link_to"=>$_POST["link_to"],
				/*"menu_type"=>$_POST["menu_type"],*/
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
			/*if ($_POST['link_to'] != '')
			{
				$row['link_to'] = preg_replace('#^https?://#', '', $_POST['link_to']);
				$row['link_to'] = 'http://' . $row['link_to'];
			}*/

			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);

			if($_FILES['thumb']['name']!='') {
				$row['thumb']= $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->image252x158.$_FILES['thumb']['name'], 252, 158, "");
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			echo mysql_error();
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
			exit();*/
		}
		
		$this->smarty->assign("parent", $this->getOptions());
		$this->smarty->display('news_category_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"parent_id"=>$_POST["parent_id"],
				"z_index"=>$_POST["z_index"]+0,
				"link_to"=>$_POST["link_to"],
				/*"menu_type"=>$_POST["menu_type"],*/
				
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
				
			);

			if ($_POST['link_to'] != '')
			{
				$row['link_to'] = preg_replace('#^https?://#', '', $_POST['link_to']);
				$row['link_to'] = 'http://' . $row['link_to'];
			}

			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);

			if($_POST["che_delthumb"]=="on")
			{
				if(is_file($this->imageThumb.$_POST["hid_oldthumb"]))
					$this->unlinkPhoto($this->imageThumb, $_POST["hid_oldthumb"], "");
				$row["thumb"]= "";		
			}
			if($_FILES['thumb']['name']!='') {
				$row['thumb']= $_FILES['thumb']['name'];
				$this->thumbSave($_FILES['thumb']['tmp_name'], $this->image252x158.$_FILES['thumb']['name'], 252, 158, "");
			}

			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		
		$this->smarty->assign("parent", $this->getOptions());
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('news_category_form.tpl');
	}
	
	function grid()
	{		
		$table = "(select * from {$this->table} {$this->where} ) as _table";	
		
		$this->arr_filter= array(
			array(
				"field" 	=>"id",
				"display" 	=> "ID",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["id"])?$_REQUEST["id"]:"",
			),
			array(
				"field" 	=>"title",
				"display" 	=> "Tiêu đề",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),	
			
			array(
				"field" 	=>"parent_id",
				"display" 	=> "Dịch vụ cha",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["parent_id"])?$_REQUEST["parent_id"]:"",
			),	
			array(
				"field" 	=>"is_parent",
				"display" 	=> "is Parent?",
				"filter_condition" => " parent_id {$_REQUEST['is_parent']} 0 ",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("!="=>"No", "="=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_parent"])?$_REQUEST["is_parent"]:"",
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
				/*"visible"=>"hidden",*/
				"display" => "ID",
				"type" => "text",
				"width" => "30",
				"sortable" => true,
				"searchable" => true,
				
			),	
			array(
				"field" => "thumb",
				"display" => "Thumb",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->image252x158,
				"sortable" => true,
			),
			
			array(
				"field" => "parent_id",
				"display" => "Dịch vụ cha",
				"sql" => "",
				"width" => "200",
				"type" => "select",
				"order_default" => true,
				"option" => $this->getOptions(),
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
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
				"field" => "link",
				"display" => "Link",
				"sql" => "",
				"width" => "120",
				"type" => "text",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
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
				"field" => "link_to",
				"display" => "Liên kết ngoài",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
		);
			
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
}
?>