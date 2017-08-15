<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * @param array Format:
 * <pre>
 * array('name' => name of module)
 * </pre>
 * @param Smarty
 */
function smarty_function_redirect($params, &$smarty)
{
     $url = $params['url'];
	 $time = $params['time']+0;
	 
     redirect($url, $time);
}

/* vim: set expandtab: */

?>
