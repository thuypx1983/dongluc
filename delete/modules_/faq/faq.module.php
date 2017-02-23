<?php
class faq extends base
{
	var $pre = "hoi-dap";
	var $table = "faq";
	var $table_category= "faq_category";
	
	function home() {
		$this->detail();
	}
	
	function category()
	{
		$sql = "
			SELECT id, title, concat('{$this->pre}', '/', link) as pre_link					 
			FROM {$this->table_category}
			WHERE lang = '{$_SESSION['lang']}' AND is_active = 1
			ORDER BY z_index DESC
		";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("category.tpl");
	}
		
    function detail()
	{	
		$where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		if ($_GET['id']!='')
		{
			$where .= " AND faq_category_id = '{$_GET['id']}' ";
			$cateinfo = $this->db->getRow("SELECT id, title, link, concat('{$this->pre}', '/', link) as pre_link FROM {$this->table_category} WHERE id = '{$_GET['id']}' ");
			$cate_link = "/".$cateinfo["link"]."-".$cateinfo["id"];
			
			$this->smarty->assign("cateinfo", $cateinfo);
		}
		// phuc vu cho paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 10;
		$start = $limit*($page-1);
			
		$sql = "
			SELECT *
			FROM {$this->table} 
			$where 
			ORDER BY z_index DESC
			LIMIT $start, $limit
		";
		$rows = $this->db->getAll($sql);
		echo mysql_error();
		foreach ($rows as $k=>$v)
		{
			$rows[$k]["title"] = stripslashes($v["title"]);
		}
		
		$text_link_page = ($_SESSION["lang"]=="vi")?"trang":"page";
		$action_path = SITE_URL.$this->pre.$cate_link."/{$text_link_page}-{i}/";
		
		$numrows=$this->db->getOne("SELECT count(id) FROM {$this->table} $where ");
		$oPaging=new Paging($numrows, $limit,Null, "page");		
		$oPaging->set_current_page($page);
		$oPaging->set_action_path($action_path);
		$oPaging->set_site_url(SITE_URL);
		
		if($numrows>$limit) {
			$this->smarty->assign("paging", $oPaging->string_paging());
		}
		$this->smarty->assign("numrows", $numrows);
		$this->smarty->assign("faq", $rows);
        $this->smarty->display("faq.tpl");
	}
	
	function getPageinfo($task="") {
		
		if($_GET['id']!='') {
			$row = $this->db->getRow("select * from {$this->table_category} where id = '{$_GET['id']}'");		
		} else {
			$row["title"] = "Hỏi đáp";
		}
		$page["title"]= $row["title"];
		$page["description"]= $row["title"];
		$page["keyword"]= $row["title"];
		
		$text_link_page = ($_SESSION["lang"]=="vi")?"Trang":"Page";
		if($_GET['page']>0) {
			$page["title"] .= " - ".$text_link_page." ".$_GET['page'];
		}
		
		return $page;
	}
}

?>