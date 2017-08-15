<link rel="stylesheet" href="{$url}plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="{$url}plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="{$url}plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="{$url}plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
    
        jQuery("#formLogin").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#formLogin_password': {
                    'required': {
                        'message': "Vui lòng nhập mật khẩu"
                    }
                },
                '#formLogin_email': {
                    'required': {
                        'message': "{#form_contact_email_require#}"
                    },
                'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
                '#formLogin_captcha': {
                    'required': {
                        'message': "Vui lòng nhập mã bảo mật"
                    }
                }
            }
        });
		
		jQuery("#formRegister").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#formRegister_password': {
                    'required': {
                        'message': "Vui lòng nhập mật khẩu"
                    }
                },
				'#formRegister_password_confirm': {
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
                '#formRegister_captcha': {
                    'required': {
                        'message': "Vui lòng nhập mã bảo mật"
                    }
                }
            }
        });
    });
</script>

<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col520 fl collog"> <a href="" class="head_title">Đăng nhập</a>
          <div class="f16gray">Bạn đã có tài khoản hãy đăng nhập hệ thống</div>
		  <div style="color:red; font-weight:bold; margin-top:20px">{$msg_error_login}</div>
			<div style="color:green; font-weight:bold; margin-top:20px">{$msg_success_login}</div>
			
			{if $msg_success_login!=''}
				
				{if count($smarty.session.cart)>0 }	
					{redirect url=$url|cat:"thanh-toan.html" time=1}
				{else}
					{redirect url=$url time=1}	
				{/if}	
			
			{/if}
			
		  <form id="formLogin" class="" name="" action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" class="tbl_login">
          <tr>
            <td>Email</td>
            <td>
				<input type="text" id="formLogin_email" data-validation-engine="validate[required,custom[email]]" name="login_email" class="txt_cart" placeholder="{#form_contact_email#}" value="{$smarty.post.login_email}" />
			</td>
          </tr>
          <tr>
            <td>Mật khẩu</td>
            <td>
				<input type="password" id="formLogin_password" data-validation-engine="validate[required]" name="login_password" class="txt_cart" placeholder="Mật khẩu" />
			</td>	
          </tr>
		  <tr>
            <td>Mã bảo mật</td>
            <td>
				<img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height: 27px; width:110px; float:right; margin-top:7px;" id="imgCaptcha">
				<input name="login_captcha" id="formLogin_captcha" data-validation-engine="validate[required]" type="text" class="txt_cart" style="width:64%!important; float:left; margin-left:2px;" placeholder="Mã bảo mật">
			</td>	
          </tr>
          <tr style="display:none">
            <td></td>
            <td><input type="checkbox" class="fl"/>
              <span>Nhớ tài khoản |<a href="">Quên mật khẩu</a></span></td>
          </tr>
          <tr>
            <td align="right"></td>
            <td>
				<button type="submit" class="btn_buy_cart" name="submit_login" value="submit_login">Đăng nhập</button>
			</td>
          </tr>
          </table>
		  </form>
		  <!--
          <a href="javascript:return false" class="head_title">Hoặc đăng nhập bằng tài khoản facebook</a> <div><a href="javascript:return false"><img src="images/loginfb.png"/> </a> </div>
		   -->
		  </div>
        <div class="col520 fr collog"> <a href="" class="head_title">Đăng Ký</a>
			<div class="f16gray">Bạn  chưa có tài khoản đăng ký theo mẫu dưới đây</div>
			<div style="color:red; font-weight:bold; margin-top:20px">{$msg_error}</div>
			<div style="color:green; font-weight:bold; margin-top:20px">{$msg_success}</div>
		  <form id="formRegister" class="" name="" action="" method="post">
			  <table width="100%" cellpadding="0" cellspacing="0" class="tbl_login">
			  <tr>
				<td>Họ tên:</td>
				<td>
					<input type="text" id="formRegister_fullname" data-validation-engine="validate[required]" name="register_fullname" class="txt_cart" placeholder="{#form_contact_name#}" value="{$smarty.post.register_fullname}" />
				</td>
			  </tr>
			  <tr>
				<td>Số điện thoại:</td>
				<td>
					<input type="text" id="formRegister_phone" data-validation-engine="validate[required,custom[phone]]" name="register_phone" class="txt_cart" placeholder="Số điện thoại" value="{$smarty.post.register_phone}" />
				</td>
			  </tr>
			  <tr>
				<td >Email</td>
				<td><input type="text" id="formRegister_email" data-validation-engine="validate[required,custom[email]]" name="register_email" class="txt_cart" placeholder="{#form_contact_email#}" value="{$smarty.post.register_email}" /></td>
			  </tr>
			  <tr>
				<td>Mật khẩu</td>
				<td><input type="password" id="formRegister_password" data-validation-engine="validate[required]" name="register_password" class="txt_cart" placeholder="Mật khẩu" /></td>
			  </tr>
			  <tr>
				<td >Nhập lại mật khẩu</td>
				<td>
					<input type="password" id="formRegister_password_confirm" data-validation-engine="validate[required,equals[formRegister_password]]" name="register_password_confirm" class="txt_cart" placeholder="Nhập lại mật khẩu"  />
				</td>
			  </tr>
			  <tr>
            <td>Mã bảo mật</td>
				<td>
					<img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height: 27px; width:110px; float:right; margin-top:7px;" id="imgCaptcha">
					<input name="register_captcha" id="formRegister_captcha" data-validation-engine="validate[required]" type="text" class="txt_cart" style="width:58%!important; float:left; margin-left:2px;" placeholder="Mã bảo mật">
				</td>	
			  </tr>
			  <tr>
				<td align="right"></td>
				<td><button type="submit" class="btn_buy_cart" name="submit_register" value="submit_register">Đăng ký</button></td>
			  </tr>
			  </table>
		  </form>
		  
        </div>
      </div>
    </div>
  </div>