<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 09:35:56
         compiled from "modules/product/templates/cart_save.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64683874655f7840cbafe56-07469309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12d7422347d911cbef1fdacf864bdacd96cf030' => 
    array (
      0 => 'modules/product/templates/cart_save.tpl',
      1 => 1431909066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64683874655f7840cbafe56-07469309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'is_success' => 0,
    'row' => 0,
    'province' => 0,
    'sum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f7840cd0fd3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f7840cd0fd3')) {function content_55f7840cd0fd3($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
    
        jQuery("#formID").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#contactForm_fullname': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_name_require');?>
"
                    }
                },
                '#contactForm_email': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_email_require');?>
"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#contactForm_phone': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_phone_require');?>
"
                    },
                'custom[phone]': {
                        'message': "Số điện thoại không hợp lệ"
                    }
                },
                '#contactForm_address': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_address_require');?>
"
                    }
                },
				'#contactForm_province': {
                    'required': {
                        'message': "Thành phố là bắt buộc"
                    }
                },
                '#contactForm_captcha': {
                    'required': {
                        'message': "Vui lòng nhập mã bảo mật"
                    }
                }
            }
        });
    });
</script>

<div class="grid1060">
    <div class="content_cate"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
thanh-toan.html" class="head_title">Thanh toán</a>
      <div class="pkg">
		<?php if ($_smarty_tpl->tpl_vars['is_success']->value==1){?>
			<div>Tạo đơn hàng thành công! Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian ngắn nhất. Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</div>
		<?php }elseif($_SESSION['cart']){?>
        <div class="col710 fl">
			
			<form id="formID" class="" name="contactForm" action="" method="post">
				  <table width="100%" cellpadding="0" cellspacing="0" class="tbl_info_cart">
				  <tr>
					<td>
						<input type="text" id="contactForm_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_cart" placeholder="Họ và tên" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fullname'];?>
" />
					</td>
					<td>
						<input type="text" id="contactForm_address" data-validation-engine="validate[required]" name="address" class="txt_cart" placeholder="Địa chỉ" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" />
					</td>
				  </tr>
				  <tr>
					<td>
						<input type="text" id="contactForm_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_cart" placeholder="Số điện thoại" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
"/>
					</td>
					<td>
						<select class="txt_cart" id="contactForm_province" data-validation-engine="validate[required]" name="province">
							<option value="">-- Thành phố --</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['province']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['province']),$_smarty_tpl);?>

						</select>
					</td>
				  </tr>
				  <tr>
					<td>
						<input type="text" id="contactForm_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_email');?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" />
					</td>
					<td>
						<textarea class="txt_cart"  rows="3" id="contactForm_message" name="message" placeholder="Ghi chú đơn hàng"><?php echo $_smarty_tpl->tpl_vars['row']->value['message'];?>
</textarea>
					</td>
				  </tr>
				  <tr>
					<td></td>
					<td align="right"><button name="cart_save" style="width:100%;cursor:pointer" type="submit" class="btn_send_cart">Gửi thông tin</button></td>
				  </tr>
				  </table>
		  </form>
		  
        </div>
        <div class="col340 fr">
          <div class="total_order">
            <div class="head_total_order">Đơn hàng<span>(<?php echo count($_SESSION['cart']);?>
 sản phẩm)</span></div>
            <table class="tbl_total_order" width="100%" cellpadding="0" cellspacing="0">
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
        </div>
		<?php }else{ ?>
			<div>Phiên làm việc hết hạn!, quay lại <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Trang chủ</a></div>
		<?php }?>
		
      </div>
    </div>
  </div><?php }} ?>