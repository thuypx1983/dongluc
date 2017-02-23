<?php
class news extends base
{
	var $table = "news";
	var $table_category= "news_category";
	var $table_type= "type";
	
	function run($task, $param="")
	{
		if ($_SESSION['username'] == 'root')
		{
			#echo '<pre>'; print_r($_SERVER); echo '</pre>';
			#echo '<pre>'; print_r($_GET); echo '</pre>';
		}
		$this->table          = "news";
		$this->table_category = "news_category";
		$this->table_type     = "type";
		$this->where          = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->order          = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre            = "dich-vu";
		$this->search         = ($_SESSION["lang"]=="vi")?"tim-kiem":"search";
		switch($task)
		{
			case "detail": 
				$this->detail(); 
				break;
			case "list_top": 
				$this->list_top(); 
				break;

			default: case "list": 
				$this->showList(); 
				break;
		}
	}	
	
	
	function detail() {
		
		if (!isset($_SESSION['luotview']))
			$_SESSION['luotview'] = array();
		
		if (!in_array($_GET['nid'], $_SESSION['luotview'])) {
			$_SESSION['luotview'][] = $_GET['nid'];
			$this->db->query("UPDATE {$this->table} SET luotview = luotview + 1 WHERE id = '{$_GET['nid']}' ");
		}
	
		$sql = "
			SELECT *,
			concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} AND id = '{$_GET['nid']}'
		";
		$row = $this->db->getRow($sql);
		
		$row["content"] = stripslashes($row["content"]);	
		$row["title"] = stripslashes($row["title"]);
		$row["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $row["content"]);
		$this->smarty->assign("row", $row);

		$where = " AND id != '{$row['id']}' ";
		
		$sql = "
			SELECT id, title, concat('{$this->pre}', '/', link) as pre_link, photo, description
			FROM {$this->table}
			{$this->where} {$where} 
		";

		$arr1 = $this->db->getAll($sql . " AND id < {$row['id']} ORDER BY id DESC LIMIT 2");
		$arr2 = $this->db->getAll($sql . " AND id > {$row['id']} ORDER BY id ASC LIMIT 2");
		
		$c_arr1 = count($arr1);
		$c_arr2 = count($arr2);
		
		if ($c_arr1 < 2) {
			$arr2 = $this->db->getAll($sql . " AND id > {$row['id']} ORDER BY id ASC LIMIT " . (4-$c_arr1));	
		}
		
		if ($c_arr2 < 2) {
			$arr1 = $this->db->getAll($sql . " AND id < {$row['id']} ORDER BY id DESC LIMIT " . (4-$c_arr2));
		}
		krsort($arr1);
		$rows = array_merge($arr1, $arr2);
		
		#$rows = $this->db->getAll($sql);
		
		foreach($rows as $k=>$v) {
			$v["content"] = stripslashes($v["content"]);
			$rows[$k]["content"] = stripslashes($v["content"]);
			$rows[$k]["title"] = stripslashes($v["title"]);
			//$rows[$k]["photo"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $this->getSrcImg($v['content']));
		}
		#echo "<pre>";print_r($rows);echo "</pre>";
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->display("detail.tpl");
	}
	
	function list_top()
	{
		$rows = $this->db->getAll("
			SELECT id, concat('{$this->pre}', '/', link) as pre_link, title, photo FROM {$this->table}
			{$this->where} AND is_top = 1
			{$this->order}
			LIMIT 5
		");
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("list_top.tpl");
	}

	function showList()
	{
		// phuc vu cho paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 8;
		$start = $limit*($page-1);
			
		$sql = "
			SELECT *,
			concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} $where
			{$this->order}
			LIMIT $start, $limit
		";
		$rows = $this->db->getAll($sql);
		#echo "<pre>";print_r($rows);echo "</pre>";
		echo mysql_error();
		
		$this->smarty->assign("rows", $rows);
		
		$text_link_page = ($_SESSION["lang"]=="vi")?"trang":"page";
		
		$action_path = SITE_URL.$this->pre."/{$text_link_page}-{i}/";
		
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where ");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);
		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}
		$this->smarty->assign("numrows", $numrows);
		$this->smarty->display('showList.tpl');

