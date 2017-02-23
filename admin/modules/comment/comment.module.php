<?php
class comment extends base
{	
	function run($task="") {
		$this->table= "comment";
		
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	function getOptions() {
		$option= array();
		$opt_parent= $this->db->getAssoc("select id, title from {$this->table} where parent_id = 0 order by z_index desc");
		foreach($opt_parent as $k=>$v) {
			$option[$k] = $v;
			
			$opt_sub1 = $this->db->getAssoc("select id, title from {$this->table} where parent_id = $k order by z_index desc");
			foreach($opt_sub1 as $k1=>$v1) {
				$option[$k1] = "--- ".$v1;
			}
		}
		return $option;
	}	
	
	function getType()
	{
		return array(
			"product"=>"Sản phẩm",
			"news"=>"Bài viết",
		);
	}
	
	function add()
	{
		/* tat chuc nang */
		die();
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row=array(
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"description"=>$_POST["description"],
				"parent_id"=>$_POST["parent_id"],
				"z_index"=>$_POST["z_index"]+0,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
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
			$row = array(
				"name"=>$_POST["name"],
				"email"=>$_POST["email"],
				"content"=>$_POST["content"],
				"is_active"=>$_POST["is_active"]+0,
			);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
			
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$this->smarty->assign('row',$row);
		$this->smarty->display('edit_form.tpl');
	}
	
	function reply()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$pc = $this->db->getRow("SELECT * FROM {$this->table} WHERE id = '".$_GET['id']."' ");
			$row = array(
				"type"          => $pc['type'],
				"name"          => $_POST["name"],
				"parent_id"     => $pc["id"]+0,
				"email"         => $_POST["email"],
				"product_id"    => $pc['product_id'],
				"product_title" => $pc["product_title"],
				"link"          => $pc["link"],
				"create_date"   => date("Y-m-d H:i:s"),
				"is_active"     => 1,
				"is_read"       => 1,
				"reply_to_name" => $_POST["reply_to_name"],
			);
			$rtn = "";
			if($_POST["reply_to_name"]!='') {
				$rtn = "<rep>@".$_POST["reply_to_name"]."</rep>";
			}
			$row["content"] = $rtn.strip_tags($_POST["content"]);
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->redirect("add");
			echo (mysql_error());			
			exit();
		}

		$email_contact = $this->db->getOne("SELECT email_contact FROM contact ");
		$email_contact = $email_contact!=''?$email_contact:"hung.ngo@netlink.vn";
		$email_contact = trim($email_contact);
		$this->smarty->assign('email_contact', $email_contact);

		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		$row_sub = $this->db->getAll("SELECT * FROM {$this->table} WHERE parent_id = '{$row['id']}' ");
		if (count($row_sub) > 0)
			$row['is_replied'] = 1;
		
		$this->smarty->assign('row',$row);

		$this->smarty->display('reply_form.tpl');
	}

