<?php
class notice extends base
{
	function home() {
		
		$rows = $this->db->getAll("select * from notice where is_active = 1 order by z_index desc limit 3 ");
		$this->smarty->assign("rows", $rows);
        $this->smarty->display("notice.tpl");
	}
   
}

?>