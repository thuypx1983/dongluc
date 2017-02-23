<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 09:35:52
         compiled from "modules/product/templates/cart_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79235019855f78408d38fc6-78653075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cfd548c5049ed9c9a3c49edb64963a32901d645' => 
    array (
      0 => 'modules/product/templates/cart_view.tpl',
      1 => 1431574582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79235019855f78408d38fc6-78653075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f784091fb0b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f784091fb0b')) {function content_55f784091fb0b($_smarty_tpl) {?><script type="text/javascript">

$(function(){
    $("form#frmfrm").submit(function() {
        $('#cart_view_ajax').fadeOut(300, function(){
            $.post(url+'?ajax=true&mod=product&task=cart_view', $("form#frmfrm").serialize(), function(result) {
                $('#cart_view_ajax').html(result);
				
            });
			$.get(url+'?ajax=true&mod=product&task=cart_info', function(rs) {
                $('.login_cart').html(rs);
            });	
        });
        $('#cart_view_ajax').fadeIn(300);
    });
});
function cart_del(del_id)
{
    if (confirm("Bạn có chắc không?"))
    {   
        $('#cart_view_ajax').fadeOut(300, function(){
            $.post(url+'?ajax=true&mod=product&task=cart_del', { 'id' : del_id }, function(result) {
                $('#cart_view_ajax').html(result);
            }); 
			$.get(url+'?ajax=true&mod=product&task=cart_info', function(rs) {
                $('.login_cart').html(rs);
            });
        });
        $('#cart_view_ajax').fadeIn(300);
    }
}
</script>

<div class="grid1060">
    <div class="content_cate"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
gio-hang.html" class="head_title">Giỏ hàng của bạn</a>

     <div class="continue_cart">
        <!-- <a href="<?php if ($_SERVER['HTTP_REFERER']!=''){?><?php echo $_SERVER['HTTP_REFERER'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/<?php }?>" class="btn_continue_cart">Tiếp tục chọn hàng</a> -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" class="btn_continue_cart">Tiếp tục chọn hàng</a>
      </div>
    <form id="frmfrm" name="frmfrm" onsubmit="return false;">
      <div id="cart_view_ajax">
            <?php echo $_smarty_tpl->getSubTemplate ('cart_view_ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </form>

    </div>
  </div><?php }} ?>