<?php /* Smarty version Smarty-3.1.7, created on 2015-05-13 09:09:11
         compiled from "admin/modules/orders/templates/order_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11055158655552b2476d36f5-81730120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13d7bb54813866ab54a23db046fbe30dd0be0be8' => 
    array (
      0 => 'admin/modules/orders/templates/order_detail.tpl',
      1 => 1402241612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11055158655552b2476d36f5-81730120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'list' => 0,
    'sum' => 0,
    'rs1' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5552b2477b241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5552b2477b241')) {function content_5552b2477b241($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/modifier.date_format.php';
?><form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
 
<style>
#order_left { margin:10px 40px 0 30px; color:#BF0006; font-weight:bold; font-size:14px;}
#order_left strong { background:; width:180px; float:left; color:#000; font-weight:bold; }

.tbl_showList {
	width:90%;
	margin-top:20px;
	margin-left:30px;
	border:1px solid #333;
	border-bottom:none;
	border-left:none;
}
.tbl_showList tr:first-of-type td {
	background:#333;
	color:#fff;
	font-weight:bold;
	font-size:14px;
}
.tbl_showList td {
	border:1px solid #333;
	border-top:none;
	border-right:none;
	padding:8px;
}
.bold {
	font-weight:bold;
}
.red {
	color:red;
}

</style>

  <input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" style="margin:20px 0 0 20px;" onClick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/>
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Thông tin người mua hàng : </div>
		<div id="order_left">
			<p><strong>Tên khách hàng : </strong><span style="color:blue;"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</span></p>
			<p><strong>Địa chỉ : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
</p>
			<p><strong>Di động : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
</p>
			<p><strong>Email: </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</p>
			<p><strong>Ngày tạo : </strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['create_date'],"%d/%m/%Y");?>
</p>
			<p><strong>Chú thích : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['cust_note'];?>
</p>
	  </div>
  
  <div style="clear:both;"></div>
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Thông tin giỏ hàng : </div>
    
  <table class="tbl_showList">
		<tr>
			<td>STT</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Giá</td>
			<!--<td>Giảm giá(%)</td>-->
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
		<?php $_smarty_tpl->tpl_vars['rs1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['row']->value['price']-($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['discount']*0.01)), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+($_smarty_tpl->tpl_vars['rs1']->value*$_smarty_tpl->tpl_vars['row']->value['quantity']), null, 0);?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
			<td><span class="red bold"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['row']->value['quantity'];?>
</td>
			
			<td>
				<!--<strike><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price'],0,',','.');?>
</strike> VNĐ-->
				<!--<div><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price']-($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['discount']*0.01)),0,',','.');?>
 VNĐ</div>-->
                <div><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price']),0,',','.');?>
 VNĐ</div>
			</td>
			<!--<td>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['is_timegold']==1){?>
					<span style="color:#f00;">Giờ vàng : </span>
				<?php }?>
				<?php echo $_smarty_tpl->tpl_vars['row']->value['discount'];?>
%
			</td>-->
			<td><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['quantity']*$_smarty_tpl->tpl_vars['rs1']->value),0,',','.');?>
 VNĐ</td>
		</tr>
		<?php } ?>
	</table>
  
  
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Tổng tiền thanh toán :  &nbsp;&nbsp;&nbsp;<span style="color:blue; font-weight:bold;"><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,0,',','.');?>
 VNĐ.</span></div>
  
 	<input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" style="margin:20px;" onClick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/>
</form><?php }} ?>