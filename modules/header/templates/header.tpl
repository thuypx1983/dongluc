<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="{$url}images/photo.png" />
<link type="text/css" href="{$url}css/dongluc.css" rel="stylesheet">
<link type="text/css" href="{$url}css/jquery.bxslider.css" rel="stylesheet">
<link type="text/css" href="{$url}css/custom.css" rel="stylesheet">
<link type="text/css" href="{$url}js/slick-1.6.0/slick.css" rel="stylesheet">
<link type="text/css" href="{$url}css/jquery.fancybox.css" rel="stylesheet">

<script type="text/javascript" src="{$url}js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="{$url}js/js/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="{$url}js/jquery.bxslider.js"></script>
<script src="{$url}js/jquery.sticky.js" type="text/javascript"></script>
<script src="{$url}js/slick-1.6.0/slick.min.js" type="text/javascript"></script>
<script src="{$url}js/jquery.fancybox.js" type="text/javascript"></script>
<script src="{$url}js/custom.js" type="text/javascript"></script>
<script type="text/javascript"> var url = "{$url}"; </script>
{getPageinfo}
{literal}
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/578f06ef3ef5055126156de1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
{/literal}
</head>

<body>
    <div class="close_menu"></div>
<div id='cssmenu1' class="menu_left_mobile">
<div class="pkg login_mobile" >

<div class="login_cart pkg">
    {loadModule mod=product task=cart_info}
</div>
    
</div>
  {loadModule mod=product task=category param=responsive}
</div>
<div class="menu_show">
    {loadModule mod=product task=search}
    {loadModule mod=product task=menu_responsive}
  
</div>
<div class="wrapper">
  <script type="text/javascript">
  $(function(){
    $(window).load(function(){
      $("#header").sticky({ topSpacing: 0 });
    });
  })
  </script>
  <div class="header pkg" id="header">
    <div class="grid1060">
      <div class="pkg">

        <div class="menu_drop_mobile" ><a href="javascript:;" class="fl more_menu"><img src="{$url}images/cart_menu.png"/> </a></div>


        <div class="logo fl"><a href="{$url}"><img src="{$url}images/photo.png"/> </a></div>
        <a href="javascript:;" class="btn_menu fr"></a>
        {loadModule mod=product task=menu}
        
        <div class="login_cart">
        {loadModule mod=product task=cart_info}
        </div>
        
        {loadModule mod=product task=search}
      </div>
    </div>
  </div>
  <div class="block50"></div>
  
  