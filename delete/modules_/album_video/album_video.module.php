<?php
class album_video extends base
{
	function run($task, $param="")
	{
		$this->table = "gallery_album";
		$this->table_video = "gallery_video";
		$this->where = " WHERE 1 = 1 AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre_link = 'video';
		
		switch($task)
		{
			case "detail":
				$this->video_detail();
				break;
			case "list":
				$this->video_list();
				break;
			case "home":
				$this->video_home();
				break;
			case "right":
				$this->video_right();
				break;
			case "page":
				$this->video_page($param);
				break;	
			default: case "album_home": 
				$this->album_home(); 
				break;
		}
		
	}
	
	function video_detail()
	{
		#$where = " AND album_type = 1 ";
		/*$row = $this->db->getRow("SELECT * FROM gallery_album WHERE id = '{$_GET['id']}' ");*/
		// lay thong tin album
		$sql = "
			SELECT *
			FROM {$this->table_video} 
			{$this->where} $where AND id = '{$_GET['id']}'
		";
		
		$row = $this->db->getRow($sql);
		#echo "<pre>";print_r($row);echo "</pre>";
		$row["pre_link"] = $this->pre_link."/".$row["link"];
		$this->smarty->assign("row", $row);
		
		// album khac
		$sql = "SELECT *, concat('{$this->pre_link}', '/', link) AS pre_link FROM {$this->table_video} {$this->where} $where AND id != '{$_GET['id']}' {$this->order} ";
		
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
		$this->smarty->display("video_detail.tpl");
	}
	
	function video_list()
	{
		#$where = " AND album_type = 1 ";
		$page = isset($_GET['page'])?$_GET['page']:1;

		$limit = 12;

		$start = $limit*($page-1);			
		$sql = "
				SELECT 
					*, concat('{$this->pre_link}', '/', link) as pre_link
				FROM {$this->table_video}
				{$this->where} {$where}
				{$this->order}
				LIMIT $start, $limit
			";
		$rows = $this->db->getAll($sql);
		echo mysql_error();
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
		
		$this->smarty->display("video_list.tpl");
	}
	
	function video_page($param="")
	{
		$ex = @explode("|", $param);
		$temp = $ex[0];
		$news_category_id = $ex[1];
		
		$where = "";
		if ($news_category_id > 0)
		{
			$where .= " AND news_category_id = {$news_category_id} ";
		}
		
		$sql = "
			SELECT *
			FROM {$this->table_video} 
			{$this->where} {$where} ORDER BY z_index DESC, id DESC
		";
		
		$row = $this->db->getRow($sql);
		#echo "<pre>";print_r($row);echo "</pre>";
		$row["pre_link"] = $this->pre_link."/".$row["link"];
		$this->smarty->assign("row", $row);
		
		if ($temp == "duhoc") 
			$temp = "home";
		$this->smarty->display("video_".$temp.".tpl");
	}
	
	function video_home()
	{
		$sql = "
			SELECT *
			FROM {$this->table_video} 
			{$this->where} ORDER BY id DESC
		";
		
		$row = $this->db->getRow($sql);
		#echo "<pre>";print_r($row);echo "</pre>";
		$row["pre_link"] = $this->pre_link."/".$row["link"];
		$this->smarty->assign("row", $row);
		
		$this->smarty->display("video_home.tpl");
	}
	
	function video_right()
	{
		$rows = $this->db->getAll("SELECT photo, id, link FROM {$this->table_video} {$this->where} ORDER BY id DESC LIMIT 8");
		foreach ($rows as $k => $v) {
			$rows[$k]['link'] = "video/" . $v['link'];
		}
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("video_right.tpl");
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				$row["title"] = "Thư viện video";
				$row["description"] = "Thư viện video";
				$row["keyword"] = "Thư viện video";
				break;
			case "detail":
				$row = $this->db->getRow("SELECT * FROM gallery_video WHERE id = '{$_GET['id']}' ");
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