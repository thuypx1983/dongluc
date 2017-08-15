<?php
class about extends base
{
	var $table = "about";
	function run($task, $param="")
	{
		$this->table = "about";
		$this->where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre = "gioi-thieu";
		switch($task) {
			case "home":
				$this->list_home(); 
				break;
			case "list":
				$this->lists(); 
				break;
			default:
				$this->detail(); 
				break;
		}
	}
	
	function list_home()
	{
		$sql = "
			SELECT
				id, title, photo, link
			FROM {$this->table}
			{$this->where} AND id > 1
			{$this->order} LIMIT 4
		";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		
        $this->smarty->display("list_home.tpl");
	}
	
	function lists()
	{

		$sql = "
			SELECT
				id, title, content, photo, create_date,
				concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where}
			{$this->order}
		";
		$rows = $this->db->getAll($sql);

		foreach ($rows as $k => $v) {
			$rows[$k]["description"] = truncateHtml(strip_tags($v["content"]), 450);
		}

		$this->smarty->assign("rows", $rows);
		
		$this->smarty->assign("root_link", $this->pre);
        $this->smarty->display("list_about.tpl");
	}
	
    function detail()
	{
		if($_GET['link']!='') 
			$where = " AND link = '{$_GET['link']}' ";
		$sql = "
			SELECT
				id, title, content, create_date,
				concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} $where
			{$this->order}
		";
		
		$about = $this->db->getRow($sql);
		$about["content"] = stripslashes($about["content"]);
		$about["content"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $about["content"]);

		#echo "<pre>";print_r($about); echo "</pre>";

		$this->smarty->assign("row", $about);


		$sql = "
			SELECT
				id, title, content, photo, create_date,
				concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} AND id != {$about['id']}
			{$this->order}
		";
		$rows = $this->db->getAll($sql);

		foreach ($rows as $k => $v) {
			$rows[$k]["description"] = truncateHtml(strip_tags($v["content"]), 450);
		}

		$this->smarty->assign("rows", $rows);

		
		$this->smarty->assign("root_link", $this->pre);
        $this->smarty->display("about.tpl");
	}
	
	function getPageinfo($task="") {

		$row = array('title' => 'Giới thiệu về '.SITE_ALIAS);
		if($_GET['link']!='') {
			$where = " AND link = '{$_GET['link']}' ";
			$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE lang='{$_SESSION['lang']}' $where ORDER BY z_index DESC, create_date DESC");
		}
		$strip = $row['seo_description'];
		if($strip=='') {
			$strip = strip_tags($row['content']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		$page["title"]       = ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["description"] = html_entity_decode($strip, ENT_QUOTES, "UTF-8");
		$page["keyword"]     = $row["seo_keyword"];
		
		return $page;
	}
}

?>