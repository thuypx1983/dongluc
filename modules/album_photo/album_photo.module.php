<?php
class album_photo extends base
{
	function run($task, $param="")
	{
		$this->table = "gallery_album";
		$this->table_photo = "gallery_photo";
		$this->table_video = "gallery_video";
		$this->where = " WHERE 1 = 1 AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre_link = 'photo';
		
		switch($task)
		{
			case "detail":
				$this->album_detail();
				break;
			case "list":
				$this->album_list();
				break;
			case "home":
				$this->album_home($param);
				break;
			case "right":
				$this->album_right();
				break;	
			case "page":
				$this->album_page($param);
				break;
			default: case "album_home": 
				$this->album_home($param); 
				break;
		}
		
	}
	
	function album_page($param="")
	{
		$ex = @explode("|", $param);
		$temp = $ex[0];
		$news_category_id = $ex[1];
		
		$where = "";
		if ($news_category_id > 0)
		{
			$where .= " AND news_category_id = {$news_category_id} ";
		}
		
		$album_info = $this->db->getRow("SELECT id, link FROM {$this->table} {$this->where} {$where} ORDER BY id DESC");
		
		if ($album_info['id'] > 0) {
			$rows = $this->db->getAll("SELECT photo FROM {$this->table_photo} {$this->where} AND album_id = {$album_info['id']} ORDER BY id DESC LIMIT 20");
		}
		
		$this->smarty->assign("rows", $rows);
		$this->smarty->assign("album_info", $album_info);
		
		$this->smarty->display("album_".$temp.".tpl");
		
	}
	
	function album_detail()
	{
		$where = " AND album_type = 0 ";
		/*$row = $this->db->getRow("SELECT * FROM gallery_album WHERE id = '{$_GET['id']}' ");*/
		// lay thong tin album
		$sql = "
			SELECT *
			FROM {$this->table} 
			{$this->where} $where AND id = '{$_GET['id']}'
		";
		$row = $this->db->getRow($sql);
		$row["pre_link"] = $this->pre_link."/".$row["link"];
		
		// lay thong tin photo trong album
		$sql = "
			SELECT *
			FROM {$this->table_photo}
			{$this->where} AND album_id = '{$row['id']}'
		";
		$row["album_photo"] = $this->db->getAll($sql);
		$this->smarty->assign("row", $row);
		
		// album khac
		$sql = "SELECT *, concat('{$this->pre_link}', '/', link) AS pre_link FROM {$this->table} {$this->where} $where AND id != '{$_GET['id']}' {$this->order} ";
		
		$rows = $this->db->getAll($sql);
		/*
		foreach ($rows as $k => $v)
		{
			$arr[] = $v;
			if (($k+1) % 2 == 0) {
				$new_rows[] = $arr;
				$arr = array();
			}
			// check last arr
			if (count($rows) == ($k+1) && count($arr) > 0) {
				$new_rows[] = $arr;
			}
		}
		$rows = $new_rows;*/
		$this->smarty->assign("rows", $rows);
		#echo"<pre>";print_r($rows);echo"</pre>";
		$this->smarty->display("album_detail.tpl");
	}
	
	function album_list()
	{
		$where = " AND album_type = 0 ";
		$page = isset($_GET['page'])?$_GET['page']:1;

		$limit = 12;

		$start = $limit*($page-1);			
		$sql = "
				SELECT 
					*, concat('{$this->pre_link}', '/', link) as pre_link
				FROM {$this->table}
				{$this->where} {$where}
				{$this->order}
				LIMIT $start, $limit
			";
		$rows = $this->db->getAll($sql);
		
		$this->smarty->assign("rows", $rows);
		$action_path = SITE_URL.$this->pre_link."/".$group.$keyword."trang-{i}/";
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where $condition");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}

		$this->smarty->assign("index_start", $limit * ($page - 1) + 1);
		$this->smarty->assign("numrows", $numrows);
		$this->smarty->assign("selfURL", selfURL());
		echo mysql_error();
		$this->smarty->assign("root_link", $this->pre);
		
		$this->smarty->display("album_list.tpl");
	}
	
	function album_home($is_home="")
	{
		$where = "";
		$order_by = " ORDER BY RAND() ";
		if ($is_home == 1)
		{
			$order_by = " ORDER BY id DESC ";
			
			$album_id = $this->db->getOne("SELECT id FROM {$this->table} WHERE is_home = 1 AND is_active = 1 ORDER BY id DESC ");
			$album_id = $album_id + 0;
			if ($album_id > 0)
				$where .= " AND album_id = {$album_id} ";
		}
		
		$rows = $this->db->getAll("SELECT photo, album_id FROM {$this->table_photo} {$this->where} {$where} {$order_by}  LIMIT 20");
		if (count($rows) > 0) {		
			foreach ($rows as $k => $v) {
				$album_info = $this->db->getRow("SELECT id, link FROM {$this->table} WHERE album_type = 0 AND id = '{$v['album_id']}' ");
				$rows[$k]['link'] = "photo/" . $album_info['link'];
				$rows[$k]['album_id'] = $album_info['id'];
			}
			#$rows = $this->db->getAll("SELECT id, title, photo, link, concat('{$this->pre_link}', '/', link) as pre_link FROM {$this->table_photo} {$this->where} ORDER BY id DESC ");
			
			$this->smarty->assign("rows", $rows);
		}
		if ($is_home == 1)
		{
			if (count($rows) > 0) {
			}
			$this->smarty->display("album_home_show.tpl");
		}
		else
		{
			$this->smarty->display("album_home.tpl");
		}
	}
	
	function album_right()
	{
		$rows = $this->db->getAll("SELECT photo, album_id FROM {$this->table_photo} {$this->where} ORDER BY id DESC LIMIT 8");
		foreach ($rows as $k => $v) {
			$album_info = $this->db->getRow("SELECT id, link FROM {$this->table} WHERE album_type = 0 AND id = '{$v['album_id']}' ");
			$rows[$k]['link'] = "photo/" . $album_info['link'];
			$rows[$k]['album_id'] = $album_info['id'];
		}
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("album_right.tpl");
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				$row["title"] = "Thư viện ảnh";
				$row["description"] = "Thư viện ảnh";
				$row["keyword"] = "Thư viện ảnh";
				break;
			case "detail":
				$row = $this->db->getRow("SELECT * FROM gallery_album WHERE id = '{$_GET['id']}' ");
				break;
		}
		
		if($strip=='') {
			$strip = strip_tags($row['seo_description']!=""?$row['seo_description']:$row['description']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		$page["title"] = ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["title"] = stripslashes($page["title"]);
		
		if($strip=="...")
			$strip = $page["title"];	
		$page["description"] = html_entity_decode($strip, ENT_QUOTES, "UTF-8");
		$page["keyword"]= ($row["seo_keyword"]!='')?$row["seo_keyword"]:$row["title"];	
		if($_GET['keyword']!='') {
			$page["title"] = $this->smarty->getConfigVariable("search_title");
		}	
		if($_GET['page']>0) {
			$page["title"] .= " - Trang ".$_GET['page'];
		}
		return $page;
	}
}
?>