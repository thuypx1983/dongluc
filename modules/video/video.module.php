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
                $this->showList();
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
        $row["content"] = stripslashes($row["content"]);
        $row["title"] = stripslashes($row["title"]);
        $row["content"] = str_replace("upload/editor/", SITE_URL . "upload/editor/", $row["content"]);
        $this->smarty->assign("row", $row);

        //bread
        $_GET['id'] = $row['news_category_id'];
        if ($_GET['nid'] != '') {
            $_GET['menu_type'] = 'videos';
            $bread = array();
            $bread[]=array('id'=>1, 'title'=>'video', 'link'=>'/videos/', 'parent_id'=>0, 'pre_link'=>'/videos/' );


        }
        #echo '<pre>'; print_r($bread); echo '</pre>';
        $this->smarty->assign("bread", array_reverse($bread));

        // lấy bài liên quan
        $where = " WHERE id != '{$row['id']}' AND ads_type='flash'";

        $sql = "
			SELECT id, title, concat('{$this->pre}', '/', link) as pre_link, photo, description
			FROM {$this->table} {$where} ";
        $rows = $this->db->getAll($sql);

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

        $where = " WHERE ads_type='flash'";
        // phuc vu cho paging
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $start = $limit * ($page - 1);

        $sql = "
			SELECT *,
			concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			$where
			ORDER BY `create_date` DESC
			LIMIT $start, $limit
		";
        $rows = $this->db->getAll($sql);
        #echo "<pre>";print_r($rows);echo "</pre>";
        echo mysql_error();
        $this->smarty->assign("rows", $rows);

        $text_link_page = ($_SESSION["lang"] == "vi") ? "trang" : "page";
        $action_path = SITE_URL . $this->pre . "/videos/{i}/";

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

    function getPageinfo($task="")
    {
        $page= array("");
        switch($task)
        {
            case "list":
                $row = array(
                    'title'       => 'Videos',
                    'description' => 'Videos',
                    'keyword'     => 'Videos'
                );
                break;
            case "detail":

                $row = $this->db->getRow("select * from {$this->table} where id=".$_GET['nid']);
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
}

?>