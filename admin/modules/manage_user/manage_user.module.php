<?php
class manage_user {	

	function run()
	{
		$sub= $_GET["sub"];
		$task= $_GET["task"];

		include($sub.".class.php");
		$sub = new $sub();
		$sub->run($task);

	}
		
}

?>