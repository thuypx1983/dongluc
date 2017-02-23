<?php
class box_right extends base
{
	function run($task, $param="")
	{
		$this->table_news = "news";
		$this->table_category = "news_category";
		$this->table_album = "gallery_album";
		$this->table_photo = "gallery_photo";
		$this->table_video = "gallery_video";
		
		$this->where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre = "";
		
		switch($task)
		{
			default: case "showBox": 
				$this->showBox(); 
				break;
		}
		
	}
	
	
	function showBox()
	{
		$has_box_gallery = 1;
		if (!isset($_GET['cate']) && $_GET['mod']=='news' && $_GET['task']=='list')
		{
			$this->smarty->assign("has_box_parent", 1);
		}
		
		$limit = 4;
		if ($_GET['mod'] == 'album_photo' || $_GET['mod'] == 'album_video') {
			$limit = 6;
			$has_box_gallery = 0;
		}
		
		$where = " WHERE 1 = 1 AND is_active = 1 ";
		
		if ($_GET['menu_type'] != '') {
			$where .= " AND menu_type = '{$_GET['menu_type']}' ";
		}
		
		if ($_GET['cate'] != '' && $_GET['id'] != '' && $_GET['mod']=='news') {
			$where .= " AND news_category_id = '{$_GET['id']}' ";
		}
		if ($_GET['nid'] != '' && $_GET['mod']=='news') {
			$news_category_id = $this->db->getOne("SELECT news_category_id FROM {$this->table_news} WHERE id = '{$_GET['nid']}' ");
			
			$where .= " AND news_category_id = '{$news_category_id}' ";
		}
		
		$sql = "SELECT * FROM {$this->table_news} {$where} ORDER BY luotview DESC, id DESC LIMIT $limit";
		#echo $sql;
		$row_boxs = $this->db->getAll($sql);
		
		echo mysql_error();
		
		$this->smarty->assign("row_boxs", $row_boxs);
		
		$this->smarty->assign("has_box_gallery", $has_box_gallery);
		$this->smarty->display("box_right.tpl");
	}
	
}
?>