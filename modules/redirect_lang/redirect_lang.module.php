<?php
class redirect_lang extends base
{
	function home() {
		parse_str($_POST["query"], $query);
		$this->query = $query;
		$mod = $this->query["mod"];
		if(method_exists($this, $mod)) {
			$this->$mod();
		}
		//echo $_POST["query"];
	}
	
	function product() {
		switch($this->query["task"]) {
			case "menu_home":
				$row = $this->db->getRow("SELECT * FROM type WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM type WHERE link = '{$this->query['menu_type']}') ");
				if($row)
					echo SITE_URL.$row["link"]."/";
				else
					echo SITE_URL;
				break;
				
			case "list":
				$type = $this->db->getRow("SELECT * FROM type WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM type WHERE link = '{$this->query['menu_type']}') ");
				
				$row = $this->db->getRow("SELECT * FROM product_type WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM product_type WHERE id = '{$this->query['id']}') ");
				
				if($row)
					echo SITE_URL.$type["link"]."/".$row["link"]."-".$row["id"]."/";
				else
					echo SITE_URL.$type["link"]."/";
				break;
				
			case "detail":
				$type = $this->db->getRow("SELECT * FROM type WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM type WHERE link = '{$this->query['menu_type']}') ");
				
				$row = $this->db->getRow("SELECT * FROM product WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM product WHERE id = '{$this->query['pid']}') ");
				
				if($row)
					echo SITE_URL.$type["link"]."/".$row["link"]."-".$row["id"].".html";
				else
					echo SITE_URL.$type["link"]."/";
				break;	
		}
	}
	
	function contact() {
		$row = $this->db->getRow("SELECT * FROM contact WHERE lang = '{$_GET['slang']}' ");
		if($_GET['slang']=='en')
			echo SITE_URL."contact/";
		else
			echo SITE_URL."lien-he/";
	}
	
	function about() {
		if($this->query['link']!='') {
			$row = $this->db->getRow("SELECT * FROM about WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM about WHERE id = '{$this->query['id']}') ");
			if($row)
				$link = $row["link"]."-".$row["id"].".html";
		}
		if($_GET['slang']=='en')
			echo SITE_URL."about/".$link;
		else
			echo SITE_URL."gioi-thieu/".$link;
	}
	
	function news() {
		switch($this->query["task"]) {
			case "list":
				if($this->query['id']!='') {
					$row = $this->db->getRow("SELECT * FROM news_category WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM news_category WHERE id = '{$this->query['id']}') ");
					if($row)
						$link = $row["link"]."-".$row["id"]."/";
				}
				break;
			case "detail":
				if($this->query['nid']!='') {
					$row = $this->db->getRow("SELECT * FROM news WHERE lang = '{$_GET['slang']}' AND lang_id = (SELECT lang_id FROM news WHERE id = '{$this->query['nid']}') ");
					if($row)
						$link = $row["link"]."-".$row["id"].".html";
				}
				break;
		}
		if($_GET['slang']=='en')
			echo SITE_URL."news/".$link;
		else
			echo SITE_URL."tin-tuc/".$link;
	}
}

?>