<?php
class menu extends base
{
	function run($task, $param="")
	{
		$this->table = "menu_quick";
		$this->table_type = "type";
		$this->table_category = "news_category";
		$this->where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->order = " ORDER BY z_index DESC, create_date DESC ";
		$this->pre = "";
		
		switch($task)
		{
			case "menu_home": 
				$this->menu_home(); 
				break;
			default: case "menu_hoz": 
				$this->menu_hoz($param); 
				break;
		}
		
	}
	
	function menu_home()
	{
		$menu_fix = 'du-hoc-nhat-ban';
		$rows = $this->db->getAll("SELECT id, title, link, concat('{$menu_fix}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$menu_fix}' ORDER BY z_index DESC");
		#echo "<pre>";print_r($rows);echo "</pre>";
		$this->smarty->assign("rows", $rows);
		$this->smarty->display('menu_home.tpl');
	}
		
	function menu_hoz($param="")
	{
		if ($_GET['mod'] == 'album_photo' || $_GET['mod'] == 'album_video')
		{
			#$_GET['menu_type'] = '#';
		}
		if ($_GET['mod'] == 'contact')
		{
			$_GET['menu_type'] = SITE_URL . 'lien-he.html';
		}
		if ($_GET['mod'] == '')
		{
			$_GET['menu_type'] = SITE_URL;
		}
		if ($_GET['mod'] == 'news' && $_GET['task'] == 'detail' && $_GET['nid'] != '')
		{
			$_GET['menu_type'] = $this->db->getOne("SELECT menu_type FROM news WHERE id = '{$_GET['nid']}' ");
		}
		$order = " ORDER BY z_index DESC ";
		// lay type
		$menu1 = $this->db->getAll("SELECT id, title, title_jp, link_to FROM {$this->table} ORDER BY id DESC LIMIT 1");
		$menu2 = $this->db->getAll("SELECT id, title, title_jp, link_to FROM {$this->table} ORDER BY id DESC LIMIT 1, 2");
		$menu2[0]['link_to'] = '#';
		$menu2[0]['sub'] = array(
			array(
				'title' => 'Thư viện ảnh',
				'link_to' => SITE_URL . 'photo/',
			),
			array(
				'title' => 'Thư viện video',
				'link_to' => SITE_URL . 'video/',
			)
		);
		$menu2[1]['link_to'] = SITE_URL . 'lien-he.html';
		
		/*
		$menu1[0]['link_to'] = SITE_URL;
		
		$menu1[1]['link_to'] = $this->db->getOne("SELECT concat('".SITE_URL."', link, '.html') AS link_to FROM about WHERE id = 1");
		$menu1[1]['sub'] = $this->db->getAll("SELECT title, concat('".SITE_URL."', link, '.html') AS link_to FROM about WHERE id > 1");
		*/
		#echo '<pre>'; print_r($menu1); echo '</pre>';
		
		
		$rows = $this->db->getAll("SELECT id, title, title_jp, link FROM {$this->table_type} {$this->where} AND is_menu = 1 ORDER BY z_index DESC");
		foreach ($rows as $k=>$v) {
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$v['link']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = 0 AND menu_type = '{$v['link']}' $order ");
		}
		
		#echo '<pre>'; print_r($rows); echo '</pre>';
		
		/* ghep menu */
		$rows = array_merge($menu1, $rows);
		$rows = array_merge($rows, $menu2);
		#echo '<pre>'; print_r($rows); echo '</pre>';
		$this->smarty->assign("menu_hoz", $rows);
		if ($param=="resonsive") {
			$this->smarty->display("menu_responsive.tpl");
		} else {
			$this->smarty->display("menu_quick.tpl");
		}
		
		return;
		// lay product_type (bai chuyen muc)
		foreach($rows as $k=>$v) {
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$v['link']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$v['link']}' $order ");
			foreach($rows[$k]['sub'] as $k1=>$v1) {
				/*$rows[$k]['sub'][$k1]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$v['link']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$v['link']}' AND parent_id = '{$v1['id']}' $order ");*/
				/*foreach($rows[$k]['sub'][$k1]['sub'] as $k2=>$v2) {
					$rows[$k]['sub'][$k1]['sub'][$k2]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$_GET['menu_type']}' AND parent_id = '{$v2['id']}' $order ");
					foreach($rows[$k]['sub'][$k1]['sub'][$k2]['sub'] as $k3=>$v3) {
						
							$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND menu_type = '{$_GET['menu_type']}' AND parent_id = '{$v3['id']}' $order ");
							
						
					}
				}*/
			}
		}
		//echo"<div style='background:#ffc;'><pre>";print_r($menu_hoz);echo"</pre></div>";
		echo mysql_error();
		$this->smarty->assign("menu_hoz", $rows);
		$this->smarty->display("menu_hoz.tpl");
	}
	
	function getPageinfo($task="")
	{	
		$page= array("");
		switch($task)
		{
			case "list":
				$row = $this->db->getRow("select title, description, seo_title, seo_description, seo_keyword, parent_id from product_type where id='{$_GET['id']}' ");				
				/*if($row["parent_id"]>0) {
					$temp = $this->db->getRow("SELECT title, text_menu FROM product_type WHERE id = '{$row['parent_id']}' ");
					$row["title_parent"] = $temp["title"];
					$row["text_menu_parent"] = $temp["text_menu"];
				}*/
				break;
			case "detail":
				$row = $this->db->getRow("select title, description, seo_title, seo_description, seo_keyword from product where id='{$_GET['pid']}' ");
				break;
			case "menu_home":
				$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from type where link='{$_GET['menu_type']}' ");
				break;
			case "book":
				if ($_GET["id"]!="")
				{
					$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from {$this->table_group} where id='{$_GET['id']}' ");
				}
				else
				{
					$row["title"] = "Mua hàng trực tuyến";
					$row["description"] = "Mua hàng trực tuyến";
					$row["keyword"] = "Mua hàng trực tuyến";
				}
				break;
			case "book_detail":
				if ($_GET["bid"]!="")
				{
					$row = $this->db->getRow("select title, seo_title, seo_description, seo_keyword from product where id='{$_GET['bid']}' ");
				}
				break;	
			case "cart_view":
				$row["title"] = "Giỏ hàng";
				$row["description"] = "Giỏ hàng";
				$row["keyword"] = "Giỏ hàng";
				break;
		}
		
		if($strip=='') {
			$strip = strip_tags($row['seo_description']!=""?$row['seo_description']:$row['description']);
			$strip = trim(substr($strip, 0, 170))."...";
		}
		$page["title"] = ($row["seo_title"]!='')?$row["seo_title"]:$row["title"];
		$page["title"] = stripslashes($page["title"]);
		if($row["parent_id"]>0) {
			$page["title"] = ($row["text_menu_parent"]!='')?$row["text_menu_parent"]." ".$page["title"]:$row["title_parent"]." ".$page["title"];	
		}
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