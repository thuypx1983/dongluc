<?php
define('PATH_ROOT',dirname(__FILE__));
define('PATH_LIB',PATH_ROOT.DS.'lib');
include("lib/tcache/tCache.php");
$tCache=new tCache(0);
$content=$tCache->getCache();
if($content!==FALSE){
	echo $content;
	exit();
}
ini_set("include_path", '/home/dongluc/php:' . ini_get("include_path") );
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
error_reporting(E_ERROR);
ini_set("display_errors", 1);

foreach($_GET as $k=>$v)
{
	//echo str_replace("'", "\'", $v);
	if(!is_array($v))
		$_GET[$k]= str_replace("'", "\'", $v);
}
foreach($_POST as $k=>$v)
{
	if(!is_array($v))
		$_POST[$k]= str_replace("'", "\'", $v);
}

define("SECTION", "");

include("config/config.php");
include("config/common.php");
include("config/adodb.php");
include("config/smarty.php");
include("lib/Thumbnail/Thumbnail.class.php");
include("config/phpmailer.php");
include("config/paging.php");
include("config/base.class.php");
include("lib/htmlcompresser.php");

// Permanently 301
$ex = @explode(SITE_URL, selfURL());
$self = $ex[1];
$ex2 = @explode('/', $self);
if ($ex2[0] == 'news')
{
	$ex2[1] = trim($ex2[1]);
	$old_id = $oDb->getOne("SELECT id FROM news WHERE link = '".$ex2[1]."' ");
	$url_new =  SITE_URL . $ex2[1] . '-' . $old_id . '.html';

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . $url_new);
}

if($_GET["slang"]!="" && ( $_GET["slang"]=='vi' || $_GET["slang"]=='en' ) ) {
	$_SESSION["lang"]= $_GET["slang"];
} else if($_SESSION["lang"]== "") {
	$default_code = $oDb->getOne("SELECT code FROM lang WHERE is_default = 1 ");
	$_SESSION["lang"] = $default_code!=''?$default_code:DEFAULT_LANG;
}

if (!isset($_SESSION['cart']) || $_GET["clear"]=="cart")
	$_SESSION['cart'] = array();
$oSmarty->configLoad($_SESSION["lang"].".conf");
if($_SESSION["lang"]=='vi') {
	define("LINK_NEWS", "thong-tin");
	define("LINK_PRODUCT", "");
	define("LINK_ABOUT", "gioi-thieu");
	define("LINK_FAQ", "hoi-dap");
	define("LINK_CONTACT", "lien-he");
	define("LINK_ALBUM", "");
	define("LINK_CATA", "");
	define("TEXT_HOME", "Trang chủ");

} else if($_SESSION["lang"]=='en') {
	define("LINK_NEWS", "info");
	define("LINK_PRODUCT", "product");
	define("LINK_ABOUT", "about");
	define("LINK_FAQ", "faq");
	define("LINK_ALBUM", "");
	define("LINK_CATA", "");
	define("LINK_CONTACT", "contact");
	define("TEXT_HOME", "Home");
}

$oSmarty->assign("link_news", LINK_NEWS);
$oSmarty->assign("link_product", LINK_PRODUCT);
$oSmarty->assign("link_about", LINK_ABOUT);
$oSmarty->assign("link_contact", LINK_CONTACT);
$oSmarty->assign("link_faq", LINK_FAQ);

$oSmarty->assign("text_home", TEXT_HOME);

$oSmarty->assign("alias", SITE_ALIAS);
$oSmarty->assign("url", SITE_URL);
$oSmarty->assign("selfURL", selfURL());

// Lấy trạng thái lọc hiện tại
$oSmarty->assign("queryString", $_SERVER["QUERY_STRING"]);

/*lấy biến config */
$config = $oDb->getAssoc("select name, value from configurations");
$oSmarty->assign("config", $config);

ob_start();

if(isset($_GET['ajax']))
	loadModule($_GET['mod'], $_GET['task']);
else
	loadModule("layout");

$html=ob_get_contents();
ob_end_clean();
$html=minify_html($html);
$tCache->setCache($html);
echo $html;
?>
