<link rel="stylesheet" href="{$url}plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="{$url}plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="{$url}plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="{$url}plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
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
                        'message': "{#form_contact_email_require#}"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#formRegister_phone': {
                    'required': {
                        'message': "{#form_contact_phone_require#}"
                    },
                'custom[phone]': {
                        'message': "Số điện thoại không hợp lệ"
                    }
                },
                '#formRegister_fullname': {
                    'required': {
                        'message': "{#form_contact_name_require#}"
                    }
                },
				'#formRegister_address': {
                    'required': {
                        'message': "{#form_contact_address_require#}"
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
			<div><a href="{$url}don-hang.html" class="f16gray user_mod {if $smarty.get.task==history}active{/if}">Đơn hàng của tôi</a></div>
			<div><a href="{$url}thong-tin-ca-nhan.html" class="f16gray user_mod {if $smarty.get.task==update_profile}active{/if}">Thông tin cá nhân</a></div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Thông tin tài khoản</a>
          <div class="f16gray">Cập nhật thông tin tài khoản theo mẫu dưới đây</div>
		  
		  <div style="color:red; font-weight:bold; margin-top:20px">{$msg_error}</div>
			<div style="color:green; font-weight:bold; margin-top:20px">{$msg_success}</div>
		  
		  <form id="formRegister" class="" name="" action="" method="post">
			  <table width="100%" cellpadding="0" cellspacing="0" class="tbl_login">
			  <tr>
				<td>Họ tên:</td>
				<td>
					<input type="text" id="formRegister_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_cart" placeholder="{#form_contact_name#}" value="{$row.fullname}" />
				</td>
			  </tr>
			  <tr>
				<td>Số điện thoại:</td>
				<td>
					<input type="text" id="formRegister_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_cart" placeholder="Số điện thoại" value="{$row.phone}" />
				</td>
			  </tr>
			  <tr>
				<td>Địa chỉ:</td>
				<td>
					<input type="text" id="formRegister_address" data-validation-engine="validate[required]" name="address" class="txt_cart" placeholder="Địa chỉ" value="{$row.address}" />
				</td>
			  </tr>
			  <tr>
				<td>Thành phố:</td>
				<td>
					<select class="txt_cart" id="formRegister_province" data-validation-engine="validate[required]" name="province">
						<option value="">-- Thành phố --</option>
						{html_options options=$province selected=$row.province}
					</select>
				</td>
			  </tr>
			  <tr>
				<td >Email</td>
				<td><input type="text" id="formRegister_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_cart" placeholder="{#form_contact_email#}" value="{$row.email}" disabled /></td>
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



