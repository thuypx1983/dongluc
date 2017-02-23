<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 09:35:53
         compiled from "modules/product/templates/cart_view_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204615894255f78409235896-28563948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0df07a0df204fad629209b581ab9a0a0ef5c7fb3' => 
    array (
      0 => 'modules/product/templates/cart_view_ajax.tpl',
      1 => 1431564924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204615894255f78409235896-28563948',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sum' => 0,
    'row' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f7840931924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f7840931924')) {function content_55f7840931924($_smarty_tpl) {?><div class="max_width">
    <table class="tbl_cart" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <th></th>
      <th>Sản phẩm</th>
      <th>Giá</th>
      <th>Số lượng</th>
      <th>Tổng cộng</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_SESSION['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price'], null, 0);?>
    <tr>
      <td><a href="" onclick="cart_del(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
);return false;"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/icon_delete.png"/> </a></td>
      <td><table>
          <tr>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/product/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" height="140"/> </a></td>
            <td style="text-align:left;padding-left:10px">
              <div class="item_info_product">
                <a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a>
                <?php if ($_smarty_tpl->tpl_vars['row']->value['color_name']!=''){?>
                <div class="filter_color">
                    <em>Màu sắc: <?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
</em>
                      <a href="" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['color_code'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" style="width:33%;height:33px" class="active"><span style="background:<?php echo $_smarty_tpl->tpl_vars['row']->value['color_code'];?>
"></span></a>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value['size']!=''){?>
                  <div class="list_size">
                    <em>Kích cỡ: <?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</em>
                    <a href="" class="active" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</a>
                  </div>
                <?php }?>
                </div>
            </td>
          </tr>
        </table></td>
      <td><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price_text'],0,',','.');?>
 vnđ</td>
      <td>
          <input type="text" name="quantity[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
" class="txt_faq" style="width:50px;text-align:center">
          <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
      </td>
      <td><span class="f18red"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 vnđ</span></td>
    </tr>
    <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
    <tr>
        <td colspan="5"><em>Chưa có sản phẩm nào</em></td>
    </tr>
    <?php } ?>
  </table>
</div>
  
  <div class="update_cart">
    
    <button type="submit" class="btn_update_cart">Cập nhật đơn hàng</button>
	<?php if ($_SESSION['cart']){?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
thanh-toan.html" class="btn_buy_cart">Thanh toán</a>
	<?php }?>
  </div>
  <div class="total_cart">Tổng đơn hàng: <span><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,0,',','.');?>
 vnđ</span></div>
<?php }} ?>