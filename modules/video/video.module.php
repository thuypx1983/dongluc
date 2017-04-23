<?php
class video extends base
{
    var $table = "ads";

    function run($task, $param = "")
    {
        if ($_SESSION['username'] == 'root') {
            #echo '<pre>'; print_r($_SERVER); echo '</pre>';
            #echo '<pre>'; print_r($_GET); echo '</pre>';
        }
        $this->table = "ads";
        switch ($task) {
            case "detail":
                $this->detail();
                break;
        case "list":
                $this->detail();
                break;

        }
    }


    function detail()
    {


        $sql = "
			SELECT *,
			concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			 WHERE id = '{$_GET['nid']}'
		";
        $row = $this->db->getRow($sql);
        print_r($row);
        $row["content"] = stripslashes($row["content"]);
        $row["title"] = stripslashes($row["title"]);
        $row["content"] = str_replace("upload/editor/", SITE_URL . "upload/editor/", $row["content"]);
        $this->smarty->assign("row", $row);

        //bread
        $_GET['id'] = $row['news_category_id'];
        if ($_GET['nid'] != '') {
            $_GET['menu_type'] = 'videos';
            $bread = array();
            $bread[]=array('id'=>1, 'title'=>'video', 'link'=>'/video/', 'parent_id'=>0, 'pre_link'=>'/video/' );


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
            $arr2 = $this->db->getAll($sql . " AND id > {$row['id']} ORDER BY id ASC LIMIT " . (4 - $c_arr1));
        }

        if ($c_arr2 < 2) {
            $arr1 = $this->db->getAll($sql . " AND id < {$row['id']} ORDER BY id DESC LIMIT " . (4 - $c_arr2));
        }
        krsort($arr1);
        $rows = array_merge($arr1, $arr2);

        #$rows = $this->db->getAll($sql);

        foreach ($rows as $k => $v) {
            $v["content"] = stripslashes($v["content"]);
            $rows[$k]["content"] = stripslashes($v["content"]);
            $rows[$k]["title"] = stripslashes($v["title"]);
            //$rows[$k]["photo"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $this->getSrcImg($v['content']));
        }
        #echo "<pre>";print_r($rows);echo "</pre>";
        $this->smarty->assign("rows", $rows);

        $this->smarty->display("detail.tpl");
    }

    function showList()
    {
        if ($_GET['id'] != '') {
            $_GET['menu_type'] = 'dich-vu';
            // breadcrumb
            $bread = array();
            $temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$_GET['id']}' ");
            $bread[] = $temp;
            if ($temp['parent_id'] > 0) {
                $temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
                $bread[] = $temp;
                if ($temp['parent_id'] > 0) {
                    $temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
                    $bread[] = $temp;
                    if ($temp['parent_id'] > 0) {
                        $temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
                        $bread[] = $temp;
                        if ($temp['parent_id'] > 0) {
                            $temp = $this->db->getRow("select id, title, link, parent_id, concat('{$_GET['menu_type']}', '/', link) as pre_link from {$this->table_category} where id = '{$temp['parent_id']}' ");
                            $bread[] = $temp;
                        }
                    }
                }
            }
            $this->smarty->assign("bread", array_reverse($bread));

        }

        $where = "";
        if ($_GET['id'] != '') {
            /*$where = " AND news_category_id = '{$_GET['id']}' ";*/
            $where .= " AND ( news_category_id = '{$_GET['id']}' OR news_category_id IN (SELECT id FROM {$this->table_category} WHERE parent_id = '{$_GET['id']}' ) OR news_category_id IN (SELECT id FROM {$this->table_category} WHERE parent_id IN (SELECT id FROM {$this->table_category} where parent_id = '{$_GET['id']}' ) ) ) ";
            $category = $_GET['cate'] . "-" . $_GET['id'] . "/";
        } else {
            $where .= " AND news_category_id!=18 ";
        }
        // phuc vu cho paging
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $start = $limit * ($page - 1);

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

        $text_link_page = ($_SESSION["lang"] == "vi") ? "trang" : "page";
        $action_path = SITE_URL . $this->pre . '/' . $category . "{$text_link_page}-{i}/";

        $numrows = $this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where ");
        $oPaging = new Paging($numrows, $limit, Null, "page");
        $oPaging->set_current_page($page);
        $oPaging->set_action_path($action_path);
        $oPaging->set_site_url(SITE_URL);

        if ($numrows > $limit) {
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
        $cate_link = "/" . $cateinfo["link"] . "-" . $cateinfo["id"];

        if ($cateinfo['page_template'] != '') {

            $this->page_template($cateinfo['page_template']);

            return;
        }

        // phuc vu cho paging
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $start = $limit * ($page - 1);

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

        foreach ($rows as $k => $v) {
            $rows[$k]["title"] = stripslashes($v["title"]);
            //$rows[$k]["content"] = stripslashes($v["content"]);
            //$rows[$k]["photo"] = str_replace("upload/editor/", SITE_URL."upload/editor/", $this->getSrcImg($v['content']));
        }

        $this->smarty->assign("rows", $rows);

        $text_link_page = ($_SESSION["lang"] == "vi") ? "trang" : "page";

        $action_path = SITE_URL . $_GET['menu_type'] . $cate_link . $search_link . "/{$text_link_page}-{i}/";

        $numrows = $this->db->getOne("SELECT count(id) FROM {$this->table} {$this->where} $where ");
        $oPaging = new Paging($numrows, $limit, Null, "page");
        $oPaging->set_current_page($page);
        $oPaging->set_action_path($action_path);
        $oPaging->set_site_url(SITE_URL);

        if ($numrows > $limit) {
            $this->smarty->assign("paging", $oPaging->string_paging());
        }
        $this->smarty->assign("numrows", $numrows);

        $this->smarty->display('showList.tpl');

    }
}

?>