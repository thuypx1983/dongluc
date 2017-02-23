<?php
class header extends base
{
	function run($task)
	{
		// lookUp Lang
		$this->lookUpLang();
		
		$menu_type = $this->db->getAssoc("SELECT link, title FROM type WHERE lang = '{$_SESSION['lang']}'");
		$this->smarty->assign("menu_type", $menu_type);
		
		// lay language
		$langs = $this->db->getAll("SELECT * FROM lang WHERE is_active = 1 ORDER BY is_default DESC ");
		$this->smarty->assign("langs", $langs);
		$this->smarty->assign("search_link", ($_SESSION["lang"]=="vi")?"tim-kiem":"search");
		$this->smarty->display("header.tpl");
	}
	
	function lookUpLang() {
		if($_GET["menu_type"]!='') {
			$row = $this->db->getRow("SELECT lang FROM type WHERE link = '{$_GET['menu_type']}' ");
			if($row["lang"]!=$_SESSION["lang"])
				$_SESSION["lang"] = $row["lang"];
		}
	}
}

?>