<?php
class partner extends base
{
	var $table = "partner";
	function run($task, $param="")
	{
		$this->table = "partner";
		$this->where = " WHERE is_active = 1 ";
		$this->order = " ORDER BY z_index DESC ";
		$this->pre = "partner";
		switch($task) {
			case "list":
				$this->lists(); 
				break;
			default:
				$this->lists(); 
				break;
		}
	}

	function lists()
	{

		$sql = "
			SELECT
				*
			FROM {$this->table}
			{$this->where}
			{$this->order}
		";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
        $this->smarty->display("partner.tpl");
	}
	
	function getPageinfo($task="") {
			
		$page["title"]       = "Đối tác";
		$page["description"] = "Đối tác";
		$page["keyword"]     = "Đối tác";
		
		return $page;
	}
}

?>