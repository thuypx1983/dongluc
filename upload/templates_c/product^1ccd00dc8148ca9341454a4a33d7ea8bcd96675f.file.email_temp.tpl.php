<?php /* Smarty version Smarty-3.1.7, created on 2015-10-04 22:48:59
         compiled from "modules/product/templates/email_temp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96648425956114a6b85e3f7-52429972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ccd00dc8148ca9341454a4a33d7ea8bcd96675f' => 
    array (
      0 => 'modules/product/templates/email_temp.tpl',
      1 => 1431574328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96648425956114a6b85e3f7-52429972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'sum' => 0,
    'row' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56114a6bd163f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56114a6bd163f')) {function content_56114a6bd163f($_smarty_tpl) {?><!-- 
<table class="tbl_giohang" cellpadding="7" cellspacing="0" width="100%">
<tbody>
    <tr class="title_tbl_giohang" style="font-weight:bold;">
        <td width="35%">Tên sản phẩm</td>
        <td width="20%">Đơn giá (VNĐ)</td>
        <td width="10%">Số lượng</td>
        <td colspan="2" width="40%" align="center">Thành tiền (VNĐ)</td>
    </tr>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price'], null, 0);?>
    <tr>
        <td><span class="red bold"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span></td>
        <td><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price_text'],0,',','.');?>
 VNĐ</td>
        <td>
        	<?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>

        </td>
        <td align="center"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 VNĐ</td>
    </tr>
    <?php } ?>
</tbody>
</table>
<div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;"><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,0,',','.');?>
 VNĐ.</span></div> -->
<table class="tbl_showList" cellpadding="7" cellspacing="0" width="100%">
    <tr>
        <td>STT</td>
        <td>Mã Hàng</td>
        <td>Tên sản phẩm</td>
        <td>Thông tin phụ</td>
        <td>Giá gốc</td>
        <td>Giảm giá(%)</td>
        <td>Giá bán</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
    </tr>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    <?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['quantity']), null, 0);?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
</td>
        <td><span class="green bold f14"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span></td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['color_name']!=''){?>
            <div style="margin-bottom:5px">
                Màu sắc: <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
" style="width:20px;height:20px;display:inline-block"><span style="background:<?php echo $_smarty_tpl->tpl_vars['row']->value['color_code'];?>
;display:inline-block;width:20px;height:20px"></span></span> (<?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
)
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['size']!=''){?>
            <div>
                Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</span>
            </div>
            <?php }?>
        </td>
        <td>
            <!--<strike><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price'],0,',','.');?>
</strike> VNĐ-->
            <!--<div><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price']-($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['discount']*0.01)),0,',','.');?>
 VNĐ</div>-->
            <div><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price_goc']),0,',','.');?>
 VNĐ</div>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['row']->value['is_timegold']==1){?>
                <span style="color:#f00;">Giờ vàng : </span>
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['row']->value['discount'];?>
%
        </td>
        <td><div><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 VNĐ</div></td>
        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
</td>
        <td class="red"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 VNĐ</td>
    </tr>
    <?php } ?>
</table>
<div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;"><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,0,',','.');?>
 VNĐ.</span></div><?php }} ?>