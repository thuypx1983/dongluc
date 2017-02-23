<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
/**
 * Smarty date_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     date_format<br>
 * Purpose:  format datestamps via strftime<br>
 * Input:<br>
 *         - string: input date string
 *         - format: strftime format for output
 *         - default_date: default date if $string is empty
 * @link http://smarty.php.net/manual/en/language.modifier.date.format.php
 *          date_format (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @param string
 * @return string|void
 * @uses smarty_make_timestamp()
 */
function smarty_modifier_select_date($id, $value)
{
		if($value=="")
			$value= date("Y-m-d");
			
		$path = SITE_URL.'lib';
        $str = '<link type="text/css" rel="stylesheet" href="'.$path.'/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
                <script type="text/javascript" src="'.$path.'/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
                <script language = "javascript">var pathToImages = "'.$path.'/calendar/images/"; </script>
                ';

        $str .= '<input type="text" value="'.$value.'" name="'.$id.'" ><input type="button" value="Select" onclick="displayCalendar(document.forms[0].'.$id.',\'yyyy-mm-dd\',this,true)">';

        return $str;
}

/* vim: set expandtab: */

?>
