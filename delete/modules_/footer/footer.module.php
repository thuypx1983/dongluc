<?php
class footer extends base
{
	function run($task)
	{
		$this->smarty->display("footer.tpl");
	}
}

?>