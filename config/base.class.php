<?php
class base
{
	var $datagrid;
	var $smarty;
	var $db;
	var $form;
	var $table;
	var $arr_action;
	var $arr_check;
	var $submit_url;
	var $debug;
	var $action_width;
	var $paging;
	var $mail;
	
	function thumbSave_simple($src, $desc, $width=2000, $height=2000, $forcesize='n')
	{
		include_once 'lib/SimpleImage/SimpleImage.class.php';
		$image = new SimpleImage();
		$image->load($src);
		$image->resizeToWidth($width);
		$image->save($desc);
	}
	
	function thumbSave($src, $desc, $width=1000, $height=1000, $watermark="images/watermark.png", $valign='BOTTOM', $align='RIGHT')
	{	
		$ext= end(explode(".", $desc));
		$ext= strtolower($ext);
		
		if($ext=="gif")
		{
			copy($src, $desc);
			
			return true;
		}

		if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="bmp")
		{
			$thumb = new Thumbnail($src);
			if($watermark!="")
				$thumb->img_watermark= $watermark;
			$thumb->img_watermark_Valing='BOTTOM';
			$thumb->img_watermark_Haling='RIGHT';
			$thumb->size($width, $height);
			//$thumb->size_width($width);				    // [OPTIONAL] set width for thumbnail, or
			//$thumb->size_height($height);				    // [OPTIONAL] set height for thumbnail, or
			$thumb->quality=100;
			$thumb->allow_enlarge=true;
			$thumb->process();
			$thumb->save($desc);
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function checkPermission()
	{

/*
		if($_GET["mod"]=="admin")
		{
			$sql= "select id from admin_menu where link <> '' AND INSTR('".$this->submit_url."', link)>0";
			$id = $this->db->getOne($sql);
			if(!in_array($id, $_SESSION["admin_permission"]) && $_GET["amod"]!="welcome")
			{
				echo "<p style='text-align: center; font-size: 20px; color: red; margin-top: 100px;'>".getLang("admin_account_nopermission")."</p>";
				exit();
			}
		}
*/
	}
	
	function __construct()
	{
		global $oSmarty, $oDb, $oDatagrid, $oForm, $oPaging, $mail;
		$this->datagrid= $oDatagrid;
		$this->smarty= $oSmarty;
		$this->db= $oDb;				
		$this->datagrid = $oDatagrid;
		$this->form = $oForm;
		$this->paging= $oPaging;
		$this->mail= $mail;
		
		$submit_url= $_SERVER['QUERY_STRING'];
		$pos= stripos($submit_url, "&msg");
		if($pos)
		{
			$submit_url = substr($submit_url, 0, $pos);
		}		
		$this->submit_url= "?".$submit_url;

		//$this->submit_url= "?mod=admin&amod={$_REQUEST['amod']}&atask={$_REQUEST['atask']}";

		$this->checkPermission();
				
		$this->arr_action= array(
			array(
				"task" => "add",
				"action" => "",
				"tooltip" => "Add record"		
			),
			
			array(
				"task" => "edit",
				"text" => "Edit",
				"icon" => "edit.png",
				"action" => "",
				"tooltip" => "Edit record"		
			),
			array(
				"task" => "delete",
				"text" => "Delete",
				"icon" => "delete.jpg",
				"confirm" => "Are you sure?",
				"action" => "",
				"tooltip" => "Delete record"		
			)
			
		);
		
		$this->arr_check = array(
			array(
				"task" => "multi_delete",
				"display" => "Xóa bản ghi đã chọn"
			)
		);
		
		$this->lang_convert = array(
			"vi" => "en",
			"en" => "vi"
		);
		
		$this->action_width= 50;
		$this->debug= false;
				
	}
	
	function setRootPath($root_path)
	{ 
		if(!isset($_GET["ajax"]))
		{
			if($root_path=="")
				$this->root_path= getLang("manage")." > ".ucwords(str_ireplace("_", " ", $this->table));
			elseif($root_path=="_menu_")
			{
				$sql= "select id from admin_menu where link <> '' AND INSTR('".$this->submit_url."', link)>0";
				$id = $this->db->getOne($sql);
				
				$parent_title= $this->db->getOne("select title from admin_menu where id= (select parent_id from admin_menu where id='$id')");
				
				$title= $this->db->getOne("select title from admin_menu where id= '$id'");
				$this->root_path= $parent_title." > ".$title;
			}
			else
				$this->root_path= $root_path;
			
			$this->smarty->assign("rootpath", $root_path);
			
			//set_root_path($this->root_path);
		}
	}
	
	function run($task="", $param="")
	{	
		if(method_exists($this, $task))
		{
			$this->$task($param);
		}
		else
		{	
			
			switch ($task)
			{			
				case "ajaxSave":
					$this->ajaxSave();
					break;
				case "edit": 
					$this->edit();
					break;
				case "delete":
					$this->delete();
					break;
				case "multi_delete":
					$this->deleteMulti();
					break;	
				case "multi_duplicate":
					$this->duplicateMulti();
					break;						
				case "add":
					$this->add();
					break;
				case "switch_lang":
					$this->switch_lang();
					break;
				
				default:
					//$this->table= "(select * from ".$this->table." where lang_id=".$_SESSION["lang"].") as _".$this->table;
					if(SECTION=='')
						$this->home();
					else if(SECTION=='admin/')
						$this->grid();
			}
		}
		
	}
	
	function duplicateMulti() {
		
		$lang = $this->lang_convert[$_SESSION["lang"]];
		
		asort($_GET["arr_check"]);
		foreach($_GET["arr_check"] as $k=>$id) {
			$flag = 0;
			$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id = '{$id}' ");
			if($row["lang_id"]>0) {
				$arr = $this->db->getRow("SELECT id FROM {$this->table} WHERE lang_id = '{$row['lang_id']}' AND lang = '{$lang}' ");
				if(count($arr)>0) {
					$flag = 1;
				}
			}
			if($flag==0) {
				$row["id"] = "";
				$row["title"] = $id."-".$lang." ".$row["title"];
				$row["link"] = "";
				$row["lang"] = $lang;
				$row["lang_id"] = $id;
				
				$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
				$this->db->query("UPDATE {$this->table} SET lang_id = '{$id}' WHERE id = '{$id}' ");
			}	
		}
		$_SESSION["lang"] = $lang;
		$this->redirect("copy");
	}
	
	function switch_lang() {
		// chuyển hướng về grid với $re_filter
		$re_id = $_GET['id'];
		$filter_field = $_GET["filter_default"]!=''?$_GET["filter_default"]:'id';
		
		if($filter_field!='id')
			$filter_value = $this->db->getOne("SELECT $filter_field FROM {$this->table} WHERE id = $re_id ");
		else
			$filter_value = $re_id;
		
		if($_SESSION["lang"]!=$_GET["swlang"]) {
			$flag = 0;
			if($_GET["lang_id"]>0) {
				$arr = $this->db->getRow("SELECT id, $filter_field FROM {$this->table} WHERE lang_id = '{$_GET['lang_id']}' AND lang = '{$_GET['swlang']}' ");
				if(count($arr)>0) {
					$re_id = $arr["id"];
					$filter_value = $arr[$filter_field];
					$flag = 1;
				}
			}
			if($flag==0) {
				$row = $this->db->getRow("select * from {$this->table} where id = '{$_GET['id']}'");
				$row["id"] = "";
				$row["title"] = $_GET["id"]."-".$_GET["swlang"]." ".$row["title"];
				$row["link"] = "";
				$row["lang"] = $_GET["swlang"];
				$row["lang_id"] = $_GET["id"];
				
				$this->db->autoExecute($this->table, $row, DB_AUTOQUERY_INSERT);
				$re_id = mysql_insert_id();
				
				$filter_value = $row[$filter_field];
				
				$this->db->query("UPDATE {$this->table} SET lang_id = '{$_GET['id']}' WHERE id = '{$_GET['id']}' ");
			}
		}
		if($filter_value != $re_id)
			$str = "&".$filter_field."=".$filter_value;
		header("Location: admin.php?mod=".$_GET["mod"]."&sub=".$_GET["sub"]."&id=".$re_id.$str."&slang=".$_GET["swlang"]);
	}
	
	function ajaxSave()
	{
		$sql= "update {$this->table} set {$_REQUEST['field']} = '{$_REQUEST['value']}' where id= '{$_REQUEST['id']}'";
		$this->db->query($sql);		
		echo mysql_error();
	}
	
	function msg($text)
	{
		echo "<div style='margin: 10px; color: red; text-align: center;'>".$text."</div>";
	}
	
	function redirect($task)
	{
		redirect($_SESSION["grid_url"]."&msg={$task}", 0);
	}
	
	function delete()
	{		
		$this->db->query("delete from ".$this->table." where id='".$_GET["id"]."'");
		/*$this->msg("Xóa thành công");*/
		$this->redirect(2);
	}
	
	function deleteMulti()
	{
		$this->db->query("delete from ".$this->table." where id in ('".implode("','", $_GET["arr_check"])."')");

		/*$this->msg("Xóa thành công");*/
		$this->redirect(2);
	}

	function getEXT($filename="")
	{
		return end(explode(".", $filename));
	}
	
	function unlinkPhoto( $imagePath,$sImage )
	{
		if( $sImage )
		{
			if(is_file($imagePath.$sImage))
				@unlink($imagePath.$sImage);
			if(is_file($imagePath."thumb/".$sImage))
				@unlink($imagePath."thumb/".$sImage);
		}
	}
	
	function cropImage ($path='', $filename='', $size = array('width'=>640, 'height'=>480), $des='')
	{
	
		include("lib/image/imageTransform.php");
		$imageTransform= new imageTransform();
		
		list($img_w, $img_h) = getimagesize($path.$filename);	
			
		if( ($img_w>$size['width']) || ($img_h>$size['height']) )
		{
			$imageTransform->crop($path.$filename, $size['width'], $size['height'], ($des!='')?$des:$path.$filename);						
		}		
		
	}

	function uploadPhoto ($namePhoto='photo', $size = array('width'=>300, 'height'=>225))
	{
	
		include("lib/image/imageTransform.php");
		$imageTransform= new imageTransform();
		$filename = mktime() . $_FILES[$namePhoto]['name'];
	
		move_uploaded_file($_FILES[$namePhoto]['tmp_name'], $this->imagePath.$filename);
		list($img_w, $img_h) = getimagesize($this->imagePath.$filename);
	
		if( ($img_w>$size['width']) || ($img_h>$size['height']) )
		{
			$imageTransform->crop($this->imagePath.$filename, $size['width'], $size['height'], $this->imagePath."$filename");						
		}
				
		return $filename;
	}
	
}
?>