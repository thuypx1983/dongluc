<?php
class contact extends base {	

	function run($task="")
	{
		$this->table = "contact";
		
		switch ($task)
		{			
			default: case "edit":							
				$this->edit();
				break;
		}
		
	}
	
	function edit()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			
			$row= array(
				/*"title" => $_POST["title"],*/
				/*"info" => $_POST["info"],
				"support" => $_POST["support"],*/
				"lang"=>$_SESSION["lang"],
				/*"map" => $_POST["map"],*/
				"email_contact" => $_POST["email_contact"],
			);
			
			//$this->db->autoExecute("contact", $row, DB_AUTOQUERY_INSERT);
			
			$this->db->autoExecute("contact", $row, DB_AUTOQUERY_UPDATE, " lang = '{$_SESSION['lang']}' ");

			$this->smarty->assign("msg", "Cập nhật thành công");

		}

		$row = $this->db->getRow("select * from {$this->table} WHERE lang = '{$_SESSION['lang']}' ");
		$row["support"] = stripslashes($row["support"]);
		$row["info"] = stripslashes($row["info"]);
		
		$this->smarty->assign("row", $row);
				
		$this->smarty->display("contact_edit.tpl");
		
	}

}

?>