{if $smarty.session.user}
<div class="c-content">
	<div class="buttom-20">
		<h3 class="line-title">Đăng ký</h3>
		<p class="red">Bạn đã đăng nhập hệ thống, vui lòng chờ giây lát !</p>
		{if $smarty.session.user.utype=='pub'}
			{redirect url='?mod=publisher' time=1}
		{else}
			{redirect url='?mod=advertiser' time=1}
		{/if}
	</div>
</div>	
{else}
<link rel="stylesheet" href="{$url}lib/jquery-ui-1.9.0.custom/themes/base/jquery.ui.all.css">
<style type="text/css">
[type="password"]
{
border-radius:4px;
}
</style>
<script type="text/javascript">

$(function(){
	$('[type="button"], [type="submit"]').button();
	
	$('.step1 label').click(function(){
		$('.step2').slideDown(500);	
	});
	
});



</script>

<style type="text/css">
.lbl_adv
{
background:#028BD0;
}
.lbl_pub
{
background:#82A744;
}
.lbl_pub_adv
{
background:#E29E3E;
}
.step1 {
width:760px;
height:140px;
}
.step1 label
{
	font-weight:bold;
	padding:10px 15px;	
	color:#fff;
	display:inline-block;
	width:188px;
	margin-bottom:10px;
}
.bao_label
{
	margin-right:35px;
	float:left;
	width:218px;
	padding-bottom:10px;
	line-height:18px;
}
.step1 label input[type="radio"]
{
margin-right:10px;
}
.step2 {
	border:0px solid #000;
}
.thongbao 
{
	border:1px solid #E6E1C4; 
	padding:10px; 
	margin-bottom:20px;
}
.thanhcong 
{ 	
	background:#EDFDE1; 
	color:#060; 
}
.loi 
{ 
	background:#F8F7E5; 
	color:#DF0000; 
}
.title_p
{
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size:20px;
}
</style>

