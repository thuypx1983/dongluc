<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 08:31:44
         compiled from "admin/modules/header/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2027778155515800921ad5-10538652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4e9210aa3a8a6bf15bf311d305729b98427c43b' => 
    array (
      0 => 'admin/modules/header/templates/header.tpl',
      1 => 1425525583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027778155515800921ad5-10538652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'local_reset' => 0,
    'slang' => 0,
    'flag' => 0,
    'date_day' => 0,
    'date_month' => 0,
    'date_year' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55515800a44d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55515800a44d5')) {function content_55515800a44d5($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.html_options.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrator Control Panel</title>
<meta name="description" content="Administrator Control Panel" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/style_more.css">


<!--<style type="text/css">


a
{
	text-decoration: none;
}

.col_left
{
	width: 100px;
	text-align: right;
}
.col_right
{
	text-align: left;
}

ul.menu {list-style:none; margin:0; padding:0}
ul.menu * {margin:0; padding:0;  text-align: left;}
ul.menu a {display:block; color:#000; text-decoration:none}
ul.menu li {position:relative; float:left; margin-right:2px}
ul.menu ul {position:absolute; top:30px; left:0; background:#d1d1d1; display:none; opacity:0; list-style:none}
ul.menu ul li {position:relative; border:1px solid #999966; border-top: none; width:148px; margin:0}
ul.menu ul li a {display:block; padding:3px 7px 5px; background-color:#ffcc66}
ul.menu ul li a:hover {background-color:#ff9900; color:#FFF;}
ul.menu ul ul {left:148px; top:-1px}
ul.menu .menulink0 {padding:7px 7px 7px; font-weight:normal; }
ul.menu .menulink0:hover {color:#FFF;}
ul.menu .menulink {padding:7px 7px 7px; font-weight:normal; }
ul.menu .menulink:hover, ul.menu .menuhover {color:#FFF;}
ul.menu .sub {background:#ffcc66 url(images/arrow.gif) 136px 8px no-repeat; text-align: left;}
ul.menu .topline {border-top:1px solid #999966}
</style>-->

<script type="text/javascript">
var menu=function(){
	var t=15,z=50,s=6,a;
	function dd(n){this.n=n; this.h=[]; this.c=[]}
	dd.prototype.init=function(p,c){
		a=c; var w=document.getElementById(p), s=w.getElementsByTagName('ul'), l=s.length, i=0;
		for(i;i<l;i++){
			var h=s[i].parentNode; this.h[i]=h; this.c[i]=s[i];
			h.onmouseover=new Function(this.n+'.st('+i+',true)');
			h.onmouseout=new Function(this.n+'.st('+i+')');
		}
	}
	dd.prototype.st=function(x,f){
		var c=this.c[x], h=this.h[x], p=h.getElementsByTagName('a')[0];
		clearInterval(c.t); c.style.overflow='hidden';
		if(f){
			p.className+=' '+a;
			if(!c.mh){c.style.display='block'; c.style.height=''; c.mh=c.offsetHeight; c.style.height=0}
			if(c.mh==c.offsetHeight){c.style.overflow='visible'}
			else{c.style.zIndex=z; z++; c.t=setInterval(function(){sl(c,1)},t)}
		}else{p.className=p.className.replace(a,''); c.t=setInterval(function(){sl(c,-1)},t)}
	}
	function sl(c,f){
		var h=c.offsetHeight;
		if((h<=0&&f!=1)||(h>=c.mh&&f==1)){
			if(f==1){c.style.filter=''; c.style.opacity=1; c.style.overflow='visible'}
			clearInterval(c.t); return
		}
		var d=(f==1)?Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
		c.style.opacity=o; c.style.filter='alpha(opacity='+(o*100)+')';
		c.style.height=h+(d*f)+'px'
	}
	return{dd:dd}
}();
</script>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/accounting.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/scw.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/jscolor/jscolor.js"></script>
<script type="text/javascript"> var url= "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"; </script>

</head>

<script type="text/javascript">
$(function(){
	
	$('#logout_admin').hide();
	$('a.a_logout').click(function(){
		$('#logout_admin').show();
		
		setTimeout("redirect_home()", 1000);
	});
		
});

function redirect_home(temp)
{
	var temp = $('a.a_logout').attr('href');
	
	location.href= temp;
}
</script>

<style type="text/css">
#logout_admin 
{
	cursor:pointer;
	display:inline-block;
	color:#000;
	background:#ebf8a4; 
	border:1px solid #a2d246; 
	border-radius:4px; -moz-border-radius:4px; 
	box-shadow:0px 0px 30px #333; 
	-moz-box-shadow:0px 0px 30px #333; 
	border-radius:5px;
	padding:12px 20px 10px;
	
}
</style>
	<div style="position:absolute; top:-5px; left:0;  width:100%; text-align:center; z-index:999999; display:none;">
    	<div id="logout_admin">Đăng xuất thành công ! Vui lòng chờ trong giây lát ...</div>
    </div>
<body>
    <div id="wrapper">
        
        <div id="menu_bar">
			<ul class="menu" id="menu">      
                <li><a href="?" class="menulink0">Trang chính</a></li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/bg_line_menu.png" style="float:left; height:16px; width:2px; margin-top:4px;"/>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=$_SESSION['admin_menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
                <li><a href="<?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['link'];?>
" class="menulink"><?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['title'];?>
</a>
                
                <?php if ($_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub']){?>
                    <ul>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['name'] = 'foo_sub';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['loop'] = is_array($_loop=$_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub']['total']);
?>
                        <li><a <?php if ($_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['sub']){?>class="sub"<?php }?> href="<?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['link'];?>
" ><?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['title'];?>
</a>
                        
                        <?php if ($_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['sub']){?>
                            <ul>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['name'] = 'foo_sub_sub';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['loop'] = is_array($_loop=$_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['sub']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo_sub_sub']['total']);
?>
                                <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['foo_sub_sub']['index']==0){?>class="topline"<?php }?>><a href="<?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub_sub']['index']]['link'];?>
" ><?php echo $_SESSION['admin_menu'][$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub']['index']]['sub'][$_smarty_tpl->getVariable('smarty')->value['section']['foo_sub_sub']['index']]['title'];?>
</a></li>
                            <?php endfor; endif; ?>
                            </ul>
                        <?php }?>                        
                        </li>
                    <?php endfor; endif; ?>
                    </ul>                    
                <?php }?>
                </li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin/images/bg_line_menu.png" style="float:left; height:16px; width:2px; margin-top:4px;"/>
                <?php endfor; endif; ?>                      
                
             </ul>
    
            <script type="text/javascript">
                var menu=new menu.dd("menu");
                menu.init("menu","menuhover");
            </script>
        </div>
		<div style="height: 25px; width: 100%; border: 0px solid red; padding-top: 5px; float:left; margin-top:6px;">
			<div style="float: left; margin-top:-2px;">Administrator Control Panel</div>
        	<div style="float: left; margin-top:-5px; display: none;">
            	<?php if ($_GET['mod']!=''){?>
                    <?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable(("?mod=").($_GET['mod']), null, 0);?>
                <?php }?>
                <?php if ($_GET['sub']!=''){?>
                    <?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable((($_smarty_tpl->tpl_vars['local_reset']->value).("&sub=")).($_GET['sub']), null, 0);?>
                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['local_reset']->value!=''){?>
                	<?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable(($_smarty_tpl->tpl_vars['local_reset']->value).("&slang="), null, 0);?>
                <?php }else{ ?>
                    <?php $_smarty_tpl->tpl_vars['local_reset'] = new Smarty_variable("admin.php?slang=", null, 0);?>
                <?php }?>
            	Ngôn ngữ:
            	<select name="slang" onChange="location.href='<?php echo $_smarty_tpl->tpl_vars['local_reset']->value;?>
'+this.value">
                	<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['slang']->value,'selected'=>$_SESSION['lang']),$_smarty_tpl);?>

                </select> <?php if ($_smarty_tpl->tpl_vars['flag']->value!=''){?><a href="?mod=languages"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/lang/flag/<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
" width="23" height="17" /></a><?php }?>
            </div>
            <div style="float: right; margin-top: 0px; color: #666;">Ngày <?php echo $_smarty_tpl->tpl_vars['date_day']->value;?>
 tháng <?php echo $_smarty_tpl->tpl_vars['date_month']->value;?>
 năm <?php echo $_smarty_tpl->tpl_vars['date_year']->value;?>
, <?php if ($_SESSION['username']!=''){?>Xin chào <span style="font-weight:bold;"><?php echo $_SESSION['username'];?>
</span> [<a href="?mod=user&task=logout" class="a_logout" onClick="return false;">Thoát</a>]<?php }?> [<a href="?mod=manage_user&sub=user&task=edit_profile" class="">Thông tin cá nhân</a>] [<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="">Trang chủ</a>]</div>       
        </div>
        
<?php }} ?>