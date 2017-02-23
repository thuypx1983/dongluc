<?php
//thong tin ve Mysql

include('lib/adodb/adodb.inc.php');
include('lib/adodb/adodb-pear.inc.php');		

//dinh nghia 1 bien $oDb la object
$oDb = ADONewConnection('mysql');
$oDb->PConnect($db_server, $db_user, $db_pass, $db_name);

$oDb->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

?>