	function view() {
		/* update da doc */
		$this->db->query("
			UPDATE {$this->table} SET is_read = 1 WHERE id = '{$_GET['id']}'
		");
		/* get link de redirect */
		$link = $this->db->getOne("
			SELECT link FROM {$this->table} WHERE id = '{$_GET['id']}'
		");
		header('Location: http://'.$link.'#comment_'.$_GET['id']);
	}

	function grid()
	{		
		//$table = "(select * from {$this->table}  ) as _table";	
		$table = "(select {$this->table}.*, product.code, product.photo from {$this->table} LEFT JOIN product ON product.id = {$this->table}.product_id  ) as _table";
		$this->arr_filter= array(
			array(
				"field" 	=>"id",
				"display" 	=> "Code/ Parent",
				"style" 	=> "width:160px;",
				"sql"=>"SELECT id FROM {$this->table} WHERE parent_id = '{$_REQUEST['id']}' OR id = '{$_REQUEST['id']}' ",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["id"])?$_REQUEST["id"]:"",
			),
			array(
				"field" 	=>"name",
				"display" 	=> "Tên",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["name"])?$_REQUEST["name"]:"",
			),
			/*array(
				"field" 	=>"email",
				"display" 	=> "Email/ Phone",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["email"])?$_REQUEST["email"]:"",
			),
			*/
			array(
				"field" 	=>"content",
				"display" 	=> "Nội dung",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["content"])?$_REQUEST["content"]:"",
			),
			
			/*array(
                "field" => "type",
                "display" => "Loại",
                "style" => "width:160px;",
                "type" => "select",
                "option" => $this->getType(),
                "selected" => isset($_REQUEST["type"]) ? $_REQUEST["type"] : "",
            ),*/	
			array(
				"field" 	=>"product_title",
				"display" 	=> "Sản phẩm",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["product_title"])?$_REQUEST["product_title"]:"",
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
			array(
                "field" => "is_active",
                "display" => "Hiện?",
                "style" => "width:160px;",
                "type" => "select",
				"option" => array("1"=>"Yes", "0"=>"No"),
                "selected" => isset($_REQUEST["is_active"]) ? $_REQUEST["is_active"] : "",
            ),			
		); 
		$this->arr_cols= array(			
			array(
				"display"     => "Mã",
				"field"       => "id",
				"primary_key" =>true,
				/*"visible"     =>"hidden",*/
				"sortable"    => true,
				"searchable"  => true,
			),
			array(
				"display" => "Parent",
				"field" => "parent_id",
				"sortable" => true,
				"searchable" => true,
				"editable" => false,
			),
			
			array(
				"field"    => "name",
				"display"  => "Tên",
				"width"    => "160",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field"    => "email",
				"display"  => "Email",
				"width"    => "160",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
			),
			
			array(
				"field"    => "create_date",
				"display"  => "Ngày tạo",
				"width"    => "160",
				"type"     => "datetime",
				"sortable" => true,
				"editable" => false
			),
			/*
			array(
				"field" => "type",
				"display" => "Loại",
				"sql" => "",
				"type" => "select",
                "option" => $this->getType(),
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/
			array(
				"field"    => "content",
				"display"  => "Nội dung",
				"width"    => "160",
				"sql"      => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field"    => "is_read",
				"display"  => "Đã đọc?",
				"sql"      => "",
				"type"     => "boolean",
				"sortable" => true,
				"editable" => true
			),
			/*array(
				"field" => "product_id",
				"display" => "Ảnh sản phẩm",
				"sql" => "SELECT photo FROM product WHERE _table.product_id = product.id",
				"width" => "160",
				"type" => "img",
				"img_path" => "upload/product/thumb/",
				"sortable" => true,
			),*/		
			array(
				"field"         => "product_title",
				"display"       => "Sản phẩm",
				"width"         => "160",
				"order_default" => false,
				"sortable"      => true,
				"editable"      => false,
			),
			array(
				"field" => "code",
				"display" => "Mã hàng",
				"sql" => "",
				"width"	=> "160",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "photo",
				"display" => "Ảnh",
				"sql" => "",
				"type" => "img",
				"img_path" => "upload/product/",
				"sortable" => true,
			),
			array(
				"field"    => "is_active",
				"display"  => "Cho hiện?",
				"sql"      => "",
				"type"     => "boolean",
				"sortable" => true,
				"editable" => true,
			),
		);
		
		$this->arr_action[0] = array();
		$this->arr_action[2] = array();
		
		

		$this->arr_action[] = array(
			"task"    => "view",
			"action"  => "view",
			"icon"    => "view.jpg",
			"tooltip" => "View",
			"text"    => "View"
		);
		$this->arr_action[] = array(
			"task"    => "reply",
			"icon"    => "reply.png",
			"tooltip" => "Reply",
			"text"    => "Reply"
		);
		
		echo "<script>
			function view(id)
			{
				window.open('?mod=comment&task=view&ajax=true&id='+id,'_blank');
			}
		</script>";
		echo "
			<style>
				rep {
					font-style:italic;
					margin-right:6px;
					color:blue;
				}
			</style>
		";
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>