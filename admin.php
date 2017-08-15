<?php
define('PATH_ROOT',dirname(__FILE__));
define('PATH_LIB',PATH_ROOT.DS.'lib');
include("lib/tcache/tCache.php");
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}
session_start();
define("SECTION", "admin/");
error_reporting(E_ERROR);
if($_SESSION[user_id]=="" && $_GET[task]!="login" && $_GET[task]!="password")
	header("location: ?mod=user&task=login");
ini_set("display_errors", 1);
//print_r($_GET);
foreach($_GET as $k=>$v)
{
	//echo str_replace("'", "\'", $v);
	if(!is_array($v))
		$_GET[$k]= str_replace("'", "\'", $v);	
}
//print_r($_GET);
//print_r($_POST);
foreach($_POST as $k=>$v)
{
	//echo str_replace("'", "\'", $v);
	if(!is_array($v))
		$_POST[$k]= str_replace("'", "\'", $v);	
}
//print_r($_POST);
include("config/config.php");
include("config/common.php");
include("config/adodb.php");
include("config/smarty.php");
include("lib/Thumbnail/Thumbnail.class.php");
include("config/phpmailer.php");
include("config/paging.php");
include("config/datagrid.php");
include("config/base.class.php");
/* kiem tra quyen truy cap */
$sql= "select id from admin_menu where link <> '' AND INSTR('".selfURL()."', link)>0";
$id = $oDb->getOne($sql);
if(is_array($_SESSION["admin_permission"]) && !in_array($id, $_SESSION["admin_permission"]) && $_GET["mod"]!="" && $_GET["mod"]!="user" && $_GET["ajax"]==false && $_GET["task"]!='edit_profile')
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><p style='text-align: center; font-size: 20px; color: red; margin-top: 100px;'>Bạn không có quyền truy cập trang này, vui lòng quay lại trang chủ</p>";
	exit();
}
/* het kiem tra quyen truy cap */
if($_GET["slang"]!="") {	
	$_SESSION["lang"]= $_GET["slang"];			
} else if($_SESSION["lang"]=="") {	
	$_SESSION["lang"]= DEFAULT_LANG;
}
$oSmarty->configLoad("admin.conf");
if($_GET['ajax']==true)
	loadModule($_GET['mod'], $_GET['task']);
else
	loadModule("layout");

$task=isset($_GET['task'])?$_GET['task']:'';
switch ($task){
  case 'add':
  case 'edit':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      tCache::clearAllCache();
    }
    break;
  case 'delete':
    tCache::clearAllCache();
    break;
  default:
    break;
}
?>