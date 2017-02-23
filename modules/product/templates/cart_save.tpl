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
                '#contactForm_address': {
                    'required': {
                        'message': "{#form_contact_address_require#}"
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
    <div class="content_cate"> <a href="{$url}thanh-toan.html" class="head_title">Thanh toán</a>
      <div class="pkg">
		{if $is_success==1}
			<div>Tạo đơn hàng thành công! Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian ngắn nhất. Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</div>
		{elseif $smarty.session.cart}
        <div class="col710 fl">
			
			<form id="formID" class="" name="contactForm" action="" method="post">
				  <table width="100%" cellpadding="0" cellspacing="0" class="tbl_info_cart">
				  <tr>
					<td>
						<input type="text" id="contactForm_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_cart" placeholder="Họ và tên" value="{$row.fullname}" />
					</td>
					<td>
						<input type="text" id="contactForm_address" data-validation-engine="validate[required]" name="address" class="txt_cart" placeholder="Địa chỉ" value="{$row.address}" />
					</td>
				  </tr>
				  <tr>
					<td>
						<input type="text" id="contactForm_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_cart" placeholder="Số điện thoại" value="{$row.phone}"/>
					</td>
					<td>
						<select class="txt_cart" id="contactForm_province" data-validation-engine="validate[required]" name="province">
							<option value="">-- Thành phố --</option>
							{html_options options=$province selected=$row.province}
						</select>
					</td>
				  </tr>
				  <tr>
					<td>
						<input type="text" id="contactForm_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_cart" placeholder="{#form_contact_email#}" value="{$row.email}" />
					</td>
					<td>
						<textarea class="txt_cart"  rows="3" id="contactForm_message" name="message" placeholder="Ghi chú đơn hàng">{$row.message}</textarea>
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
            <div class="head_total_order">Đơn hàng<span>({count($smarty.session.cart)} sản phẩm)</span></div>
            <table class="tbl_total_order" width="100%" cellpadding="0" cellspacing="0">
				{assign var=sum value=0}
				{foreach from=$smarty.session.cart key=k item=row}
				{assign var=sum value=$sum+$row.quantity*$row.price}
				  <tr>
					<td>{$row.quantity}x</td>
					<td>
                        <div style="margin-bottom:2px;font-size:16px">{$row.title}</div>
                        {if $row.color_name!=''}
                        <div style="margin-bottom:2px;font-size:12px">
                            Màu sắc: <span title="{$row.color_name}" style="border:1px solid #e9e9e9;width:20px;height:20px;display:inline-block;padding:2px"><span style="background:{$row.color_code};display:inline-block;width:100%;height:100%"></span></span> ({$row.color_name})
                        </div>
                        {/if}
                        {if $row.size!=''}
                        <div style="font-size:12px">
                            Kích thước: <span style="border:1px solid #0066ae;padding:1px 4px;display:inline-block;border-radius:3px;text-transform:uppercase;font-size:11px">{$row.size}</span>
                        </div>
                        {/if}
                    </td>
					<td align="right" valign="top">{($row.quantity*$row.price)|number_format:0:',':'.'} vnđ</td>
				  </tr>
			  {/foreach}
            </table>
            <div class="total_price pkg"> <span class="fl">Tổng cộng</span><span class="fr">{$sum|number_format:0:',':'.'} vnđ</span> </div>
          </div>
        </div>
		{else}
			<div>Phiên làm việc hết hạn!, quay lại <a href="{$url}">Trang chủ</a></div>
		{/if}
		
      </div>
    </div>
  </div>