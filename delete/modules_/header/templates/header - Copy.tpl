<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="{$url}images/favicon.png" />
<link type="text/css" href="{$url}css/plc-main.css" rel="stylesheet">
<link type="text/css" href="{$url}css/custom.css" rel="stylesheet">

<link type="text/css" href="{$url}css/jquery.bxslider.css" rel="stylesheet">
{*</link><script type="text/javascript" src="{$url}js/jquery-1.9.1.min.js"></script>*}

<script type="text/javascript" src="{$url}js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="{$url}js/jquery.sticky.js"></script>

<script type="text/javascript" src="{$url}js/jquery.bxslider.js"></script>

<script src="{$url}js/jquery-ui.js"></script>

<script type="text/javascript"> var url = "{$url}"; </script>
{getPageinfo}

{literal}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55130858-1', 'auto');
  ga('send', 'pageview');

</script>
{/literal}

<meta property="fb:app_id" content="663238610442515" />
</head>

<body>

{literal}
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '663238610442515',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
{/literal}

{loadModule mod=menu task=menu_hoz param=resonsive}

<div class="wrapper">
  
  <div  id="header">
    <div class="header_mobile pkg">
      <div class="grid1060"> <a href="javascript:;" class="btn_menu fl"><img src="{$url}images/btnmenu.png"/> </a>
        <div class="logo " align="center"><a href="{$url}"><img src="{$url}images/logo.png"/> </a></div>
      </div>
    </div>
  </div>
  
  <div class="header pkg">
    <div class="grid1060">
      <div class="pkg">
        <div class="logo fl"><a href="{$url}"><img src="{$url}images/logo.png"/> </a></div>
        <div class="contact_top fr">
          <a href="{$config.facebook}" class="fl marleft10"><img src="{$url}images/iconfb.png"/></a>
          <a href="{$config.google_plus}" class="fl marleft10"><img src="{$url}images/icongle.png"/></a>
            <a href="{$config.youtube}" class="fl marleft10"><img src="{$url}images/iconyoutube.png"/> </a>
          <div class="bg_hotline fl marleft10"><img src="{$url}images/icon_phone.png" class="fl"/><span class="fl marleft10">Hotline: {$config.hotline}</span> </div>
        </div>
      </div>
    </div>
    
  {loadModule mod=menu}
  </div>
  <div class="block50"></div>
  
  
  
  