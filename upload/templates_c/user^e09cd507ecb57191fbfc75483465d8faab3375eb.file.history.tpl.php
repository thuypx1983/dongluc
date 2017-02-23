<?php /* Smarty version Smarty-3.1.7, created on 2016-01-31 22:28:57
         compiled from "modules/user/templates/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44474073156ae2839473d36-36316789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e09cd507ecb57191fbfc75483465d8faab3375eb' => 
    array (
      0 => 'modules/user/templates/history.tpl',
      1 => 1431909066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44474073156ae2839473d36-36316789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'orders' => 0,
    'order' => 0,
    'i' => 0,
    'sum' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56ae283960136',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ae283960136')) {function content_56ae283960136($_smarty_tpl) {?>

<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col30per fl collog"> <a href="" class="head_title">Chức năng</a>
			<div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
don-hang.html" class="f16gray user_mod <?php if ($_GET['task']=='history'){?>active<?php }?>">Đơn hàng của tôi</a></div>
			<div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
thong-tin-ca-nhan.html" class="f16gray user_mod <?php if ($_GET['task']=='update_profile'){?>active<?php }?>">Thông tin cá nhân</a></div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Đơn hàng của tôi</a>
          <!--<div class="f16gray">Cập nhật thông tin tài khoản theo mẫu dưới đây</div>-->
		  <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['order']->key;
?>
		  <div class="total_order" style="margin-bottom:20px">
            <div class="head_total_order">
				Đơn hàng<span>(<?php echo count($_smarty_tpl->tpl_vars['order']->value['sub']);?>
 sản phẩm)</span>
				<span>(<?php echo $_smarty_tpl->tpl_vars['order']->value['create_date'];?>
)</span>
				<span><?php if ($_smarty_tpl->tpl_vars['order']->value['is_process']==0){?>Đang xử lý đơn hàng...<?php }else{ ?><font color="red">Đã xử lý</font><?php }?></span>
				<span style="float:right">#<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</span>
				<?php if ($_smarty_tpl->tpl_vars['order']->value['cust_note']!=''){?><div>Ghi chú: <font color="green"><?php echo $_smarty_tpl->tpl_vars['order']->value['cust_note'];?>
</font></div><?php }?>
			</div>
            <table class="tbl_total_order" width="100%" cellpadding="0" cellspacing="0">
				<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
				<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price'], null, 0);?>
				  <tr>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
x</td>
					<td>
                        <div style="margin-bottom:2px;font-size:16px"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</div>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['color_name']!=''){?>
                        <div style="margin-bottom:2px;font-size:12px">
                            Màu sắc: <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
" style="border:1px solid #e9e9e9;width:20px;height:20px;display:inline-block;padding:2px"><span style="background:<?php echo $_smarty_tpl->tpl_vars['row']->value['color_code'];?>
;display:inline-block;width:100%;height:100%"></span></span> (<?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
)
                        </div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['size']!=''){?>
                        <div style="font-size:12px">
                            Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;font-size:11px"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</span>
                        </div>
                        <?php }?>
                    </td>
					<td align="right" valign="top"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 vnđ</td>
				  </tr>
			  <?php } ?>
            </table>
            <div class="total_price pkg"> <span class="fl">Tổng cộng</span><span class="fr"><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,0,',','.');?>
 vnđ</span> </div>
          </div>
		  <?php }
if (!$_smarty_tpl->tpl_vars['order']->_loop) {
?>
			<div style="margin-left:0px; padding:10px 0 20px;">
				<em><p>Chưa có đơn hàng nào</p></em>
			</div>
		  <?php } ?>
		  
        </div>
      </div>
    </div>
  </div>



<?php }} ?>