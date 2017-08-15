<?php
class home extends base
{
	function run($task)
	{
		$this->smarty->display("home.tpl");
	}
}

?>