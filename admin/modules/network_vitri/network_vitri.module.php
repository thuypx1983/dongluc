<?php
class network_vitri extends base
{	
	function run($task="")
	{	
		$this->table= "network_vitri";
		$this->table_category= "network_mangluoi";
		//$this->where = " WHERE lang = '{$_SESSION['lang']}' ";
		$this->imagePath = 'upload/network/';
		$this->where = " WHERE 1 = 1 ";
		$this->order= " ORDER BY z_index DESC ";
		
		$this->setRootPath("_menu_");
		switch($task)
		{
			case "geoPreview":
				$this->geoPreview();
				break;
			case "getGeo":
				$this->getGeo();
				break;
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
					}
				}
			}
		}
		return $option;
	}	
	
	function geoPreview()
	{
		$this->smarty->assign("preview", $_GET);
		$this->smarty->display('geoPreview.tpl');
	}
	
	function getGeo()
	{
		$address = $_GET["address"];
		$address = str_replace(" ", "+", $address);
		$content = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address);
		$obj = json_decode($content);
		echo $obj->results[0]->geometry->location->lat."|".$obj->results[0]->geometry->location->lng;
	}
	
	function add()
	{
		/*$address = "Ngõ+134+Quan+Nhân,+Nhân+Chính,+Thanh+Xuân";
		$address = "Tân Mai, Hoàng Mai, Hà Nội";
		$address = str_replace(" ", "+", $address);
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address;
		echo $url; echo "<br />";
		$content = file_get_contents($url);
		$obj = json_decode($content);
		echo $obj->results[0]->geometry->location->lat."|".$obj->results[0]->geometry->location->lng;
		die();*/	
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$row = array(
				"title"=>$_POST["title"],
				"address"=>$_POST["address"],
				"mangluoi_id"=>$_POST["mangluoi_id"],
				"content"=>$_POST["content"],
				"lat"=>$_POST["lat"],
				"lon"=>$_POST["lon"],
				"is_primary"=>$_POST["is_primary"]+0,
				"is_active"=>$_POST["is_active"]+0,
			);
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				//$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name'], 32, 32, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			
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
			$row=array(
				"title"=>$_POST["title"],
				"address"=>$_POST["address"],
				"mangluoi_id"=>$_POST["mangluoi_id"],
				"content"=>$_POST["content"],
				"lat"=>$_POST["lat"],
				"lon"=>$_POST["lon"],
				"is_primary"=>$_POST["is_primary"]+0,
				"is_active"=>$_POST["is_active"]+0,
			);
			if($_POST["che_delphoto"]=="on") {
				// khong xoa file
				/*if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);*/
				$row["photo"] = "";
			}
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				//$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name'], 32, 32, "");
				move_uploaded_file($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
			}
			$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_UPDATE,"id='".$_GET["id"]."'");
			$this->smarty->assign("msg", "Cập nhật thành công");
		}
		
		$this->smarty->assign("parent", $this->getOptions());
		
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
			array(
				"field" 	=>"mangluoi_id",
				"display" 	=> "Mạng lưới",
				"style" 	=> "width:160px;",
				"type" => "select",
				"option" => $this->getOptions(),
				"selected" 	=> isset($_REQUEST["mangluoi_id"])?$_REQUEST["mangluoi_id"]:"",
			),
			array(
				"field" 	=>"lat",
				"display" 	=> "Vĩ độ",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["lat"])?$_REQUEST["lat"]:"",
			),
			array(
				"field" 	=>"lon",
				"display" 	=> "Kinh độ",
				"style" 	=> "width:160px;",
				"type" => "text",
				"selected" 	=> isset($_REQUEST["lon"])?$_REQUEST["lon"]:"",
			),	
			array(
				"field" 	=>"is_primary",
				"display" 	=> "Vị trí chính?",
				"type" => "select",
				"style" 	=> "width:160px;",
				"option" => array("0"=>"No", "1"=>"Yes"),
				"selected" 	=> isset($_REQUEST["is_primary"])?$_REQUEST["is_primary"]:"",
			),
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
			array(
				"field" => "photo",
				"display" => "Icon",
				"sql" => "",
				"width" => "50",
				"type" => "img",
				"img_path" => $this->imagePath,
				"sortable" => true,
			),
			array(
				"field" => "title",
				"display" => "Tiêu đề",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "mangluoi_id",
				"display" => "Mạng lưới",
				"sql" => "",
				"width" => "300",
				"type" => "select",
				"option" => $this->getOptions(),
				"sortable" => true,
				"order_default" => true,
				"editable" => $_SESSION["username"]=="root"?true:false,
			),
			array(
				"field" => "lat",
				"display" => "Vĩ độ",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "lon",
				"display" => "Kinh độ",
				"width" => "160",
				"sql" => "",
				"sortable" => true,
				"editable" => false
			),
			array(
				"field" => "is_primary",
				"display" => "Vị trí chính?",
				"sql" => "",
				"width" => "60",
				"type" => "boolean",
				"sortable" => true,
				"editable" => true
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