<?php
class news extends base
{	
	function run($task="")
	{	
		$this->table          = "news";
		$this->table_category = "news_category";
		$this->where          = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order          = " ORDER BY z_index DESC ";
		$this->imageThumb     = 'upload/news/thumb/';
		$this->imagePath      = "upload/news/";
		$this->imageEditor    = "upload/editor/";
		$this->setRootPath("_menu_");
		switch($task)
		{
			case "getNewsCategory":
				$this->getNewsCategory();
				break;
			default:
				parent::run($task);
		}
	}
	
	function getType() {
		return $this->db->getAssoc("SELECT link, title FROM type {$this->where}");
	}
	
	function getNewsCategory() {
		
		$parent = $this->getOptions(" AND menu_type = '{$_REQUEST['menu_type']}' ");
		$this->smarty->assign("parent", $parent);
		$this->smarty->display('get_category.tpl');
	}
	
	
	function getOptions($where="") {
		$option= array();
		$opt_parent= $this->db->getAssoc("select id, title from {$this->table_category} where parent_id = 0 {$where} order by id asc");
		$sperator = " &#8594; ";
		foreach($opt_parent as $k=>$v) {
			$option[$k] = $v;
			
			$opt_sub1 = $this->db->getAssoc("select id, title from {$this->table_category} where parent_id = $k {$where} order by id asc");
			
			foreach($opt_sub1 as $k1=>$v1) {
				$option[$k1] = $v.$sperator.$v1;
				
				$opt_sub2 = $this->db->getAssoc("select id, title from {$this->table_category} where parent_id = $k1 {$where} order by id asc");
				
				foreach($opt_sub2 as $k2=>$v2) {
					$option[$k2] = $v.$sperator.$v1.$sperator.$v2;
					$opt_sub3 = $this->db->getAssoc("select id, title from {$this->table_category} where parent_id = $k2 {$where} order by id asc");
					
					foreach($opt_sub3 as $k3=>$v3) {
						$option[$k3] = $v.$sperator.$v1.$sperator.$v2.$sperator.$v3;
					}
				}
			}
		}
		return $option;
	}
	
	function view()
	{
		$link = $this->db->getOne("SELECT link FROM {$this->table} WHERE id = '{$_GET['id']}'");
		redirect(SITE_URL . $link . "-" . $_GET['id'] . ".html");
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"menu_type"=>$_POST["menu_type"],
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"description"=>$_POST["description"],
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				
				"create_date"=>date("Y-m-d H:i:s"),
				
				"is_active"=>$_POST["is_active"]+0,
				"is_top"=>$_POST["is_top"]+0,
				
				"user_id"=>$_SESSION["user_id"],
				
				"lang"=>$_SESSION["lang"],
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
                $this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 200, "");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 'auto', '');
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			echo mysql_error();
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		$this->smarty->assign("parent", $this->getOptions());
		$this->smarty->assign("menu_type", $this->getType());
		
		$this->smarty->display('news_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"menu_type"=>$_POST["menu_type"],
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"description"=>$_POST["description"],
				"z_index"=>$_POST["z_index"]+0,
				
				"is_active"=>$_POST["is_active"]+0,
				"is_top"=>$_POST["is_top"]+0,
				
				"lang"=>$_SESSION["lang"],
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			
			);
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);
			
			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
                $this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 200, "");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 200, 'auto', '');
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
				
		$row=$this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$row["title"] = stripslashes($row["title"]);
		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace($this->imageEditor, SITE_URL.$this->imageEditor, $row["content"]);
		
		$this->smarty->assign("row", $row);
		$this->smarty->assign("menu_type", $this->getType());
		
		$this->smarty->assign("parent", $this->getOptions(" AND menu_type = '{$row['menu_type']}' "));
		
		$this->smarty->display('news_form.tpl');
	}
	
	function duplicate() {
		$row = $this->db->getRow("select * from {$this->table} where id = '{$_GET['id']}'");

		$row["id"] = "";
		$row["user_id"] = $_SESSION["user_id"];
		$row["create_date"] = date("Y-m-d H:i:s");
		$row["title"] = $row["title"]."-copy";
		$row["link"] = $row["link"]."-copy";
		
		$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
		
		$this->redirect("add");
		
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
			/*array(
				"field" 	=>"menu_type",
				"display" 	=> "Nhóm danh mục",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getType(),
				"selected" 	=> isset($_REQUEST["menu_type"])?$_REQUEST["menu_type"]:"",
			),*/
			array(
				"field" 	=> "news_category_id",
				"display" 	=> "Danh mục",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["news_category_id"])?$_REQUEST["news_category_id"]:"",
			),
			array(
				"field" 	=>"is_active",
				"display" 	=> "Hiện?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
			),
			
			array(
				"field" 	=> "create_date_from",
				"display" 	=> "Ngày tạo từ",
				"filter_condition" => " create_date >= '{$_REQUEST['create_date_from']}' ",
				"type" 		=> "date",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["create_date_from"])?$_REQUEST["create_date_from"]:"",
				"filterable"=>true
			),
			array(
				"field" 	=> "create_date_to",
				"display" 	=> "Ngày tạo đến",
				"filter_condition" => " create_date <= '{$_REQUEST['create_date_to']}' ",
				"type" 		=> "date",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["create_date_to"])?$_REQUEST["create_date_to"]:"",
				"filterable"=>true
			),
			/*array(
				"field" 	=> "user_id",
				"display" 	=> "Người tạo",
				"type" => "text",
				"sql" => "select id from user where username like lower('%".trim($_REQUEST['user_id'])."%')",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["user_id"])?$_REQUEST["user_id"]:"",
			),*/
		); 
		$this->arr_cols= array(		
			array(
				"field" => "id",					
				"primary_key" =>true,
				"display" => "ID",
				/*"visible"=>"hidden",*/
				"type" => "text",
				"width"=>"50",
				"sortable" => true,
				"searchable" => true,
				
			),	
			array(
				"field" => "photo",
				"display" => "Ảnh",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				/*"type" => "text",*/
				"sql" => "",
				"width" => "160",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			array(
				"field" => "link",
				"display" => "Link",
				"type" => "text",
				"sql" => "",
				"width" => "160",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			
			/*array(
				"field" => "menu_type",
				"display" => "Nhóm danh mục",
				"sql" => "",
				"width" => "150",
				"type" => "select",
				"option" => $this->getType(),
				"sortable" => true,
				"order_default" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/
			array(
				"field" => "news_category_id",
				"display" => "Danh mục",
				"width"	=> "350",
				"type" => "select",
				"option" => $this->getOptions(),
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),			
			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			/*array(
				"field" => "user_id",
				"display" => "Người tạo",
				"sql" => "SELECT username FROM user WHERE _table.user_id = user.id",
				"width"	=> "20",
				"sortable" => true,
				"editable" => false
			),*/
			/*array(
				"field" => "luotview",
				"display" => "Lượt view",
				"width"	=> "20",
				"sortable" => true,
				"editable" => false
			),*/
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"width" => "40",
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
				"field" => "is_top",
				"display" => "Nổi bật?",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
		);
		
		$this->arr_action[] = array(
			"target"  => "_blank",
			"task"    => "view",
			"text"    => "View",
			"icon"    => "view.jpg",
			"action"  => "",
			"tooltip" => "Xem bài viết"
		);
		$this->arr_action[] = array(
			"task"    => "duplicate",
			"text"    => "Duplicate",
			"icon"    => "duplicate.png",
			"action"  => "",
			"confirm" => "Are you sure?",
			"tooltip" => "Duplicate"
		);
		
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);
	}
}
?>