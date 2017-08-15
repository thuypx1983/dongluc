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
			case "category": 
				$this->category($param); 
				break;
			default: case "list": 
				$this->showList(); 
				break;
            default: case "highlight_left":
				$this->highlight_left();
				break;
            default: case "highlight_right":
				$this->highlight_right();
				break;
            default: case "news_block_sport":
				$this->news_block_sport();
				break;
            default: case "news_service":
				$this->news_service();
				break;
		}
	}	
	
	function category($param="")
	{
		
		$order = " ORDER BY z_index DESC ";
		$_GET['menu_type'] = 'dich-vu';
		/*menu 4 cap*/
		$rows = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = 0 $order ");
		if($_GET['pid']!='') {
			$_GET['id'] = $this->db->getOne("SELECT product_type_id FROM {$this->table} WHERE id = '{$_GET['pid']}'");
		}
		if($_GET['id']!='') {
			$temp[] = $_GET['id'];
			$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$_GET['id']}'");
			if($pid) {
				$temp[] = $pid;
				$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
				if($pid) {
					$temp[] = $pid;
					$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
					if($pid) {
						$temp[] = $pid;
						$pid = $this->db->getOne("SELECT parent_id FROM {$this->table_category} WHERE id = '{$pid}'");
						if($pid) {
							$temp[] = $pid;
						}	
					}	
				}	
			}
		}
		
		$temp = array_reverse($temp);
		
		foreach($rows as $k=>$v) {
			if($temp[0]==$v['id']) {
						
			}
			$rows[$k]['sub'] = $this->db->getAll("SELECT id, title, link, link_to, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			// mảng này để lấy trạng thái select ngoài category
			$rows[$k]['sub_ids'] = $this->db->getCol("SELECT id FROM {$this->table_category} {$this->where} AND parent_id = '{$v['id']}' $order ");
			foreach($rows[$k]['sub'] as $k1=>$v1) {
				if($temp[1]==$v1['id']) {
					
				}
				$rows[$k]['sub'][$k1]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v1['id']}' $order ");
				foreach($rows[$k]['sub'][$k1]['sub'] as $k2=>$v2) {
					if($temp[2]==$v2['id']) {
						$rows[$k]['sub'][$k1]['sub'][$k2]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v2['id']}' $order ");
						foreach($rows[$k]['sub'][$k1]['sub'][$k2]['sub'] as $k3=>$v3) {
							if($temp[3]==$v3['id']) {
								$rows[$k]['sub'][$k1]['sub'][$k2]['sub'][$k3]['sub'] = $this->db->getAll("SELECT id, title, link, concat('{$_GET['menu_type']}', '/', link) as pre_link FROM {$this->table_category} {$this->where} AND parent_id = '{$v3['id']}' $order ");
								
							}
						}
					}
				}
			}
		}
		#echo "<pre>";print_r($rows);echo"</pre>";
		$this->smarty->assign("rows", $rows);
		
		if ($param=="responsive") {
			$this->smarty->display("category_responsive.tpl");
		} else {
			$this->smarty->display("category.tpl");
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

		//bread
		$_GET['id'] = $row['news_category_id'];
		if($_GET['nid']!='') {
			$_GET['menu_type'] = 'dich-vu';
			$bread = array();
			$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$_GET['id']}' ");
			$bread[] = $temp;
			if($temp['parent_id']>0) {
				$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");
				$bread[] = $temp;
				if($temp['parent_id']>0) {
					$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");					
					$bread[] = $temp;
					if($temp['parent_id']>0) {
						$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} {$this->where} AND id = '{$temp['parent_id']}' ");					
						$bread[] = $temp;
					}
				}
			}
		}
		#echo '<pre>'; print_r($bread); echo '</pre>';
		$this->smarty->assign("bread", array_reverse($bread));

		// lấy bài liên quan
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
		if($_GET['id']!='') {
			$_GET['menu_type'] = 'dich-vu';
			// breadcrumb
			$bread = array();
			$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$_GET['id']}' ");
			$bread[] = $temp;
			if($temp['parent_id']>0) {
				$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
				$bread[] = $temp;
				if($temp['parent_id']>0) {
					$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
					$bread[] = $temp;
					if($temp['parent_id']>0) {
						$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
						$bread[] = $temp;
						if($temp['parent_id']>0) {
							$temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");					
							$bread[] = $temp;
						}
					}
				}
			}
			$this->smarty->assign("bread", array_reverse($bread));
			
		}
		
		$where = "";
		if($_GET['id']!='') {
			/*$where = " AND news_category_id = '{$_GET['id']}' ";*/			
			$where .= " AND ( news_category_id = '{$_GET['id']}' OR news_category_id IN (SELECT id FROM {$this->table_category} WHERE parent_id = '{$_GET['id']}' ) OR news_category_id IN (SELECT id FROM {$this->table_category} WHERE parent_id IN (SELECT id FROM {$this->table_category} where parent_id = '{$_GET['id']}' ) ) ) ";
			$category = $_GET['cate']."-".$_GET['id']."/";
		}else{
		$where.=" AND news_category_id!=18 ";
		}
		// phuc vu cho paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit = 8;
		$start = $limit*($page-1);
			
		$sql = "
			SELECT *,
			concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} $where
			ORDER BY `create_date` DESC
			LIMIT $start, $limit
		";
		$rows = $this->db->getAll($sql);
		#echo "<pre>";print_r($rows);echo "</pre>";
		echo mysql_error();
		$this->smarty->assign("rows", $rows);

		$text_link_page = ($_SESSION["lang"]=="vi")?"trang":"page";
		$action_path = SITE_URL.$this->pre.'/'.$category."{$text_link_page}-{i}/";
		
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

    ////////////////////////////////////////////
    //added by thuypx
    ////////////////////////////////////////////

    function highlight_left(){
        $rows = $this->db->getAll("
			SELECT id, concat('{$this->pre}', '/', link) as pre_link, title, photo,`description` FROM {$this->table}
			{$this->where} AND is_top = 1
			{$this->order}
			LIMIT 0,1
		");
        $this->smarty->assign("rows", $rows);
        $this->smarty->display("highlight_left.tpl");
    }
    function highlight_right(){
        $rows = $this->db->getAll("
			SELECT id, concat('{$this->pre}', '/', link) as pre_link, title, photo FROM {$this->table}
			{$this->where} AND is_top = 1
			{$this->order}
			LIMIT 1,5
		");
        $this->smarty->assign("rows", $rows);

        $this->smarty->display("highlight_right.tpl");
    }

    function news_block_sport(){
        $rows = $this->db->getAll("
			SELECT id, concat('{$this->pre}', '/', link) as pre_link, title, photo,description FROM {$this->table}
			{$this->where} AND `news_category_id`=18
			{$this->order}
			LIMIT 0,5
		");
        $this->smarty->assign("rows", $rows);
        $this->smarty->display("news_block_sport.tpl");
    }
    function news_service(){
        $rows = $this->db->getAll("
			SELECT id, concat('{$this->pre}', '/', link) as pre_link, title, photo,description FROM {$this->table}
			{$this->where} AND `news_category_id`=3
			{$this->order}
			LIMIT 0,20
		");
        $this->smarty->assign("rows", $rows);
        $this->smarty->display("news_service.tpl");
    }
}

?>