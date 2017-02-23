<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/subcribe/templates/subcribe_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192984229655f6773779c659-79468951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ac6019fde58d5852dec397a3d540b0b128ddf89' => 
    array (
      0 => 'modules/subcribe/templates/subcribe_footer.tpl',
      1 => 1432051678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192984229655f6773779c659-79468951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f677377a0ac',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f677377a0ac')) {function content_55f677377a0ac($_smarty_tpl) {?><script type="text/javascript">
function redirect_register()
{
    var query = ""
    if ($('#input_register_email').val() != '')
    {
        query = '&register_email=' + $('#input_register_email').val();
    }
    location.href=url+'dang-ky-nhan-tin/' + query;
    return false;
}
</script>
<li  class="col2">
    <div class="head_footer">Nhận Email</div>
    <div class="box_send_mail pkg">
      <form action="" method="post" onsubmit="return redirect_register()">
        <input id="input_register_email" type="text" name="email" class="txt_mail" placeholder="nhập địa chỉ email"/>
        <input type="submit" class="btn_sendmail" value="Gửi"/>
      </form>
    </div>
  </li><?php }} ?>