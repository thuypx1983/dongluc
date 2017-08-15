<?php
class catalogue extends base
{	
	function run($task="")
	{	
		$this->table= "catalogue";
		$this->imagePath = 'upload/catalogue/';
		$this->imageThumb = 'upload/catalogue/thumb/';
		
		$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order= " ORDER BY z_index DESC ";
		
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function duplicate() {
		$row = $this->db->getRow("select * from {$this->table} where id = '{$_GET['id']}'");

		$row["id"] = "";
		$row["user_id"] = $_SESSION["user_id"];
		$row["create_date"] = date("Y-m-d H:i:s");
		$row["update_user"] = "";
		$row["update_date"] = "";
		$row["title"] = $row["title"]."-copy";
		$row["link"] = $row["link"]."-copy";
		
		$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
		
		$this->redirect("add");
		
	}
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = array(	
				/*"product_type_id"=>$_POST["product_type_id"],*/
				/*"product_group_id"=>$_POST["product_group_id"],*/
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				/*"price"=>$_POST["price"],*/
				
				/*"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],*/
				
				"create_date"=>date("Y-m-d H:i:s"),
				"user_id"=>$_SESSION["user_id"],
			);
			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 180, 267, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
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
				/*"product_type_id"=>$_POST["product_type_id"],*/
				/*"product_group_id"=>$_POST["product_group_id"],*/
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				
				"z_index"=>$_POST["z_index"]+0,
				"is_active"=>$_POST["is_active"]+0,
				"lang"=>$_SESSION["lang"],
				/*"price"=>$_POST["price"],*/
				
				/*"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],*/
				
				"update_date"=>date("Y-m-d H:i:s"),
				"update_user"=>$_SESSION["user_id"],
			);
			
			$row["content"] = str_replace(SITE_URL."upload/editor/", "upload/editor/", $_POST["content"]);
			if($_POST["che_delphoto"]=="on") {
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			if($_FILES['photo']['name']!='') {
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 180, 267, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
				
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		$row["user_id"] = $this->db->getOne("SELECT username FROM user WHERE id = '{$row['user_id']}'");
		$row["update_user"] = $this->db->getOne("SELECT username FROM user WHERE id = '{$row['update_user']}'");
		$this->smarty->assign('row',$row);
		$this->smarty->display('form.tpl');
	}
	
	function grid()
	{
		$table = "(select * from {$this->table} {$this->where} ) as _table";
		
		$this->arr_filter= array(
			
			/*array(
				"field" 	=>"id",
				"display" 	=> "ID",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["id"])?$_REQUEST["id"]:"",
			),*/
			
			array(
				"field" 	=>"title",
				"display" 	=> "Mã váy",
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
			/*array(
				"field" 	=> "user_id",
				"display" 	=> "Người tạo",
				"type" => "text",
				"sql" => "select id from user where username like lower('%".trim($_REQUEST['user_id'])."%')",
				"style" 	=> "width:160px;",
				"selected" 	=> isset($_REQUEST["user_id"])?$_REQUEST["user_id"]:"",
			),*/
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
			
		); 
		$this->arr_cols= array(			
			array(
				"field" => "id",					
				"primary_key" =>true,
				"display" => "ID",
				"visible"=>"hidden",
				"type" => "text",
				"width"=>"50",
				"sortable" => true,
				"searchable" => true,
				
			),
			/*array(
				"field" => "product_group_id",
				"display" => "Danh mục",
				"type" => "select",
				"width"	=> "220",
				"option" => $this->getOptions(),
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/	
			array(
				"field" => "photo",
				"display" => "Ảnh",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
			),
			/*array(
				"field" => "price",
				"display" => "Giá",
				"sql" => "",
				"sortable" => true,
				"type" => "text",
				"editable" => true
			),*/
			array(
				"field" => "title",
				"display" => "Mã váy",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false,
			),
			/*array(
				"field" => "link",
				"display" => "Link",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false
			),*/
			
			array(
				"field" => "z_index",
				"display" => "Thứ tự",
				"sql" => "",
				"width" => "50",
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
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "datetime",
				"sortable" => true,
				"editable" => false
			),
			/*array(
				"field" => "user_id",
				"display" => "Người tạo",
				"sql" => "SELECT username FROM user WHERE _table.user_id = user.id",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "update_date",
				"display" => "LastUpdate",
				"sql" => "",
				"width" => "50",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "update_user",
				"display" => "UserUpdate",
				"sql" => "SELECT username FROM user WHERE _table.update_user = user.id",
				"width" => "70",
				"sortable" => true,
				"editable" => false
			),*/
		);
		
		if($_SESSION["username"]=="root") {
			$this->arr_action[] = array(
				"task" => "duplicate",
				"text" => "Duplicate",
				"action" => "",
				"confirm" => "Are you sure?",
				"tooltip" => "Duplicate"
			);
		}
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
		
		//$this->smarty->display('action.tpl');
	}
}
?>