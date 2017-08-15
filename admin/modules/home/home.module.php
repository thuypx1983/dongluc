<?php

class home extends base
{	
	function run($task="")
	{
		switch($task)
		{			
			default:
				$this->showHome();
		}		
		
	}
	
	function showHome()
	{	
		if($_SESSION['username']=='')
			redirect('?mod=user&task=login');
			
		$this->smarty->display('home.tpl');		
			
	}
}
?>