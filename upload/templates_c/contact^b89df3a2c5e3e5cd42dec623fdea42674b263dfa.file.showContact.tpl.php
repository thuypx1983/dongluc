<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 17:43:30
         compiled from "modules/contact/templates/showContact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104123797155f6a4d2958a28-17630644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b89df3a2c5e3e5cd42dec623fdea42674b263dfa' => 
    array (
      0 => 'modules/contact/templates/showContact.tpl',
      1 => 1431564924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104123797155f6a4d2958a28-17630644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a4d2a1c35',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a4d2a1c35')) {function content_55f6a4d2a1c35($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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
lien-he.html" class="head_title">Liên hệ</a>
      <div class="pkg">
        <div class="col520 fl">
          <div class="box_map">

              <div class="bando">
            
            <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQiqmXVY4Rob-132JPV7ogova1fMq3FEo">
            </script>
      <script>
    function initialize() {
      var myLatlng = new google.maps.LatLng(20.989910, 105.807449);
      var mapOptions = {
      zoom: 15,
      center: myLatlng
      }
      var contentString = '<div style="height:100px;">'+
      '<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['config']->value['address']);?>
'+
      '<div><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['config']->value['email']);?>
</div>'+
      '<div><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['config']->value['website']);?>
</div>'+
      '</div>';
      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
      var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Hello World!'
      });
      google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
      });
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
    
      </script>
            <style>#map-canvas { height:100% !important; }</style>
            <div class="map" style="width: 500px; height:267px;background:#fff;">
                <div id="map-canvas"></div>
            </div>
        </div>

          </div>
          <div class="info_company">
            <div class="f14">Mọi thông tin chi tiết xin vui lòng liên hệ với chúng tôi theo địa chỉ dưới đây</div>
            <ul>
              <li>CÔNG TY CỔ PHẦN ĐỘNG LỰC</li>
              <li class="address"><?php echo $_smarty_tpl->tpl_vars['config']->value['address'];?>
</li>
              <li class="email">Email: <?php echo $_smarty_tpl->tpl_vars['config']->value['email'];?>
</li>
              <li class="phone">Hotline: <?php echo $_smarty_tpl->tpl_vars['config']->value['hotline'];?>
</li>
            </ul>
          </div>
        </div>
        <div class="col520 fr">
        <form id="formID" class="" name="contactForm" action="" method="post">
            <table width="100%" cellpadding="0" cellpadding="0" class="tbl_info_cart">
                <tr>
                    <td colspan="2">
                        <input type="text" id="contactForm_fullname" data-validation-engine="validate[required]" name="fullname" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_name');?>
" value="<?php echo $_POST['fullname'];?>
" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" id="contactForm_email" data-validation-engine="validate[required,custom[email]]" name="email" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_email');?>
" value="<?php echo $_POST['email'];?>
" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" id="contactForm_phone" data-validation-engine="validate[required,custom[phone]]" name="phone" class="txt_cart" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_phone');?>
" value="<?php echo $_POST['phone'];?>
"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea class="txt_cart"  rows="5" id="contactForm_message" name="message" placeholder="<?php echo $_smarty_tpl->getConfigVariable('form_contact_message');?>
"><?php echo $_POST['message'];?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height: 41px; width: 129px; float:left; margin-top:0px;" id="imgCaptcha">  
                    </td>
                    <td>
                        <input name="captcha" id="contactForm_captcha" data-validation-engine="validate[required]" type="text" class="txt_cart" placeholder="Mã bảo mật">
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td>
                        <!-- <a href="" class="btn_send_cart">Gửi thông tin</a> -->
                        <button style="width:100%;cursor:pointer" type="submit" class="btn_send_cart">Gửi thông tin</button>
                    </td>
                </tr>
            </table>
        </form>
        </div>
      </div>
    </div>
  </div><?php }} ?>