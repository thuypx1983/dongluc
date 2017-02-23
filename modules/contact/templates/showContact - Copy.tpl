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
            Liên Hệ với Chúng tôi!</p>
        <p class="titlesmall">
            {$config.footer_slogan}</p>
        <p class="small">
        {$config.address}<br>
{$config.phone}<br>
{$config.email}<br>
         
        <div class="bando">
            <!--<img src="photo/ban-do.gif">-->
            <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQiqmXVY4Rob-132JPV7ogova1fMq3FEo">
            </script>
      <script>
    function initialize() {
      var myLatlng = new google.maps.LatLng(21.016869, 105.850361);
      var mapOptions = {
      zoom: 16,
      center: myLatlng
      }
      var contentString = '<div style="height:100px;">'+
      '<div>{$config.footer_slogan|strip_tags}</div>'+
      '{$config.address|strip_tags}'+
      '<div>{$config.email|strip_tags}</div>'+
      '<div>{$config.website|strip_tags}</div>'+
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
            <div class="map" style="width: 749px; height:268px; border:5px solid #fff; background:#fff;">
                <div id="map-canvas"></div>
            </div>
        </div>
        <br/>
         <p class="title">
            Hoặc nhập thông tin theo mẫu dưới đây</p>
            <form id="formID" class="form-horizontal" name="contactForm" action="" method="post">
            <table cellspacing="15" class="tbl_contact">
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
                        <input type="text" id="contactForm_address" data-validation-engine="validate[required]" name="address" class="txt_contact" placeholder="{#form_contact_address#}" value="{$smarty.post.address}"/>
                    </td>
                </tr>
                <!--<tr>
                    <td colspan="2">
                        <input type="text" class="txt_contact" style="width:638px" placeholder="tiêu đề"/>
                    </td>
                </tr>-->
                <tr>
                    <td colspan="2">
                        <textarea class="txt_contact form-content"  style="width:638px" rows="5" id="contactForm_message" name="message" placeholder="{#form_contact_message#}">{$smarty.post.message}</textarea>
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
            <div align="center"><button class="btn_buy_online">Gửi thông tin</button>
            <!--<a class="btn_buy_online" href="">Gửi thông tin</a>--></div>
            </form>
    </div>
    
</div>
  <p class="clear"> </p>
</div>