{literal}
<script type="text/javascript">
/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#frmRegister");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email1 = $("#email1");
	var email1Info = $("#email1Info");
	var email2 = $("#email2");
	var email2Info = $("#email2Info");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	var phone = $("#phone");
	var phoneInfo = $("#phoneInfo");
	var captcha = $("#captcha");
	var captchaInfo = $("#captchaInfo");

	//On blur
	name.blur(validateName);
	email1.blur(validateEmail1);
	email2.blur(validateEmail2);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	phone.blur(validatePhone);
	//captcha.blur(validateCaptcha);
	//On key press
	name.keyup(validateName);
	email1.keyup(validateEmail1);
	email2.keyup(validateEmail2);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	phone.keyup(validatePhone);
	//captcha.keyup(validateCaptcha);
	//On Submitting
	/*form.submit(function(){
		if(validateName() & validateEmail1() & validateEmail2() & validatePass1() & validatePass2() & validatePhone())
			return true
		else
			return false;
	});*/
	/*& validateEmail1() & validateEmail2() & validatePass1() & validatePass2() & validatePhone()*/
	form.submit(function(){
		if( validateName() & validateEmail1() & validateEmail2() & validatePass1() & validatePass2() & validatePhone() )
			if(!$('#name').hasClass("error") && !$('#email1').hasClass("error"))
				return true;
			else 
				return false;	
		else
			return false;	
	});
	
	//validation functions
	function validateEmail1(){
		//testing regular expression
		var a = $("#email1").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){

			$.get('?ajax=true&mod=user&task=checkIsset&email='+email1.val(), function(result){
				if(result.indexOf("ok")==0){
					email1.addClass("error");
					email1Info.text("E-mail này đã tồn tại");
					email1Info.addClass("error");
					return false;
				}
				//if it's valid
				else{
					email1.removeClass("error");
					email1Info.text("");
					email1Info.removeClass("error");
					validateEmail2();
					return true;
				}
				
			});
			return true;
		}
		//if it's NOT valid
		else{
			email1.addClass("error");
			email1Info.text("Mời bạn nhập E-mail.");
			email1Info.addClass("error");
			return false;
		}
	}
	function validateEmail2(){
		var a = $("#email1");
		var b = $("#email2");
		//are NOT valid
		if( email1.val() != email2.val() ){
			email2.addClass("error");
			email2Info.text("E-mail không hợp lệ");
			email2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			email2.removeClass("error");
			email2Info.text("");
			email2Info.removeClass("error");
			return true;
		}
	}
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 4){
			name.addClass("error");
			nameInfo.text("Tên đăng nhập phải lớn hơn 4 ký tự");
			nameInfo.addClass("error");
			return false;
		}
		else if(name.val().length >= 4)
		{
			$.get('?ajax=true&mod=user&task=checkIsset&username='+name.val(), function(result){
				if(result.indexOf("ok")==0){
					name.addClass("error");
					nameInfo.text("Tên đăng nhập đã tồn tại");
					nameInfo.addClass("error");
					return false;
				}
				//if it's valid
				else{
					name.removeClass("error");
					nameInfo.text("");
					nameInfo.removeClass("error");
					return true;
				}
			});
			return true;
		}
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("");
			nameInfo.removeClass("error");
			return true;
		}
	}
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length < 3){
			pass1.addClass("error");
			pass1Info.text("Mật khẩu phải lớn hơn 5 ký tự");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Nhập lại mật khẩu không đúng");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("");
			pass2Info.removeClass("error");
			return true;
		}
	}
	function validatePhone()
	{
		var a = $("#phone").val();
		var filter = /(^\d*\.?\d*[0-9]+\d*$)|(^[0-9]+\d*\.\d*$)/; 	

		if(filter.test(a))
		{
			if(phone.val().length < 8)
			{
				phone.addClass("error");
				phoneInfo.text("Số điện thoại phải lớn hơn 8");
				phoneInfo.addClass("error");
				return true;
			}
			else
			{
				phone.removeClass("error");
				phoneInfo.text("");
				phoneInfo.removeClass("error");
				return true;
			}
		}
		else{
			phone.addClass("error");
			phoneInfo.text("Bạn chưa nhập số điện thoại");
			phoneInfo.addClass("error");
			return false;
		}
	}
	function validateCaptcha()
	{
		//if it's NOT valid
		if(captcha.val().length == 0){
			captcha.addClass("error");
			captchaInfo.text("Bạn chưa nhập mã bảo mật");
			captchaInfo.addClass("error");
			return false;
		}
		else
		{
			if($('#hid_keycapcha').val()!=captcha.val().toUpperCase())
			{
				captcha.addClass("error");
				captchaInfo.text("Mã bảo mật không chính xác");
				captchaInfo.addClass("error");
				return false;
			}
			else{
				captcha.removeClass("error");
				captchaInfo.text("");
				captchaInfo.removeClass("error");
				return true;
			}
		}
	}
	
});
</script>

<style type="text/css">

