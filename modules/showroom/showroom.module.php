<?php
class showroom extends base
{
	var $table = "showroom";
	function run($task, $param="")
	{
		$this->table = "showroom";
		$this->where = " WHERE is_active = 1 ";
		$this->order = " ORDER BY z_index DESC ";
		$this->pre   = "showroom";
		switch($task) {
			case "detail":
				$this->detail(); 
				break;
			default:
				$this->lists(); 
				break;
		}
	}
	function detail()
	{
		$row = $this->db->getRow("SELECT * FROM {$this->table} WHERE id = {$_GET['id']}");
		$this->smarty->assign("row", $row);
		$where = " AND id != {$_GET['id']} ";
		$sql = "
			SELECT
				*,
				concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} {$where}
			{$this->order}
		";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		$this->smarty->display("showroom_detail.tpl");
	}
	function lists()
	{
		if ($_GET['id'] != '') {
			$where = " AND region_id = {$_GET['id']} ";
			$region = $this->db->getRow("SELECT * FROM region WHERE id = {$_GET['id']}");
		}
		$sql = "
			SELECT
				*,
				concat('{$this->pre}', '/', link) as pre_link
			FROM {$this->table}
			{$this->where} {$where}
			{$this->order}
		";
		$rows = $this->db->getAll($sql);
		$this->smarty->assign("rows", $rows);
		$this->smarty->assign("region", $region);
        $this->smarty->display("showroom_list.tpl");
	}
	function getPageinfo($task="") {
		$page= array("");
		switch($task) {
			case 'detail':
				$row = $this->db->getRow("SELECT * FROM showroom WHERE id='{$_GET['id']}' ");
				break;
			default:
				$row = $this->db->getRow("SELECT * FROM region WHERE id='{$_GET['id']}' ");	
				$row["title"] = "Showroom" . $row["title"];
				break;
		}
		$page["title"]       = $row["title"];
		$page["description"] = $row["title"];
		$page["keyword"]     = $row["title"];
		return $page;
	}
}
?>