<?php
class video extends base
{	
	function run($task="")
	{	
		$this->table= "gallery_video";
		$this->table_category= "gallery_album";
		$this->where = " WHERE 1 = 1 ";
		$this->order= " ORDER BY z_index DESC ";
		$this->imageThumb = 'upload/gallery/video/thumb/';
		$this->imagePath = "upload/gallery/video/";
		$this->setRootPath("_menu_");
		switch($task)
		{	
			case "getThumbAlbum":
				$this->getThumbAlbum();
				break;
			default:
				parent::run($task);
		}
	}
	
	function getOptionNewsCategory($where="")
	{
		return $this->db->getAssoc("SELECT id, title FROM news_category WHERE parent_id = 0 {$where} ");
	}
	
	function duplicate() {
		$row = $this->db->getRow("select * from {$this->table} where id = '{$_GET['id']}'");

		$row["id"] = "";
		$row["create_date"] = date("Y-m-d H:i:s");
		$row["title"] = $row["title"]."-copy";
		$row["link"] = $row["link"]."-copy";
		
		$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
		
		$this->redirect("add");
		
	}
	
	function getThumbAlbum()
	{
		if ($_REQUEST['id'] > 0) {
			$album_photo = $this->db->getOne("SELECT photo FROM {$this->table_category} WHERE id='{$_REQUEST['id']}' ");
			$album_sum = $this->db->getOne("SELECT count(id) FROM {$this->table} WHERE album_id='{$_REQUEST['id']}' ");
			echo '<img src="upload/gallery/album/thumb/'.$album_photo.'" style="max-width:100px;" /> <em>Đang có '.$album_sum.' Video</em>';		
		} else {
			echo 'Mời bạn chọn album!';
		}		
	}
	
	function getAlbum()
	{
		return $this->db->getAssoc("SELECT id, title FROM {$this->table_category} {$this->where} AND album_type = 1");
	}
	
	function assignSum($album_id)
	{
		return $this->db->getOne("SELECT count(id) FROM {$this->table} WHERE album_id='{$album_id}' ");
	}
	
	function assignPhoto($album_id)
	{
		return $this->db->getOne("SELECT photo FROM {$this->table_category} WHERE id='{$album_id}' ");
	}
	
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = array(
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"embed"=>$_POST["embed"],
				"album_id"=>$_POST["album_id"]+0,
				"z_index"=>($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"is_active"=>$_POST["is_active"]+0,
				"create_date"=>date("Y-m-d H:i:s"),
			);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 170, 100, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			$this->smarty->assign("msg", "Thêm thành công");
			
			$album_id = $row['album_id'];
			#$last_photo = $row['photo'];
			
			$row = array();
			$row['album_id'] = $album_id;
			#$row['last_photo'] = $last_photo;
			
			$this->smarty->assign("album_photo", $this->assignPhoto($row['album_id']));
			$this->smarty->assign("album_sum", $this->assignSum($row['album_id']));
			
			$this->smarty->assign("row", $row);
			/*$this->redirect("add");
			exit();*/
		}
		if ($_GET['album_id'] != '' && $_SERVER['REQUEST_METHOD']!='POST') {
			$this->smarty->assign("album_photo", $this->assignPhoto($_GET['album_id']));
			$this->smarty->assign("album_sum", $this->assignSum($_GET['album_id']));
		}
		
		$this->smarty->assign("news_category", $this->getOptionNewsCategory());
		$this->smarty->assign("album", $this->getAlbum());
		$this->smarty->display('video.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST') {
			
			$row = array(
				"news_category_id"=>$_POST["news_category_id"],
				"title"=>$_POST["title"],
				"link"=>($_POST["link"]!="")?$_POST["link"]:remove_marks($_POST["title"]),
				"embed"=>$_POST["embed"],
				"album_id"=>$_POST["album_id"]+0,
				"z_index"=>$_POST["z_index"]+0,
				"is_active"=>$_POST["is_active"]+0,
			);
			
			if($_POST["che_delphoto"]=="on") {
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='') {
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'],  170, 100, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			echo mysql_error();
			$this->smarty->assign("msg", "Cập nhật thành công");
			
			
		}
		
		$this->smarty->assign("album", $this->getAlbum());
		
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id='".$_GET['id']."' ");
		$this->smarty->assign("row", $row);
		
		$this->smarty->assign("album_photo", $this->assignPhoto($row['album_id']));
		$this->smarty->assign("album_sum", $this->assignSum($row['album_id']));
		
		$this->smarty->assign("news_category", $this->getOptionNewsCategory());
		
		$this->smarty->display('video.tpl');
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
			array(
				"field" => "photo",
				"display" => "Ảnh",
				"sql" => "",
				"type" => "img",
				"img_path" => $this->imageThumb,
				"sortable" => true,
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
				"field" => "is_active",
				"display" => "Hiện?",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
			),
		);
		
		$this->arr_action[] = array(
			"task" => "duplicate",
			"text" => "Duplicate",
			"action" => "",
			"confirm" => "Are you sure?",
			"tooltip" => "Duplicate"
		);
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	
	}
}
?>