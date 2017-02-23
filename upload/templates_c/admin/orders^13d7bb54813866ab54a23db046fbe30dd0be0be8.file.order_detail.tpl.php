<?php /* Smarty version Smarty-3.1.7, created on 2015-10-19 08:22:26
         compiled from "admin/modules/orders/templates/order_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1255161936562445d24961f9-77295642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13d7bb54813866ab54a23db046fbe30dd0be0be8' => 
    array (
      0 => 'admin/modules/orders/templates/order_detail.tpl',
      1 => 1431574382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255161936562445d24961f9-77295642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'list' => 0,
    'sum' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_562445d264fc4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562445d264fc4')) {function content_562445d264fc4($_smarty_tpl) {?><form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >
 
<style>
#order_left { margin:10px 40px 0 30px; color:#BF0006; font-weight:bold; font-size:14px;}
#order_left strong { background:; width:180px; float:left; color:#000; font-weight:bold; }
#order_left p { clear: both; margin:0; margin-bottom: 10px }
.tbl_showList {
	width:80%;
	margin-top:20px;
	margin-left:30px;
	border:1px solid #ccc;
	border-bottom:none;
	border-left:none;
}
.tbl_showList tr:first-of-type td {
	background:#ddd;
	color:#000;
	font-weight:bold;
	font-size:14px;
}
.tbl_showList td {
	border:1px solid #ccc;
	border-top:none;
	border-right:none;
	padding:8px;
}
.bold {
	font-weight:bold;
}
.red {
	color:#BF0006;
}
.green {
	color:green;
}
.f14 {
	font-size:14px;
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
			<p><strong>Tỉnh/ Thành :</strong><?php echo $_smarty_tpl->tpl_vars['row']->value['province'];?>
</p>
			<p><strong>Di động : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
</p>
			<p><strong>Email: </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</p>
			<p><strong>Ngày tạo : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
</p>
			<p><strong>Chú thích : </strong><?php echo $_smarty_tpl->tpl_vars['row']->value['cust_note'];?>
</p>
	  </div>
  
  <div style="clear:both;"></div>
  <div style="font-style:italic; margin:20px 0 0 20px; font-size:15px;">Thông tin giỏ hàng : </div>
    
  <table class="tbl_showList" cellpadding="0" cellspacing="0">
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
" style="border:1px solid #e9e9e9;width:20px;height:20px;display:inline-block;padding:2px"><span style="background:<?php echo $_smarty_tpl->tpl_vars['row']->value['color_code'];?>
;display:inline-block;width:100%;height:100%"></span></span> (<?php echo $_smarty_tpl->tpl_vars['row']->value['color_name'];?>
)
				</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['size']!=''){?>
				<div>
					Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;font-size:11px"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
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
 VNĐ.</span></div>
  
 	<input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" style="margin:20px;" onClick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/>
</form><?php }} ?>