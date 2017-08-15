<?php
class product extends base
{	
	function run($task="")
	{	
		$this->table            = "product";
		$this->table_category   = "product_type";
		/*$this->table_category = "product_group";*/
		$this->imagePath        = 'upload/product/';
		$this->imageThumb       = 'upload/product/thumb/';
		$this->imageMedium      = 'upload/product/medium/';
		$this->imageEditor      = "upload/editor/";
		
		$this->where            = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order            = " ORDER BY z_index DESC ";
		
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function getOptions() {
		$option= array();
		$opt_parent= $this->db->getAssoc("select id, title from {$this->table_category} {$this->where} and parent_id = 0 order by id asc");
		$sperator = " &#8594; ";
		foreach($opt_parent as $k=>$v) {
			$option[$k] = $v;
			
			$opt_sub1 = $this->db->getAssoc("select id, title from {$this->table_category} {$this->where} and parent_id = $k order by id asc");
			
			foreach($opt_sub1 as $k1=>$v1) {
				$option[$k1] = $v.$sperator.$v1;
				
				$opt_sub2 = $this->db->getAssoc("select id, title from {$this->table_category} {$this->where} and parent_id = $k1 order by id asc");
				
				foreach($opt_sub2 as $k2=>$v2) {
					$option[$k2] = $v.$sperator.$v1.$sperator.$v2;
					$opt_sub3 = $this->db->getAssoc("select id, title from {$this->table_category} {$this->where} and parent_id = $k2 order by id asc");
					
					foreach($opt_sub3 as $k3=>$v3) {
						$option[$k3] = $v.$sperator.$v1.$sperator.$v2.$sperator.$v3;
						$opt_sub4 = $this->db->getAssoc("select id, title from {$this->table_category} {$this->where} and parent_id = $k3 order by id asc");
					
						foreach($opt_sub4 as $k4=>$v4) {
							$option[$k4] = $v.$sperator.$v1.$sperator.$v2.$sperator.$v3.$sperator.$v4;
						}
					}
				}
			}
		}
		return $option;
	}
	
	function getPrice() {
		return $this->db->getAssoc("select id, title from product_price order by id DESC");
	}
	function getMaterial() {
		return $this->db->getAssoc("select id, title from product_material order by z_index DESC");
	}
	function getSize() {
		return $this->db->getAssoc("select id, title from product_size order by z_index DESC");
	}
	function getColor() {
		return $this->db->getAssoc("select id, title from product_color order by z_index DESC");
	}
	function getColors() {
		return $this->db->getAll("select id, title, color_code from product_color order by z_index DESC");
	}

	/*function getOptions()
	{
		return $this->db->getAssoc("SELECT id, title FROM {$this->table_category} {$this->where} {$this->order}");
	}*/
	
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
			#echo "<pre>";print_r($_POST); echo "</pre>";
			$row = array(	
				"embed"              => $_POST["embed"],
				"product_type_id"    => $_POST["product_type_id"],
				/*"product_group_id" =>$_POST["product_group_id"],*/
				"code"               => $_POST["code"],
				"title"              => $_POST["title"],
				"link"               => ($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
                "link_out"           => $_POST["link_out"],
				
				"z_index"            => ($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"          => $_POST["is_active"]+0,
				"is_top"             => $_POST["is_top"]+0,
				"lang"               => $_SESSION["lang"],
				
				"discount"           => $_POST["discount"],
				"price_sale"         => $_POST["price_sale"],
				"price"              => $_POST["price"],
				"price_id"           => $_POST["price_id"],
				
				"seo_title"          => $_POST["seo_title"],
				"seo_description"    => $_POST["seo_description"],
				"seo_keyword"        => $_POST["seo_keyword"],
				
				"create_date"        => date("Y-m-d H:i:s"),
				"user_id"            => $_SESSION["user_id"]
			);
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);

			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 142, 142, "y");
				#$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 142, 142, "y");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);

			$last_id = mysql_insert_id();
			
			/*màu sắc*/
			if(count($_POST["color_id"])>0) {
				foreach($_POST["color_id"] as $k=>$v) {
					$sql = "insert into product_has_color(product_id, color_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			if(count($_POST["size_id"])>0) {
				foreach($_POST["size_id"] as $k=>$v) {
					$sql = "insert into product_has_size(product_id, size_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			if(count($_POST["material_id"])>0) {
				foreach($_POST["material_id"] as $k=>$v) {
					$sql = "insert into product_has_material(product_id, material_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			/*if(count($_POST["price_id"])>0) {
				foreach($_POST["price_id"] as $k=>$v) {
					$sql = "insert into product_has_price(product_id, price_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}*/
			
			$this->smarty->assign("msg", "Thêm thành công");
			/*$this->redirect("add");
			exit();*/
		}
		
		$this->smarty->assign("price", $this->getPrice());
		$this->smarty->assign("material", $this->getMaterial());
		$this->smarty->assign("size", $this->getSize());
		$this->smarty->assign("color", $this->getColor());
		$this->smarty->assign("colors", $this->getColors());

		$this->smarty->assign("type", $this->getOptions());
		$this->smarty->display('product_form.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			#echo "<pre>";print_r($_POST); echo "</pre>";
			$row=array(	
				"embed"              =>	$_POST["embed"],
				"product_type_id"    =>	$_POST["product_type_id"],
				/*"product_group_id" =>$_POST["product_group_id"],*/
				"code"               =>	$_POST["code"],
				"title"              =>	$_POST["title"],
				"link"               =>	($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
                "link_out"           => $_POST["link_out"],
				
				"z_index"            =>	$_POST["z_index"]+0,
				"is_active"          =>	$_POST["is_active"]+0,
				"is_top"             =>	$_POST["is_top"]+0,
				"lang"               =>	$_SESSION["lang"],
				
				"discount"           =>	$_POST["discount"],
				"price_sale"         =>	$_POST["price_sale"],
				"price"              =>	$_POST["price"],
				"price_id"           =>	$_POST["price_id"],
				
				"seo_title"          =>	$_POST["seo_title"],
				"seo_description"    =>	$_POST["seo_description"],
				"seo_keyword"        => $_POST["seo_keyword"],
					
				"update_date"        =>	date("Y-m-d H:i:s"),
				"update_user"        =>	$_SESSION["user_id"],
			);
			
			$row["content"] = str_replace(SITE_URL.$this->imageEditor, $this->imageEditor, $_POST["content"]);
			if($_POST["che_delphoto"]=="on") {
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			if($_FILES['photo']['name']!='') {
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 142, 142);
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");

			$last_id = $_GET["id"];
			$this->db->query("delete from product_has_color where product_id = {$last_id}");
			$this->db->query("delete from product_has_size where product_id = {$last_id}");
			$this->db->query("delete from product_has_material where product_id = {$last_id}");
			#$this->db->query("delete from product_has_price where product_id = {$last_id}");

			/*màu sắc*/
			if(count($_POST["color_id"])>0) {
				foreach($_POST["color_id"] as $k=>$v) {
					$sql = "insert into product_has_color(product_id, color_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			if(count($_POST["size_id"])>0) {
				foreach($_POST["size_id"] as $k=>$v) {
					$sql = "insert into product_has_size(product_id, size_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			if(count($_POST["material_id"])>0) {
				foreach($_POST["material_id"] as $k=>$v) {
					$sql = "insert into product_has_material(product_id, material_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}
			/*if(count($_POST["price_id"])>0) {
				foreach($_POST["price_id"] as $k=>$v) {
					$sql = "insert into product_has_price(product_id, price_id) values({$last_id}, {$v})";
					$this->db->query($sql);
					echo mysql_error();
				}
			}*/

			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
				
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");
		$row["content"] = stripslashes($row["content"]);
		$row["content"] = str_replace($this->imageEditor, SITE_URL.$this->imageEditor, $row["content"]);

		$row['color_id']    = $this->db->getCol("SELECT color_id FROM product_has_color WHERE product_id = {$_GET['id']}");            
		$row['size_id']     = $this->db->getCol("SELECT size_id FROM product_has_size WHERE product_id = {$_GET['id']}");                  
		$row['material_id'] = $this->db->getCol("SELECT material_id FROM product_has_material WHERE product_id = {$_GET['id']}");
		#$row['price_id']    = $this->db->getCol("SELECT price_id FROM product_has_price WHERE product_id = {$_GET['id']}");            

		/*$row["user_id"] = $this->db->getOne("SELECT username FROM user WHERE id = '{$row['user_id']}'");
		$row["update_user"] = $this->db->getOne("SELECT username FROM user WHERE id = '{$row['update_user']}'");*/
		$this->smarty->assign("price", $this->getPrice());
		$this->smarty->assign("material", $this->getMaterial());
		$this->smarty->assign("size", $this->getSize());
		$this->smarty->assign("color", $this->getColor());
		$this->smarty->assign("colors", $this->getColors());

		$this->smarty->assign("type", $this->getOptions());
		$this->smarty->assign('row',$row);
		$this->smarty->display('product_form.tpl');
	}
	
	function grid()
	{
		$table = "(SELECT * from {$this->table} {$this->where} ) as _table";
		
		$this->arr_filter= array(
			
			array(
				"field" 	=>"id",
				"display" 	=> "ID",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["id"])?$_REQUEST["id"]:"",
			),
			array(
				"field" 	=>"code",
				"display" 	=> "Mã hàng",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["code"])?$_REQUEST["code"]:"",
			),
			array(
				"field" 	=> "product_type_id",
				"display" 	=> "Danh mục",
				"style" 	=> "width:160px;",
				"type" => "select",
				/*"sql"	=> "select product_id from product_type_has_product where product_type_id = '".$_REQUEST["product_type_id"]."' ",*/
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["product_type_id"])?$_REQUEST["product_type_id"]:"",
			),
			
			array(
				"field" 	=>"title",
				"display" 	=> "Tên SP",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",
			),
			array(
				"field" 	=>"price_sale",
				"display" 	=> "Giá bán",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["price_sale"])?$_REQUEST["price_sale"]:"",
			),
			array(
				"field" 	=>"is_active",
				"display" 	=> "Kích hoạt?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_active"])?$_REQUEST["is_active"]:"",
			),
			array(
				"field" 	=>"is_top",
				"display" 	=> "Bán chạy?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_top"])?$_REQUEST["is_top"]:"",
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
				/*"visible"=>"hidden",*/
				"type" => "text",
				"width"=>"50",
				"sortable" => true,
				"searchable" => true,
				
			),
			array(
				"field" => "code",
				"display" => "Mã hàng",
				"sql" => "",
				"sortable" => true,
				"editable" => false
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
				"field" => "product_type_id",
				"display" => "Danh mục",
				"type" => "select",
				"width"	=> "220",
				"option" => $this->getOptions(),
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),	
			array(
				"field" => "price",
				"display" => "Giá gốc",
				"sql" => "",
				"sortable" => true,
				"type" => "price",
				"unit" => " vnđ",
				"editable" => false
			),
			array(
				"field" => "price_sale",
				"display" => "Giá bán",
				"sql" => "",
				"sortable" => true,
				"type" => "price",
				"unit" => " vnđ",
				"editable" => false
			),
			array(
				"field" => "discount",
				"display" => "Giảm(%)",
				"sql" => "",
				"sortable" => true,
				"type" => "price",
				"unit" => "%",
				"editable" => false
			),
			array(
				"field" => "title",
				"display" => "Tên SP",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false,
			),
			array(
				"field" => "code",
				"display" => "Mã hàng",
				"sql" => "",
				"width"	=> "100",
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
			),
			*/
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
				"field" => "is_top",
				"display" => "Bán chạy?",
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
			),
			array(
				"field" => "lang_id",
				"display" => "Ngôn ngữ",
				"sql" => "",
				"width" => "80",
				"type" => "lang",
				"flag" => $this->db->getAssoc("SELECT code, concat('upload/lang/flag/', photo) FROM lang ORDER BY is_default DESC"),
				"sortable" => true,
			),*/
		);
		

		/*$this->arr_action[] = array(
			"task"    => "duplicate",
			"text"    => "Duplicate",
			"icon"    => "duplicate.png",
			"action"  => "",
			"confirm" => "Are you sure?",
			"tooltip" => "Duplicate"
		);*/

		$this->arr_action[] = array(
			"mod"     => "product_photo",
			"task"    => "photo",
			"text"    => "Photo",
			"icon"    => "photo.png",
			"action"  => "",
			"tooltip" => "Photo"
		);

		if($_SESSION["username"]=="root") {
			
		}
		
		/*$this->arr_check[] = array(
			"task" => "multi_duplicate",
			"display" => "Sao chép sang ".strtoupper($this->lang_convert[$_SESSION["lang"]]),
		);*/
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
		
		//$this->smarty->display('action.tpl');
	}
}
?>