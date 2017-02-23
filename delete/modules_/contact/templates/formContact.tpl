<link rel="stylesheet" href="{$url}plugin/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="{$url}plugin/css/customMessages.css" type="text/css"/>
<!--<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
<script src="{$url}plugin/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="{$url}plugin/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
		
        jQuery("#formID").validationEngine({
            'custom_error_messages': {
                // Custom Error Messages for Validation Types
                '#contactForm_fullname': {
                    'required': {
                        'message': "{#form_contact_name_require#}"
                    }
                },
				'#contactForm_email': {
                    'required': {
                        'message': "{#form_contact_email_require#}"
                    },
					'custom[email]': {
                        'message': "Email không hợp lệ"
                    }
                },
				'#contactForm_phone': {
                    'required': {
                        'message': "{#form_contact_phone_require#}"
                    },
					'custom[phone]': {
                        'message': "Số điện thoại không hợp lệ"
                    }
                },
				'#contactForm_message': {
                    'required': {
                        'message': "Vui lòng chọn khóa học!"
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

<div class="">
  
 <div class="lienhe-about" id="lien-he">
    <div class="content">
        <p class="title">
            Đăng ký học thử</p>
        <p class="titlesmall">
            Nhập thông tin theo mẫu dưới đây</p>
            <form id="formID" class="form-horizontal" name="contactForm" action="" method="post">
            <table cellspacing="15" class="tbl_contact" style="margin-top:15px;">
                <tr>
                    <td>
                        <input type="text" id="contactForm_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_contact" placeholder="{#form_contact_name#}" value="{$smarty.post.fullname}" />
                    </td>
                    <td>
                        <input type="text" id="contactForm_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_contact" placeholder="{#form_contact_phone#}" value="{$smarty.post.phone}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="contactForm_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_contact" placeholder="{#form_contact_email#}" value="{$smarty.post.email}" />
                    </td>
                    <td>
                        <!--<input type="text" id="contactForm_address" data-validation-engine="validate[required]" name="address" class="txt_contact" placeholder="{#form_contact_address#}" value="{$smarty.post.address}"/>-->
                        <select id="contactForm_message" data-validation-engine="validate[required]" name="message" style="padding: 4px;border: 1px solid #ccc;width: 312px;">
                        	<option value="">Tôi muốn học thử khóa...</option>
                        	{html_options options=$khoahoc_option selected=$smarty.post.message}                           
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                    	<input name="captcha" id="contactForm_captcha" data-validation-engine="validate[required]" type="text" class="txt_contact" style="/*width:90px !important; float:left; margin-left:2px;*/" placeholder="Mã bảo mật">
                    </td>
                    <td>
                    	<img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height: 27px; width:110px; float:left; margin-top:0px;" id="imgCaptcha">
                    </td>
                </tr>
            </table>
            <div align="center"><button class="btn_buy_online">Gửi thông tin</button></div><br>
<br>

            </form>
    </div>
    
</div>
  <p class="clear"> </p>
</div>