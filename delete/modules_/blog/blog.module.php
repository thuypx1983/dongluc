<?php
class blog extends base
{
	var $table = "blog";
	var $table_cate= "blog_category";
	
	function run($task, $param="")
	{
		$this->table= "blog";
		$this->table_cate= "blog_category";
		
		/*thay đổi link*/
		$this->pre = "blog";
		
		$this->where= " where is_active = 1 ";
		
		switch($task)
		{
			case "sub_menu": 
				$this->sub_menu($param); 
				break;
			case "list_top": 
				$this->list_top(); 
				break;
			case "list_new"; 
				$this->list_new(); 
				break;	
			case "detail": 
				$this->detail(); 
				break;
			case "category": 
				$this->category(); 
				break;
			default: case "list": 
				$this->showList(); 
				break;
		}
	}
	
	function sub_menu($param) {
		$rows = $this->db->getAll("select id, title, link from {$this->table_cate} where news_type_link = '{$param}' order by z_index");
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->assign("root_link", $param);
		
		$this->smarty->display('sub_menu.tpl');
	}
	
	function list_home() {
		
		$sql = "select id, title, photo, link, description, news_category_id
					 from {$this->table}
					 where is_active = 1 
					 and news_category_id = (select id from {$this->table_cate} where link like '%khuyen-mai%' limit 1)
					 order by z_index desc
					 limit 5
				";
		$rows = $this->db->getAll($sql);
		
		foreach($rows as $k=>$v) {
			$rows[$k]['parent_link'] = $this->db->getOne("select link from {$this->table_cate} where id = {$v['news_category_id']}");
		}
		
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->assign("root_link", $this->link);
		$this->smarty->display('list_home.tpl');
	}
	
	function detail() {
		
		$sql = "
					select id, content, title, 
					create_date, description, photo, seo_photo_alt, news_category_id,
					concat('{$this->pre}', '/', link) as pre_link
					from {$this->table} where link = '{$_GET['link']}'
				";
				
		$row = $this->db->getRow($sql);
		$this->smarty->assign("row", $row);
		
		
		/*lấy ra bài viết liên quan*/
		
		$sql = "
				select id, title, link, create_date,
				concat('{$this->pre}', '/', link) as pre_link
				from {$this->table}
				where id != {$row['id']}
				and news_category_id = {$row['news_category_id']}
				order by create_date desc
				limit 6
			";
		
		$rows = $this->db->getAll($sql);
		echo mysql_error();
		$this->smarty->assign("rows", $rows);
				
		$this->smarty->display("_detail.tpl");
	}
	
	function category() {
		
		$rows = $this->db->getAll("select id, title, concat('{$this->pre}', '/', link) as pre_link, link from {$this->table_cate} where is_active = 1 order by z_index");
		
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->display("category.tpl");
	}
	function list_new() {
		
		$sql = "
				select id, title, photo, link, create_date,
				concat('{$this->pre}', '/', link) as pre_link
				from {$this->table}
				order by create_date desc
				limit 6
			";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->display("list_new.tpl");
	}
	function list_top() {
		
		$sql = "
				select id, title, photo, link, create_date,
				concat('{$this->pre}', '/', link) as pre_link
				from {$this->table}
				where is_top = 1
				order by create_date desc
				limit 6
			";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		
		$this->smarty->display("list_top.tpl");
	}
	function showList()
	{	
		$where = " where is_active = 1 ";
		
		if($_GET['category']!='') {
			$where .= " and news_category_id = (select id from {$this->table_cate} where link = '{$_GET['category']}') ";
			$cate = "/".$_GET['category'];
			
		}
		/* phuc vu cho paging */
		
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 2;
		$start = $limit*($page-1);
		
		/** phuc vu cho paging **/			
			
		$sql = "
				select id, title, photo, link, seo_photo_alt, create_date,
				description, news_category_id,
				concat('{$this->pre}', '/', link) as pre_link
				from {$this->table} 
				$where
				order by create_date desc
				limit $start, $limit
			";

		$rows = $this->db->getAll($sql);
		
		/*
		foreach($rows as $k=>$v) {	
			$rows[$k]['parent_link'] = $this->db->getOne("select link from {$this->table_cate} where id = {$v['news_category_id']} order by id asc ");
		}*/
		
		$this->smarty->assign("rows", $rows);
		
		$action_path = SITE_URL.$this->pre.$cate."/trang-{i}";
		
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} $where ");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);
		
		if($numrows>$limit)
			$this->smarty->assign("paging", $oPaging->string_paging());
		echo mysql_error();
		
		$this->smarty->display("_showList.tpl");
		
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				
				$category_title = $this->db->getOne("select title from {$this->table_cate} where link = '{$_GET['category']}'");
				
				$this->smarty->assign("category_title", $category_title);
			
				if($_GET['category']!='') {
					$row = $this->db->getRow("select title from {$this->table_cate} where link = '{$_GET['category']}'");
					
				} else {
					$temp = "news";
					$row = array(
						"title" => $this->smarty->getConfigVariable($temp."_title"),
						"description" => $this->smarty->getConfigVariable($temp."_description"),
						"keyword" => $this->smarty->getConfigVariable($temp."_keyword")
					);
				}
				
				break;
			case "detail": 
			
				$category_title = $this->db->getOne("select title from {$this->table_cate} where id = (select news_category_id from news where link = '{$_GET['link']}' limit 1)");
				$this->smarty->assign("category_title", $category_title);
				
				if($_GET['url']!='') {
					$row = $this->db->getRow("select * from site where url = '{$_GET['url']}'");
				} else {
					$row = $this->db->getRow("select * from {$this->table} where link = '{$_GET['link']}'");	
				}
				
				break;
		}
		
		$strip = $row['seo_description'];
		if($strip=='') {
			$strip = strip_tags($row['description']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		
		$page["title"]= ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["description"]= $strip;
		$page["keyword"]= $row["seo_keyword"];
		
		if($_GET['page']>0) {
			$page["title"] .= " - Trang ".$_GET['page'];
		}
		return $page;
	}
}

?>