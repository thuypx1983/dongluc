<?php
class slide extends base
{	
	function run($task="")
	{	
		
		$this->table= "ads";
		$this->imagePath = 'upload/slide/';
		$this->imageThumb = 'upload/slide/thumb/';
		
		$this->setRootPath("_menu_");
		switch($task)
		{		
			
			default:
				parent::run($task);
		}
	}
	
	function getOptionPosition() {
		return $this->db->getAssoc("select code, title from ads_position");
	}
	function getOptionAdsType() {
		return array("image"=>"Image", "flash"=>"Flash");
	}
	function getOptionTarget() {
		return array("_blank"=>"_blank", "_self"=>"_self");
	}
	function add()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			$row=array(
				"position"=>$_POST["position"],
				"ads_type"=>$_POST["ads_type"],
				"title"=>$_POST["title"],
				"description"=>$_POST["description"],
				"create_date"=>date("Y-m-d"),
				"is_active"=>$_POST["is_active"]+0,
				"z_index"=>$_POST["z_index"],
				"link"=>$_POST["link"],
				"target"=>$_POST["target"],
				"embed"=>$_POST["embed"],
			);

			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 300, 250, "");
			}
			
			$this->db -> autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
			
			$this->smarty->assign("msg", "Thêm thành công");
			
			/*$this->redirect("add");
						
			exit();*/
		}
		
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
				"position"=>$_POST["position"],
				"ads_type"=>$_POST["ads_type"],
				"title"=>$_POST["title"],
				"description"=>$_POST["description"],
				"is_active"=>$_POST["is_active"]+0,
				"z_index"=>$_POST["z_index"]+0,
				"link"=>$_POST["link"],
				"target"=>$_POST["target"],
				"embed"=>$_POST["embed"],
			);
			
			if($_POST["che_delphoto"]=="on")
			{
				if(is_file($this->imagePath.$_POST["hid_oldphoto"]))
					$this->unlinkPhoto($this->imagePath, $_POST["hid_oldphoto"]);
				$row["photo"]= "";		
			}
			
			if($_FILES['photo']['name']!='')
			{
				$row['photo']= $_FILES['photo']['name'];
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imagePath.$_FILES['photo']['name']);
				$this->thumbSave($_FILES['photo']['tmp_name'], $this->imageThumb.$_FILES['photo']['name'], 300, 250, "");
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
		
		$this->smarty->assign('row',$row);
		$this->smarty->display('ads.tpl');
	}
	
	
	function grid()
	{		
		$table = "(select * from {$this->table}  ) as _table";	
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
				"style" 	=> "width:160px;",
				"type"		=> "select",
				"option"	=> $this->getOptionPosition(),
				"selected" 	=> isset($_REQUEST["position"])?$_REQUEST["position"]:"",	
			),
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
				"sortable" => true,
				"editable" => true
			),
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
				"field" => "title",
				"display" => "Tiêu đề",
				"sql" => "",
				"type" => "text",
				"sortable" => true,
				"editable" => true
			),

			array(
				"field" => "create_date",
				"display" => "Ngày tạo",
				"sql" => "",
				"type" => "text",
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
				"field" => "target",
				"display" => "Target",
				"sql" => "",
				"type" => "select",
				"option" => $this->getOptionTarget(),
				"sortable" => true,
				"editable" => true
			),
		);
	
		$this->datagrid->display($table, $this->arr_cols, $this->arr_filter, $this->submit_url, $this->arr_action, $this->arr_check, $this->action_width, false);		
	}
	
		
}
?>