		return;
		$title = $this->db->getOne("SELECT title FROM {$this->table_type} WHERE link = '{$_GET['menu_type']}' ");
		$this->smarty->assign("row_title", $title);
		
		$title_sub = $this->db->getOne("SELECT title FROM {$this->table_category} WHERE id = '{$_GET['id']}' ");
		$this->smarty->assign("row_title_sub", $title_sub);
		
		$where = " AND menu_type = '{$_GET['menu_type']}' ";
		$where .= " AND news_category_id = '{$_GET['id']}' ";
		
		$cateinfo = $this->db->getRow("SELECT id, title, link, page_template, concat('{$this->pre}', '/', link) as pre_link FROM {$this->table_category} WHERE id = '{$_GET['id']}' ");
		$cate_link = "/".$cateinfo["link"]."-".$cateinfo["id"];
		
		if ($cateinfo['page_template'] != '') {
			
			$this->page_template($cateinfo['page_template']);
			
			return;
		}
		
		// phuc vu cho paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 8;
		$start = $limit*($page-1);
			
		$sql = "
			SELECT *,
			concat(menu_type, '/', link) as pre_link
			FROM {$this->table} 
			{$this->where} $where
			{$this->order}
			LIMIT $start, $limit
		";
		$rows = $this->db->getAll($sql);
		#echo "<pre>";print_r($rows);echo "</pre>";
		echo mysql_error();
		
		foreach($rows as $k=>$v) {
			$rows[$k]["title"] = stripslashes($v["title"]);
			//$rows[$k]["content"] = stripslashes($v["content"]);
			//$rows[$k]["photo"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $this->getSrcImg($v['content']));
		}
		
		$this->smarty->assign("rows", $rows);
		
		$text_link_page = ($_SESSION["lang"]=="vi")?"trang":"page";
		
		$action_path = SITE_URL.$_GET['menu_type'].$cate_link.$search_link."/{$text_link_page}-{i}/";
		
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where ");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);
		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}
		$this->smarty->assign("numrows", $numrows);
		
		$this->smarty->display('showList.tpl');
		
	}

	function remove_slash($arrays)
	{
		foreach($arrays as $k=>$arr) {
			$arrays[$k]["title"] = stripslashes($arr["title"]);
		}
		return $arrays;
	}
	
	function getSrcImg($content) {
		$dom = new DOMDocument();	
		@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
	
		// get src of IMG tag first <img src="" />
		$tags = $dom->getElementsByTagName('img');
		foreach ($tags as $tag)	{
			return $tag->getAttribute('src');
			break;
		}
		return "";
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				if($_GET['id']!='') {
					$row = $this->db->getRow("select * from {$this->table_category} where id = '{$_GET['id']}'");
				} else {
					$row = array(
						'title'       => 'Dịch vụ', 
						'description' => 'Dịch vụ', 
						'keyword'     => 'Dịch vụ'
					);
				}
				break;	
			case "detail": 
				
				$info = $this->db->getRow("select title, link from {$this->table_category} where id = (select news_category_id from news where link = '{$_GET['link']}' limit 1)");
				
				$this->smarty->assign("info", $info);
				
				if($_GET['url']!='') {
					$row = $this->db->getRow("select * from site where url = '{$_GET['url']}'");
				} else {
					$row = $this->db->getRow("select * from {$this->table} where link = '{$_GET['link']}'");	
				}
				
				break;
		}
		
		$strip = $row['seo_description'];
		if($strip=='') {
			$strip = strip_tags($row['content']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		
		$page["title"]= ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["title"] = stripslashes($page["title"]);
		$page["description"] = html_entity_decode($strip, ENT_QUOTES, "UTF-8");
		$page["keyword"]= $row["seo_keyword"];
		$text_link_page = ($_SESSION["lang"]=="vi")?"Trang":"Page";
		if($_GET['page']>0) {
			$page["title"] .= " - ".$text_link_page." ".$_GET['page'];
		}
		return $page;
	}
}

?>