#customForm{
	padding: 0 10px 10px;
}
#customForm label{
	display: inline-block;	
	/*background:#ffc;*/
	width:230px;
	color: #797979;
	font-weight: 700;
	line-height: 1.4em;
}
#customForm input[type="text"], [type="password"]{
	width: 220px;
	padding: 6px;
	color: #949494;
	font-family: Arial,  Verdana, Helvetica, sans-serif;
	font-size: 11px;
	border: 1px solid #cecece;
}
#customForm input.error{
	/*background: #f8dbdb;*/
	border-color: #e77776;
}
#customForm textarea{
	width: 550px;
	height: 80px;
	padding: 6px;
	color: #adaeae;
	font-family: Arial,  Verdana, Helvetica, sans-serif;
	font-style: italic;
	font-size: 12px;
	border: 1px solid #cecece;
}
#customForm textarea.error{
	background: #f8dbdb;
	border-color: #e77776;
}
#customForm div{
	
}
#customForm div span{
	margin-left: 10px;
	
	
}
#customForm div span.error{
	color: #e46c6e;
}
#customForm #send{
	background: #6f9ff1;
	color: #fff;
	font-weight: 700;
	font-style: normal;
	border: 0;
	cursor: pointer;
}
#customForm #send:hover{
	background: #79a7f1;
}
#error{
	margin-bottom: 20px;
	border: 1px solid #efefef;
}
#error ul{
	list-style: square;
	padding: 5px;
	font-size: 11px;
}
#error ul li{
	list-style-position: inside;
	line-height: 1.6em;
}
#error ul li strong{
	color: #e46c6d;
}
#error.valid ul li strong{
	color: #93d72e;
}
/******* /FORM *******/
</style>
{/literal}
<div class="c-content">
<div class="buttom-20">
    <h3 class="line-title">Đăng ký tài khoản</h3>
    
	{if $msg_success!=''}
		<p class="green">{$msg_success}</p>
		<!-- Begin Ad360, important page views tracking --> <img border="0" hspace="0" vspace="0" width="1" height="1" src="http://tracking.ad360.vn/conversion-tracking.html?id=1&uid=1409" /> <!-- End Ad360, important page views tracking -->
	{elseif $msg_error!=''}	
		<p class="red">{$msg_error}</p>
	{/if}
	
	{if $msg_success==''}
    <p><b>Vui lòng chọn loại tài khoản mà bạn muốn đăng ký</b></p>
    <form method="post" id="mainForm" action="?mod=user&task=register">
        <div class="step1">
        	
            <div class="bao_label">
                <label class="lbl_adv" style="cursor: pointer;">
                    <input type="radio" name="utype" value="adv" {if $smarty.post.utype=='adv'} checked="checked" {/if}/>ADVERTISER
                </label>
                 Bạn đang sở hữu website và muốn SEO từ khóa cho web của mình lên TOP Google. 
				 <p>Tài khoản ADVERTISER giúp bạn mua textlink để hiện thực hóa mong muốn của bạn.</p>
            </div>
            
            <div class="bao_label">
                <label class="lbl_pub" style="cursor: pointer;">
                    <input type="radio" name="utype" value="pub" {if $smarty.post.utype=='pub'} checked="checked" {/if} />PUBLISHER
                </label>
                Nếu bạn sở hữu website và muốn kiếm tiền từ website của bạn thông qua việc đặt Textlink cho các khách hàng ADVERTISER.
				<p>Vui lòng đăng ký tài khoản thuộc loại PUBLISHER để bắt đầu kiếm tiền từ website của bạn.</p>
			</div>
                 
            <div class="bao_label">              
                <label class="lbl_pub_adv" style="cursor: pointer;">
                    <input type="radio" name="utype" value="pub+adv" {if $smarty.post.utype=='pub+adv'} checked="checked" {/if}/>ADVERTISER + PUBLISHER
                </label>
				Bạn vừa muốn kiếm tiền từ việc đặt Textlink của ADVERTISER lên website của mình ? bạn lại vừa muốn SEO để website của mình lên TOP Google ?
                <p>Loại tài khoản ADVERTISER + PUBLISER giúp bạn giải quyết cả 2 vấn đề mà bạn mong muốn.</p>
            </div>
            
            <div style="clear:both;"></div>
        </div>
        
        <div class="step2" {if $smarty.post.utype==''}style="display:none;"{/if}>
            <p><b>Mời bạn nhập thông tin tài khoản</b></p>
            {if $error_echo!=''}
                <div class="thongbao loi">
                    &bull;&nbsp;&nbsp;
                    {$error_echo}
                </div>
            {/if}
            <div id="customForm">
                <div>
                    <label for="name">Tên đăng nhập</label>
                    <input id="name" name="username" type="text" value="{$smarty.post.username}" class="required" minlength="4" maxlength="20">
                    <span id="nameInfo"></span>
                </div>
                <div>
                    <label for="email1">E-mail</label>
                    <input id="email1" name="email" type="text" value="{$smarty.post.email}" class="required email">
                    <span id="email1Info"></span>
                </div>
                <div>
                    <label for="email2">Nhập lại e-mail</label>
                    <input id="email2" name="email2" type="text" value="{$smarty.post.email2}" class="required email" equalTo="#email1">
                    <span id="email2Info"></span>
                </div>
                <div>
                    <label for="pass1">Mật khẩu</label>
                    <input id="pass1" name="password" type="password" value="{$smarty.post.password}" class="required" minlength="6">
                    <span id="pass1Info"></span>
                </div>
                <div>
                    <label for="pass2">Nhập lại mật khẩu</label>
                    <input id="pass2" name="pass2" type="password" value="{$smarty.post.pass2}" class="required" equalTo="#pass1">
                    <span id="pass2Info"></span>
                </div>
                <div>
                    <label for="fullname">Họ và tên</label>
                    <input id="fullname" name="fullname" type="text" value="{$smarty.post.fullname}" class="required">
                    <span id="fullnameInfo"></span>
                </div>
				<div>
                    <label for="gender">Giới tính</label>
                    <select id="gender" name="gender" class="required">
						  <option value="">---Chọn---</option>
						  <option value="1" {if $smarty.post.gender==1}selected="selected"{/if}>Nam</option>
						  <option value="0" {if $smarty.post.gender!='' && $smarty.post.gender==0}selected="selected"{/if}>Nữ</option>
					</select>
                    <span id="genderInfo"></span>
                </div>
				{*<div>
                    <label for="birthday">Ngày sinh (yyyy-mm-dd)</label>
                    <input id="birthday" name="birthday" type="text" value="{$smarty.post.birthday}" class="required date">
                    <span id="birthdayInfo"></span>
                </div>*}
				<div>
                    <label for="phone">Số điện thoại di động</label>
                    <input id="phone" name="phone" type="text" value="{$smarty.post.phone}" class="required digits" minLength="10" maxLength="11" />
                    <span id="phoneInfo"></span>
					<br><font color="red">VD: 09... hoặc 01... Vui lòng nhập đúng số di động của bạn, Textlink.vn sẽ thông báo các giao dịch qua tin nhắn cho bạn.</font><br><br>
                </div>
				<div>
                    <label for="province">Đến từ (Tỉnh/TP)</label>
                    <select id="province" name="province" class="required">
						<option value="">---Chọn---</option>
						{html_options options=$province selected=$smarty.post.province}
					</select>
                </div>
                <div>
                    <label for="captcha" style="float:left; margin-top:12px;">Mã bảo mật</label>
                    <img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height:26px; width:104px; float:left; margin:7px 9px 7px 4px;" id="imgCaptcha">
                   <input type="text" name="captcha" id="captcha" style="width:104px; float:left;" />    
                    <span id="captchaInfo" style="margin-top:9px; float:left;"></span>
                    <div style="clear:both;"></div>
					<em>Click vào ảnh để đọc mã khác</em>
                </div>
                <div style="margin:20px 0 10px;">
                    <label style="font-weight:normal;">
                    <input type="checkbox" name="have_read" value="1" />
                    Tôi đã đọc và đồng ý với <a href="{$url}?mod=about&task=privacy" title="">điều khoản</a></label>
                </div>
                <div>
                    <button id="btnSend" name="send" type="submit" onclick="return confirms()">Tạo tài khoản</button>
                </div>
            </div>
            
        </div>
    </form>	
	{/if}	
	
	<h3 style="clear: both; margin-top: 20px; margin-bottom: 0px; padding-top: 20px; border-top: 1px dotted gray;">Bạn đã có tài khoản ? vui lòng <a href="?mod=user&task=login">đăng nhập tại đây</a></h3>
	
	</div>        
</div>        


{literal}
<script type="text/javascript">
$("document").ready(function (){

    /*$.get(url+'?mod=user&task=getcaptcha&ajax=true', function (result){
        $("#hid_keycapcha").val(result);
    });*/
    $('#imgCaptcha').click(function(){
        refreshImage(this);
    });
});

function refreshImage(obj){
    img_src = obj.src;
    obj.src = img_src + "?rand=1"+ Math.random();
/*    $.get(url+'?mod=user&task=getcaptcha&ajax=true', function (result){
        $("#captcha").val(result);
    });*/
}
</script>
{/literal}
{/if}