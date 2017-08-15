<?php

include('lib/Smarty/Smarty.class.php');
global $oSmarty;
$oSmarty= new Smarty();
$oSmarty->setCompileDir("upload/templates_c/".SECTION);
$oSmarty->config_dir= "upload/lang";
$oSmarty->assign("url", SITE_URL);

?>