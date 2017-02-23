<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrator Control Panel</title>
<meta name="description" content="Administrator Control Panel" />
<link rel="stylesheet" type="text/css" href="{$url}admin/images/style.css">
<link rel="stylesheet" type="text/css" href="{$url}admin/images/style_more.css">

{literal}
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
{/literal}

<script type="text/javascript" src="{$url}lib/jquery/jquery.js"></script>
<script type="text/javascript" src="{$url}lib/accounting.js"></script>
<script type="text/javascript" src="{$url}lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$url}lib/scw.js"></script>
<script type="text/javascript" src="{$url}lib/jscolor/jscolor.js"></script>
<script type="text/javascript"> var url= "{$url}"; </script>

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
				<img src="{$url}admin/images/bg_line_menu.png" style="float:left; height:16px; width:2px; margin-top:4px;"/>
                {section name=foo loop=$smarty.session.admin_menu}
                <li><a href="{$smarty.session.admin_menu[foo].link}" class="menulink">{$smarty.session.admin_menu[foo].title}</a>
                
                {if $smarty.session.admin_menu[foo].sub}
                    <ul>
                    {section name=foo_sub loop=$smarty.session.admin_menu[foo].sub}
                        <li><a {if $smarty.session.admin_menu[foo].sub[foo_sub].sub}class="sub"{/if} href="{$smarty.session.admin_menu[foo].sub[foo_sub].link}" >{$smarty.session.admin_menu[foo].sub[foo_sub].title}</a>
                        
                        {if $smarty.session.admin_menu[foo].sub[foo_sub].sub}
                            <ul>
                            {section name=foo_sub_sub loop=$smarty.session.admin_menu[foo].sub[foo_sub].sub}
                                <li {if $smarty.section.foo_sub_sub.index==0}class="topline"{/if}><a href="{$smarty.session.admin_menu[foo].sub[foo_sub].sub[foo_sub_sub].link}" >{$smarty.session.admin_menu[foo].sub[foo_sub].sub[foo_sub_sub].title}</a></li>
                            {/section}
                            </ul>
                        {/if}                        
                        </li>
                    {/section}
                    </ul>                    
                {/if}
                </li>
				<img src="{$url}admin/images/bg_line_menu.png" style="float:left; height:16px; width:2px; margin-top:4px;"/>
                {/section}                      
                
             </ul>
    
            <script type="text/javascript">
                var menu=new menu.dd("menu");
                menu.init("menu","menuhover");
            </script>
        </div>
		<div style="height: 25px; width: 100%; border: 0px solid red; padding-top: 5px; float:left; margin-top:6px;">
			<div style="float: left; margin-top:-2px;">Administrator Control Panel</div>
        	<div style="float: left; margin-top:-5px; display: none;">
            	{if $smarty.get.mod!=''}
                    {$local_reset = "?mod="|cat:$smarty.get.mod}
                {/if}
                {if $smarty.get.sub!=''}
                    {$local_reset = $local_reset|cat:"&sub="|cat:$smarty.get.sub}
                {/if}
                
                {if $local_reset!=''}
                	{$local_reset = $local_reset|cat:"&slang="}
                {else}
                    {$local_reset = "admin.php?slang="}
                {/if}
            	Ngôn ngữ:
            	<select name="slang" onChange="location.href='{$local_reset}'+this.value">
                	{html_options options=$slang selected=$smarty.session.lang}
                </select> {if $flag!=''}<a href="?mod=languages"><img src="{$url}upload/lang/flag/{$flag}" width="23" height="17" /></a>{/if}
            </div>
            <div style="float: right; margin-top: 0px; color: #666;">Ngày {$date_day} tháng {$date_month} năm {$date_year}, {if $smarty.session.username!=""}Xin chào <span style="font-weight:bold;">{$smarty.session.username}</span> [<a href="?mod=user&task=logout" class="a_logout" onClick="return false;">Thoát</a>]{/if} [<a href="?mod=manage_user&sub=user&task=edit_profile" class="">Thông tin cá nhân</a>] [<a href="{$url}" class="">Trang chủ</a>]</div>       
        </div>
        
