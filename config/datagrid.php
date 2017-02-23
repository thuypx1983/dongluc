<?php
global $oDatagrid;
if(!is_object($oDatagrid))
{			
	include_once(SECTION."modules/datagrid/datagrid.module.php");	
	$oDatagrid= new datagrid();
}
?>