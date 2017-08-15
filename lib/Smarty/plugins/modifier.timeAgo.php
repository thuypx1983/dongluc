<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * @author Manuel Polacek / Hitflip
 */


/**
 * Smarty regex_replace modifier plugin
 *
 * Type:     modifier<br>
 * Name:     substring
 * Purpose:  substring like in php
 * @param string
 * @return string
 */
function smarty_modifier_timeAgo($time) {
   return getTimeAgo($time);
}

?>