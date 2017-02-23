<?php
class social extends base
{
	function home() {	
		$this->fanpage();
	}
	function button_like() {
		$this->smarty->display('button_like.tpl');
	}
	function button_share() {
		$this->smarty->display('button_share.tpl');
	}
	function fanpage() {
		if ($_GET["mod"] == "album" && $_GET["task"] == "detail") {
			$w = 775;
			$h = 293;	
		} else {
			$w = 253;
			$h = 285;
		}
		$data = array(
			'width' => $w,
			'height' => $h
		);
		$this->smarty->assign('data', $data);
		$this->smarty->display('fanpage.tpl');
	}
}

?>