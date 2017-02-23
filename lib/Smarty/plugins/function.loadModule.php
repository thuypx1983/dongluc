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
function smarty_function_loadModule($params, &$smarty)
{	
     $mod = $params['mod'];
	 $task = $params['task'];
	 $pr = $params['param'];
     loadModule($mod, $task, $pr);
}

/* vim: set expandtab: */

?>
