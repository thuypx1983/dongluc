<?php
class layout extends base
{	
	function run($task= "")
	{	
		$mod= ($_GET["mod"]!="")?$_GET["mod"]:"home";
		
		if(file_exists($this->smarty->template_dir[0]."$mod.tpl")) {
			$this->smarty->display($mod.".tpl");
		}	
		else
			$this->smarty->display("default.tpl");
	}
}
?>