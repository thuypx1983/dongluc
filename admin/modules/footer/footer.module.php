<?php
class footer extends base
{	
	function run($task="")
	{
						
		if($task=="ajax")
		{
			$oSmarty->display('footer_ajax.tpl');
			return ;
		}

		$this->smarty->display('footer.tpl');
	}
}
?>