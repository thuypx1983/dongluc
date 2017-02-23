<?php
class error extends base
{
	function home() {
        $this->smarty->display("error.tpl");
	}
   
}

?>