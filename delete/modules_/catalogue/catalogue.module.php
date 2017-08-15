<?php
class catalogue extends base
{
	function run($task, $param="")
	{
		$this->table = "catalogue";
		$this->where = " WHERE 1 = 1 AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre_link = LINK_CATA;
		
		switch($task)
		{
			default: case "list": 
				$this->cata_list(); 
				break;
		}
		
	}
	
	function cata_list()
	{
		// tim kiem san pham
		if($_GET['keyword']!='') {
			$where .= " AND title LIKE '%{$_GET['keyword']}%' ";
			//$keyword = "tim-kiem/".str_replace(" ", "+", $_GET['keyword'])."/";
		}
		if($_GET['id']!='' && 1 == 2) {
			$where .= " AND product_group_id = '{$_GET['id']}' ";
			/*$where .= " AND product_type_id = (SELECT id FROM product_type WHERE id ='{$_GET['id']}' LIMIT 1 )  ";*/			
			/*$where .= " AND ( product_type_id = '{$_GET['id']}' OR product_type_id IN (SELECT id FROM product_type WHERE parent_id = '{$_GET['id']}' ) OR product_type_id IN (SELECT id FROM product_type WHERE parent_id IN (SELECT id FROM product_type where parent_id = '{$_GET['id']}' ) ) ) ";*/			
			$group = $_GET['group']."-".$_GET['id']."/";
		}	
		// phuc vu cho paging

		$page = isset($_GET['page'])?$_GET['page']:1;

		$limit = 6;

		$start = $limit*($page-1);			
		$sql = "
				SELECT 
					*, concat('{$this->pre}', '/', link) as pre_link
				FROM {$this->table}
				{$this->where}
				$condition
				{$this->order}
				LIMIT $start, $limit
			";
		$rows = $this->db->getAll($sql);
		
		$this->smarty->assign("rows", $rows);
		$action_path = SITE_URL.$this->pre_link."/".$group.$keyword."trang-{i}/";
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} $where $condition");
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
		$this->smarty->display("cata_list.tpl");
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				$row["title"] = "Catalogue";
				$row["description"] = "Catalogue";
				$row["keyword"] = "Catalogue";
				break;
			case "detail":
				$row = $this->db->getRow("SELECT * FROM catalogue WHERE id = '{$_GET['id']}' ");
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