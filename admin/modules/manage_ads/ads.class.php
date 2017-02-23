<?php
class ads extends base
{	
	function run($task="")
	{	
		
		$this->table          = "ads";
		$this->imagePath      = 'upload/ads/';
		$this->imageThumb	  = 'upload/ads/thumb/';

		$this->where          = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->order          = " ORDER BY z_index DESC ";
		
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
	
	function getNewsCategory() {
		
		$news_category = $this->getOptionNewsCategory(" AND page_template = '{$_REQUEST['code']}' ");
		echo mysql_error();
		$this->smarty->assign("news_category", $news_category);
		$this->smarty->display('get_category.tpl');
	}
	
	function getOptionNewsCategory($where="")
	{
		return $this->db->getAssoc("SELECT id, title FROM news_category WHERE parent_id = 0 {$where} ");
	}
	function getOptionPosition() {
		return $this->db->getAssoc("select code, title from ads_position order by title");
	}
	function getOptionAdsType() {
		return array("image"=>"Image", "flash"=>"Flash / Video Embed");
	}
	function getOptionTarget() {
		return array("_blank"=>"_blank (Mở tab mới)", "_self"=>"_self (Trong tab)");
	}
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row = array(
				"news_category_id" => $_POST["news_category_id"],
				"position"         => $_POST["position"],
				"ads_type"         => $_POST["ads_type"],
				"title"            => $_POST["title"],
				"description"      => $_POST["description"],
				"create_date"      => date("Y-m-d"),
				"is_active"        => $_POST["is_active"]+0,
				"z_index"          => ($_POST["z_index"]>0)?$_POST["z_index"]:9999,
				"link"             => $_POST["link"],
				
				"lang"             => $_SESSION["lang"],
				"target"           => $_POST["target"],
				"embed"            => $_POST["embed"]."",
			);

			if ($_POST['link'] != '')
			{
				$row['link'] = preg_replace('#^https?://#', '', $_POST['link']);
				$row['link'] = 'http://' . $row['link'];
			}

			if($_FILES['photo']['name']!='')
			{
				$row['photo'] = $_FILES['photo']['name'];
				$pos = $this->db->getRow("SELECT * FROM ads_position WHERE code = '{$_POST['position']}' ");
				$width  = $pos["width"];
				$height = $pos["height"];
				$forcesize = "";
				if ($width > 0 && $height > 0) {
					$forcesize = "y";
				}
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 250, 250, "");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imagePath.$pos["code"].'/'.$_FILES['photo']['name'], $width, $height, $forcesize);

				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$pos["code"].'/'.$_FILES['photo']['name']);
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
						
			exit();*/
		}
		
		$news_category = $this->getOptionNewsCategory();
		$this->smarty->assign("news_category", $news_category);
		
		$this->smarty->assign("ads_type", $this->getOptionAdsType());
		$this->smarty->assign("position", $this->getOptionPosition());
		$this->smarty->assign("target", $this->getOptionTarget());
		
		$this->smarty->display('ads.tpl');
	}
	
	function edit()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
		
			$row=array(
				"news_category_id" =>$_POST["news_category_id"],
				"position"         =>$_POST["position"],
				"ads_type"         =>$_POST["ads_type"],
				"title"            =>$_POST["title"],
				"description"      =>$_POST["description"],
				"is_active"        =>$_POST["is_active"]+0,
				"z_index"          =>$_POST["z_index"]+0,
				"link"             =>$_POST["link"],
				"lang"             =>$_SESSION["lang"],
				"target"           =>$_POST["target"],
				"embed"            =>$_POST["embed"]."",
			);
			
			if ($_POST['link'] != '')
			{
				$row['link'] = preg_replace('#^https?://#', '', $_POST['link']);
				$row['link'] = 'http://' . $row['link'];
			}

			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			$pos = $this->db->getRow("SELECT * FROM ads_position WHERE code = '{$_POST['position']}' ");
			$width  = $pos["width"];
			$height = $pos["height"];
			$forcesize = "";
			if ($width > 0 && $height > 0) {
				$forcesize = "y";
			}

			if($_FILES['photo']['name']!='')
			{
				$row['photo'] = $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 250, 250, "");
				$this->thumbSave_simple($_FILES['photo']['tmp_name'], $this->imagePath.$pos["code"].'/'.$_FILES['photo']['name'], $width, $height, $forcesize);

				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$pos["code"].'/'.$_FILES['photo']['name']);
			}
			else
			{
				if ($_POST['position_old'] != $_POST['position'] && $_POST['hid_oldphoto'] !='') {
					$path = $this->imagePath . $_POST['hid_oldphoto'];
					$this->thumbSave_simple($path, $this->imagePath.$_POST['position'].'/'.$_POST['hid_oldphoto'], $width, $height, $forcesize);
				}
			}
			
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			
			$this->smarty->assign("msg", "Cập nhật thành công");
			/*$this->redirect("edit");
			echo (mysql_error());			
			exit();*/
		}
		
		
		
		$this->smarty->assign("ads_type", $this->getOptionAdsType());
		$this->smarty->assign("position", $this->getOptionPosition());
		$this->smarty->assign("target", $this->getOptionTarget());
				
		$row = $this->db->getRow("select * from {$this->table} where id='".$_GET['id']."'");
		
		$news_category = $this->getOptionNewsCategory();
		
		$this->smarty->assign("news_category", $news_category);
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('ads.tpl');
	}
	
	
	function grid()
	{		
		$table = "(select * from {$this->table} ) as _table";	
		$this->arr_filter= array(
			array(
				"field" 	=>"title",
				"display" 	=> "Tiêu đề",
				"style" 	=> "width:160px;",
				"type"		=> "text",
				"selected" 	=> isset($_REQUEST["title"])?$_REQUEST["title"]:"",	
			),
			array(
				"field" 	=>"position",
				"display" 	=> "Vị trí",
				"style" 	=> "width:360px;",
				"type"		=> "select",
				"option"	=> $this->getOptionPosition(),
				"selected" 	=> isset($_REQUEST["position"])?$_REQUEST["position"]:"",	
			),
			/*array(
				"field" 	=>"news_category_id",
				"display" => "Chuyên mục",
				"style" 	=> "width:360px;",
				"type"		=> "select",
				"option"	=> $this->getOptionNewsCategory(),
				"selected" 	=> isset($_REQUEST["news_category_id"])?$_REQUEST["news_category_id"]:"",	
			),*/
			array(
				"field" 	=>"ads_type",
				"display" 	=> "ads_type",
				"style" 	=> "width:160px;",
				"type"		=> "select",
				"option"		=> $this->getOptionAdsType(),
				"selected" 	=> isset($_REQUEST["ads_type"])?$_REQUEST["ads_type"]:"",	
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
				"field" => "position",
				"display" => "Vị trí",
				"sql" => "",
				"type" => "select",
				"option"=>$this->getOptionPosition(),
				"order_default" => true,
				"width"=>"200",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			/*array(
				"field" => "news_category_id",
				"display" => "Chuyên mục",
				"sql" => "",
				"type" => "select",
				"option"=>$this->getOptionNewsCategory(),
				"width"=>"200",
				"sortable" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),*/
			array(
				"field" => "ads_type",
				"display" => "Ads_type",
				"sql" => "",
				"type" => "select",
				"option"=>$this->getOptionAdsType(),
				"sortable" => true,
				"editable" => true
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
				"field" => "link",
				"display" => "Liên kết ngoài",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true
			),
			array(
				"field" => "target",
				"display" => "Target",
				"sql" => "",
				"type" => "select",
				"option" => $this->getOptionTarget(),
				"sortable" => true,
				"editable" => true
			),			
			array(
				"field" => "is_active",
				"display" => "Active?",
				"sql" => "",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
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
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "date",
				"sortable" => true
			),
		);
		
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}	
}
?>