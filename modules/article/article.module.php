<?php
class article extends base
{
	var $pre = "gioi-thieu";
	
	function home() {
		$this->detail();
	}
    function detail()
	{	
		$row = $this->db->getRow("select * from article where link = '{$_GET['link']}' ");
		$this->smarty->assign("row", $row);
        $this->smarty->display("article.tpl");
	}
	function menu() {
		$rows = $this->db->getAll("select * from article where is_active = 1 order by z_index desc");
		
		$this->smarty->assign("rows", $rows);
        $this->smarty->display("menu.tpl");
	}
	function getPageinfo($task="") {
		$row= $this->db->getRow("select * from article where link='{$_GET['link']}' ");
		
		$title = ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["title"]= $title;
		$page["description"]= $title;
		$page["keyword"]= $title;
		
		return $page;
	}
}

?>