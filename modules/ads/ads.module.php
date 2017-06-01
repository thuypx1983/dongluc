<?php

class ads extends base {	

	function run($task= "", $param="")
	{	
		//$this->where = " WHERE lang = '{$_SESSION['lang']}' AND is_active = 1 ";
		$this->where = " WHERE is_active = 1 ";
		$this->order = " ORDER BY z_index DESC ";
		switch ($task) {
			default:
				$this->view($task, $param);
				break;	
		}
	}
	function view($pos, $news_category_id=0) {
		if ($news_category_id > 0)
		{
			$where = " AND news_category_id = $news_category_id ";
		}
		$temp = $pos;
		$ex = @explode("_", $pos);
		if($ex[0]=='footer') {
			$temp = "footer";
		}
		$rows = $this->db->getAll("SELECT * FROM ads {$this->where} AND position = '{$pos}' {$where} {$this->order} ");
		echo mysql_error();
		foreach ($rows as $k => $v) {
            if($pos=='video'){
                preg_match('/src="([^"]+)"/', $rows[$k]['embed'], $match);
                if(strpos($match[1],'https://')===false AND strpos($match[1],'http://')===false){
                    $src='https:'.$match[1];
                }
                $rows[$k]["video_src"]='https://www.youtube.com/v/'.$this->youtube_id_from_url($src).'?fs=1&amp;autoplay=1';

            }
			$rows[$k]["photo"] = $pos."/".$v["photo"];
		}
		//echo"<pre>";print_r($rows);echo"</pre>";
		$this->smarty->assign("rows", $rows);
		
		if($pos=="popup") {
			$attr = getimagesize(SITE_URL."upload/ads/".$rows[0]["photo"]);
			$this->smarty->assign("attr", $attr);
			$_SESSION["popup"] = 1;
		}
		//$_SESSION["popup"] = NULL;
		
		
		$this->smarty->display($temp.'.tpl');
	}
	
	function load($position="", $type="", $limit="")
	{
		global $oSmarty, $oDb;
		
		if($type=="single")
		{
			$sql="SELECT * FROM ads ".$this->where." AND position='".$position."' order by Rand() limit 1";
		}
		else if($type=="all")
		{
			$sql="SELECT * FROM ads ".$this->where." AND position='".$position."' order by z_index limit $limit";
			
		}
		else
		{
			$sql="SELECT * FROM ads ".$this->where." AND position='".$position."' order by Rand() limit ".$type;
		}

		$rows= $oDb->getAll($sql);
		//print_r($rows);
	
		$oSmarty->assign('rows', $rows);
		$oSmarty->assign('position', $position);			
		$oSmarty->display('ads.tpl');
	}


    function youtube_id_from_url($url) {
        $result=preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);

        if ($result) {
            return $matches[1];
        }
        return false;
    }
}
?>