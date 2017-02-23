<?php
class album extends base
{	
	function run($task="")
	{	
		$this->table= "gallery_album";
		$this->where = " WHERE 1 = 1 ";
		$this->order= " ORDER BY z_index DESC ";
		$this->imageThumb = 'upload/gallery/album/thumb/';
		$this->imagePath = "upload/gallery/album/";
		$this->setRootPath("_menu_");
		switch($task)
		{	
			default:
				parent::run($task);
		}
	}
	
	function getOptionNewsCategory($where="")
	{
		return $this->db->getAssoc("SELECT id, title FROM news_category WHERE parent_id = 0 {$where} ");
	}
	
	function view_photo()
	{
		$album_type = $this->db->getOne("SELECT album_type FROM {$this->table} WHERE id = '{$_GET['id']}'");
		$album_type = ($album_type == 1 ? 'video' : 'photo');
		redirect(SITE_URL."admin.php?mod=gallery&sub=" . $album_type . "&album_id=" . $_GET['id']);
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = array(
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"description"=>$_POST["description"],
				
				"album_type"=>0,
				
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"=>$_POST["is_active"]+0,
				"is_home"=>$_POST["is_home"]+0,
				"create_date"=>date("Y-m-d H:i:s"),
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 194, 128, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			
			if ($_SESSION['username'] != 'root') {
				$this->redirect("add");
				exit();
			}
		}
		$this->smarty->assign("news_category", $this->getOptionNewsCategory());
		
		$this->smarty->display('album.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			
			$row = array(
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"description"=>$_POST["description"],
				
				/*"album_type"=>$_POST["album_type"],*/
				
				"z_index"=>$_POST["z_index"]+0,
				"is_active"=>$_POST["is_active"]+0,
				"is_home"=>$_POST["is_home"]+0,
				
				"seo_title"=>$_POST["seo_title"],
				"seo_description"=>$_POST["seo_description"],
				"seo_keyword"=>$_POST["seo_keyword"],
			);
			
			if($_POST["che_delphoto"]=="on") {
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='') {
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 194, 128, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			echo mysql_error();
			$this->smarty->assign("msg", "Cập nhật thành công");
			
			
		}
		
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."'");
		$this->smarty->assign("row", $row);
		
		$this->smarty->assign("news_category", $this->getOptionNewsCategory());
		
		$this->smarty->display('album.tpl');
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
			/*array(
				"field" 	=>"album_type",
				"display" 	=> "Kiểu Album",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"Album về ảnh", "1"=>"Album về video"),
				"selected" 	=> isset($_REQUEST["album_type"])?$_REQUEST["album_type"]:"",
			),*/
			array(
				"field" 	=>"is_home",
				"display" 	=> "Hiện Tr.chủ ?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_home"])?$_REQUEST["is_home"]:"",
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
				"field" 	=>"news_category_id",
				"display" => "Chuyên mục",
				"style" 	=> "width:360px;",
				"type"		=> "select",
				"option"	=> $this->getOptionNewsCategory(),
				"selected" 	=> isset($_REQUEST["news_category_id"])?$_REQUEST["news_category_id"]:"",	
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
				"sql" => "",
				"type" => "text",
				"width"=>"260",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
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
				"field" => "news_category_id",
				"display" => "Chuyên mục",
				"sql" => "",
				"type" => "select",
				"option"=>$this->getOptionNewsCategory(),
				"width"=>"200",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			/*array(
				"field" => "album_type",
				"display" => "Kiểu Album",
				"type" => "select",
				"option" => array("0"=>"Album về ảnh", "1"=>"Album về video"),
				"width"=>"160",
				"sortable" => true,
				"editable" => false,
			),*/
			array(
				"field" => "album_sum",
				"display" => "Tổng Ảnh",
				"sql" => "SELECT count(id) FROM gallery_photo WHERE _table.id = gallery_photo.album_id",
				"width"=>"160",
				"sortable" => true,
				"editable" => false,
			),		
			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "datetime",
				"sortable" => true,
				"editable" => false
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
				"field" => "is_home",
				"display" => "Hiện Tr.chủ?",
				"sql" => "",
				"type" => "boolean",
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
		);
		
		$this->arr_action[] = array(
			"task" => "view_photo",
			"text" => "View",
			"icon" => "view.jpg",
			"action" => "",
			"tooltip" => "View all photo"
		);
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	
	}
}
?>