<?php /* Smarty version Smarty-3.1.7, created on 2016-01-28 14:34:12
         compiled from "modules/user/templates/update_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40024642056a9c4744d1d47-49702274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '543fa17c799928c2144ee8ea8d032a9847a46e5d' => 
    array (
      0 => 'modules/user/templates/update_profile.tpl',
      1 => 1431909066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40024642056a9c4744d1d47-49702274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg_error' => 0,
    'msg_success' => 0,
    'row' => 0,
    'province' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56a9c4746354b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a9c4746354b')) {function content_56a9c4746354b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
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
		
		jQuery("#formRegister").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#formRegister_password': {
                    'required': {
                        'message': "Vui lòng nhập mật khẩu cũ"
                    }
                },
				'#formRegister_password_confirm_new': {
					'required': {
                        'message': "Vui lòng xác nhận mật khẩu"
                    },
					'equals': {
                        'message': "Mật khẩu xác nhận không đúng"
                    }
                },
                '#formRegister_email': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_email_require');?>
"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#formRegister_phone': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_phone_require');?>
"
                    },
                'custom[phone]': {
                        'message': "Số điện thoại không hợp lệ"
                    }
                },
                '#formRegister_fullname': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_name_require');?>
"
                    }
                },
				'#formRegister_address': {
                    'required': {
                        'message': "<?php echo $_smarty_tpl->getConfigVariable('form_contact_address_require');?>
"
                    }
                },
				'#formRegister_province': {
                    'required': {
                        'message': "Thành phố là bắt buộc"
                    }
                }
            }
        });
    });
</script>

<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col30per fl collog"> <a href="" class="head_title">Chức năng</a>
			<div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
don-hang.html" class="f16gray user_mod <?php if ($_GET['task']=='history'){?>active<?php }?>">Đơn hàng của tôi</a></div>
			<div><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
thong-tin-ca-nhan.html" class="f16gray user_mod <?php if ($_GET['task']=='update_profile'){?>active<?php }?>">Thông tin cá nhân</a></div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Thông tin tài khoản</a>
          <div class="f16gray">Cập nhật thông tin tài khoản theo mẫu dưới đây</div>
		  
		  <div style="color:red; font-weight:bold; margin-top:20px"><?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
</div>
			<div style="color:green; font-weight:bold; margin-top:20px"><?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>
</div>
		  
		  <form id="formRegister" class="" name="" action="" method="post">
			  <table width="100%" cellpadding="0" cellspacing="0" class="tbl_login">
			  <tr>
				<td>Họ tên:</td>
				<td>
					<input type="text" id="formRegister_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_name');?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fullname'];?>
" />
				</td>
			  </tr>
			  <tr>
				<td>Số điện thoại:</td>
				<td>
					<input type="text" id="formRegister_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_cart" placeholder="Số điện thoại" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
" />
				</td>
			  </tr>
			  <tr>
				<td>Địa chỉ:</td>
				<td>
					<input type="text" id="formRegister_address" data-validation-engine="validate[required]" name="address" class="txt_cart" placeholder="Địa chỉ" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" />
				</td>
			  </tr>
			  <tr>
				<td>Thành phố:</td>
				<td>
					<select class="txt_cart" id="formRegister_province" data-validation-engine="validate[required]" name="province">
						<option value="">-- Thành phố --</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['province']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['province']),$_smarty_tpl);?>

					</select>
				</td>
			  </tr>
			  <tr>
				<td >Email</td>
				<td><input type="text" id="formRegister_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_email');?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" disabled /></td>
			  </tr>
			  <tr>
				<td>Mật khẩu cũ</td>
				<td><input type="password" id="formRegister_password" data-validation-engine="validate[required]" name="password" class="txt_cart" placeholder="Mật khẩu cũ" /></td>
			  </tr>
			  <tr>
				<td>Mật khẩu mới</td>
				<td><input type="password" id="formRegister_password_new" name="password_new" class="txt_cart" placeholder="Mật khẩu mới" /></td>
			  </tr>
			  <tr>
				<td >Nhập lại mật khẩu mới</td>
				<td>
					<input type="password" id="formRegister_password_confirm_new" data-validation-engine="validate[equals[formRegister_password_new]]" name="password_confirm_new" class="txt_cart" placeholder="Nhập lại mật khẩu mới"  />
				</td>
			  </tr>
			  <tr>
				<td align="right"></td>
				<td><button type="submit" class="btn_buy_cart">Cập nhật</button></td>
			  </tr>
			  </table>
		  </form>
		  
        </div>
      </div>
    </div>
  </div>



<?php }} ?>