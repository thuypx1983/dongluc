<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/footer/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20363359755508a9949e976-82030368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2f76049f0224229f11766f4444d93e913ebff63' => 
    array (
      0 => 'modules/footer/templates/footer.tpl',
      1 => 1431163574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20363359755508a9949e976-82030368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a994e8d9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a994e8d9')) {function content_55508a994e8d9($_smarty_tpl) {?><div class="footer pkg">
    <div class="grid1060">
      <ul class="list_footer pkg">
        <li class="col1"><a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/logo_footer.png"/> </a><br/>
          <br/>
          <?php echo $_smarty_tpl->tpl_vars['config']->value['copyright'];?>

        </li>
        <li  class="col2">
          <div class="head_footer">Địa chỉ</div>
          <p><?php echo $_smarty_tpl->tpl_vars['config']->value['address'];?>
</p>
          <p> Tel: <?php echo $_smarty_tpl->tpl_vars['config']->value['phone'];?>
</p>
          <p> Hotline: <?php echo $_smarty_tpl->tpl_vars['config']->value['hotline'];?>
</p>
          <p> Fax: <?php echo $_smarty_tpl->tpl_vars['config']->value['fax'];?>
</p>
        </li>
        <li  class="col2">
          <div class="head_footer">Nhận Email</div>
          <div class="box_send_mail pkg">
            <input type="text" class="txt_mail" placeholder="nhập địa chỉ email"/>
            <input type="submit" class="btn_sendmail" value="Gửi"/>
          </div>
        </li>
        <li  class="col3">
          <div class="head_footer">Kết nối</div>
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['facebook'];?>
" class="social_footer"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/iconfb.png"/></a>
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['twitter'];?>
" class="social_footer"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icontw.png"/></a>
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['instagram'];?>
" class="social_footer"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/iconinsta.png"/></a>
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['youtube'];?>
" class="social_footer"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/iconyoutube.png"/></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>

$(document).ready(function(){
$( ".menu_drop_mobile" ).click(function() {
      $('.more_menu').toggleClass('active');
      
      $('.menu_left_mobile').toggleClass('active_menu');
      $('.header').toggleClass('active_main');
      $('.close_menu').toggleClass('active')
     
  });
  $( ".btn_menu" ).click(function() {
  $('.menu_show').toggleClass('active');
  $('.wrapper').toggleClass('active');
  $('.header').toggleClass('active');
  $('.close_menu').toggleClass('active')
});
  
  $( ".close_menu" ).click(function() {
      $('.menu_drop_mobile').removeClass('active');
      $('.close_menu').removeClass('active')
      $('.menu_left_mobile').removeClass('active_menu');
      $('.header').removeClass('active_main');
      $('.menu_show').removeClass('active');
  $('.wrapper').removeClass('active');
  $('.header').removeClass('active');
  $('.close_menu').removeClass('active')
      
     
  });
})


$(document).ready(function(){

  $('#cssmenu1 > ul > li:has(ul)').addClass("has-sub");

  $('#cssmenu1 > ul > li > a > i').click(function() {
    var checkElement = $(this).parent().next();
    
    $('#cssmenu1 li').removeClass('active');
    $(this).closest('li').addClass('active'); 
    
    
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }
    
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#cssmenu1 ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }
    
    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;  
    }   
  });

});

</script>
</body>
</html>
<?php }} ?>