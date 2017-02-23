
<script>
var null_name = '{#contact_null_name#}';
var null_email = '{#contact_null_email#}';
var null_security = '{#contact_null_security#}';
var invalide_email = '{#contact_invalide_email#}';
var security_incorrect = '{#contact_security_incorrect#}';
</script>
{literal}
<script language="javascript">	
	function validateForm( frm )
	{
		var RE_EMAIL = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

		if ( frm.txt_name.value == '')
		{
			alert (null_name);
			frm.txt_name.focus();
			return false;
		}
		if ( frm.txt_email.value == '')
		{
			alert (null_email);
			frm.txt_email.focus();
			return false;
		}
		if ( !RE_EMAIL.test(frm.txt_email.value) )
		{
			alert (invalide_email);
			frm.txt_email.focus();
			return false;
		}
		if ( frm.txt_captcha.value == '')
		{
			alert (null_security);
			frm.txt_captcha.focus();
			return false;
		}
				
	}
</script>
{/literal}
{literal}
<script type="text/javascript">
$(function(){

	$('.register_error').hide();

	
	$('form[name="frm_register"]').submit(function(){
		$('.register_error').hide();
		if(	!check_require("fullname", "error_fullname") || 
			!check_require("username", "error_username") ||
			!check_require("email", "error_email") ||
			!check_email("email", "error_email_format") ||
			!check_require("password", "error_password") ||
			!check_require("re_password", "error_re_password") ||
			!check_require("re_email", "error_re_email") ||
			!check_require("phone", "error_phone") ||
			!check_length("password", "error_password_length", 6) ||
			!check_isset(username, "username" )||
			!check_isset(email, "email") )
			return false;


	});
	
	$('#email').blur(function(){
		$('#error_email_isset').hide();
		email = $('#email').val();
		
		check_isset(email, "email");
		
	});
	
	$('#username').blur(function(){
		$('#error_fullname_isset').hide();
		username = $('#username').val();
	
		check_isset(username, "username");
		
	});

	
	$('#phone').keypress(function(e){
		inputNumber(e);
	});
	
	$('#username').keypress(function(e){
		inputSpecial(e);
	});
	
});


function inputSpecial(e)
{
	var a = [];
	var k = e.which;
	
	a.push(13); //Enter
	a.push(8); // backspace
	a.push(0); // all button nav (các phím điều hướng 'del, pgUp, pgDown, ->, <- ..')
	for (i = 48; i < 58; i++) // 48 -> 58 (các phím số 0->9)
		a.push(i);
	
	if (!(a.indexOf(k)>=0) )
	{
		$('#error_username_format').show();
		e.preventDefault();
	}
	else
		$('#error_username_format').hide();

}

function inputNumber(e)
{
	var a = [];
	var k = e.which;
	
	a.push(13); //Enter
	a.push(8); // backspace
	a.push(0); // all button nav (các phím điều hướng 'del, pgUp, pgDown, ->, <- ..')
	for (i = 48; i < 58; i++) // 48 -> 58 (các phím số 0->9)
		a.push(i);
	
	if (!(a.indexOf(k)>=0) )
	{
		$('#error_phone_format').show();
		e.preventDefault();
	}
	else
		$('#error_phone_format').hide();
		
}

function check_format(field, error)
{
	var temp = $('#'+field);
	
}

function echeck(d) {
		return /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(d);
	}

function check_email(field, error)
{
	var temp = $('#'+field);
	if(temp.val()!="")
	{
		if(!echeck(temp.val()))
		{
			$('#'+error).show();
		}
	}
	return true;
}

function check_length(field, error, min_length)
{
	var temp = $('#'+field);
	
	if(temp.val()!="")
	{
		if(temp.val().length < min_length)
		{
			$('#'+error).show();
			return false;
		}
	}
	return true;
}

function check_isset(value, type)
{
	if(value!="")
	{
		$.get('?ajax=true&mod=user&task=checkIsset&'+type+'='+value, function(result){
			if(result.indexOf("ok")==0)
			{
				$('#error_'+type+'_isset').show();
			}
			else
				$('#error_'+type+'_isset').hide();
		});
		return true;
	}
}

function check_require(field, error)
{
	var temp = $('#'+field);
	if(temp.val()=="")
	{
		$('#'+error).show();
		temp.focus();
		
	}
	return true;
}

</script>
{/literal}
<style type="text/css">

.register_error 
{
	color:red;
}

</style>

  
		<form id="form2" name="frm_register" method="post" action="" onsubmit="return false;">	

			<table cellpadding="3" cellspacing="3" align="left" style="float: left;" width="800px">
				{if $msg !=''}
				<tr>
					<th colspan="2" align="left" style="font-size:11px; color:#FF0000;">{$msg}</th>
				</tr>
				{/if}
				<tr>
					<td align="left" width="35%"><label>Họ và tên</label></td>
					<td width="65%">
                    	<input type="text" name="fullname" id="fullname" value="{$smarty.post.fullname}"/>
                        <label class="register_error" id="error_fullname">* Bạn chưa nhập họ tên</label>
                        
                    </td>
				</tr>		
				<tr>
					<td align="left"><label>Tên đăng nhập</label></td>
					<td>
                    	<input type="text" name="username" id="username" value="{$smarty.post.username}" /><span class="span_test"></span>
                        <label class="register_error" id="error_username">* Bạn chưa nhập tên tài khoản</label>
                        <label class="register_error" id="error_username_format">* Tên đăng nhập không chứa ký tự đặc biệt</label>
                        <label class="register_error" id="error_username_isset">* Tên đăng nhập đã tồn tại</label>
                    </td>
				</tr>
				<tr>
					<td align="left"><label>Mật khẩu</label></td>
					<td>
                    	<input type="password" name="password" id="password" value="{$smarty.post.password}"/>
                        <label class="register_error" id="error_password">* Bạn chưa nhập mật khẩu</label>
                        <label class="register_error" id="error_password_length">* Tên mật khẩu phải ít nhất 6 ký tự</label>

                    </td>
				</tr>
				<tr>
					<td align="left"><label>Nhập lại mật khẩu</label></td>
					<td>
                    	<input type="password" name="re_password" id="re_password" value="{$smarty.post.re_password}"/>
                        <label class="register_error" id="error_re_password">* Bạn chưa xác nhận mật khẩu</label>
                        <label class="register_error" id="error_re_password_compare">* Xác nhận mật khẩu chưa đúng</label>
                    </td>
				</tr>
				<tr>
				  <td align="left">Email</td>
				  <td>
					<input type="email" name="email" id="email" value="{$smarty.post.email}"/>
                    <label class="register_error" id="error_email">* Bạn chưa nhập email</label>
                    <label class="register_error" id="error_email_format">* Email không đúng định dạng</label>
                    <label class="register_error" id="error_email_isset">* email đã tồn tại</label>
                  </td>
			  </tr>
				<tr>
				  <td align="left">Xác nhận email</td>
				  <td>
                  	<input type="email" name="re_email" id="re_email" value="{$smarty.post.re_email}"/>
                    <label class="register_error" id="error_re_email">* Bạn chưa xác nhận email</label>
                    <label class="register_error" id="error_re_email_compare">* Xác nhận email chưa đúng</label>
                  </td>
			  </tr>
				<tr>
				  <td align="left">Số điện thoại</td>
				  <td>
                  	<input type="text" name="phone" id="phone" value="{$smarty.post.phone}"/>
                    <label class="register_error" id="error_phone">* Bạn chưa nhập số điện thoại</label>
                    <label class="register_error" id="error_phone_format">* Bạn phải nhập số</label>
                    <label class="register_error" id="error_phone_length">* Điện thoại phải lớn hơn 3 số</label>
                  </td>
			  </tr>
				<tr>
					<td align="left"><label>Mã xác nhận</label></td>
					<td><img src="{$url}lib/captcha/captcha.class.php" align="left" border="1"   id="imgCaptcha" onclick="refreshImage(this)">						
						<input type="text" name="txt_captcha" id="hid_keycapcha"  style="height:17px; width:100px; margin-left:10px;"/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td style="margin-top:10px;">
                        <p class="submit" style="margin:0;"><button type="submit">{#contact_send#}</button></p>
					</td>
				</tr>
			</table>
            
            
</form>
		{literal}
<script type="text/javascript">
	$("document").ready(function (){
		$.get(url+'?mod=contact&task=getcaptcha&ajax=true', function (result){
			$("#hid_keycapcha").val(result);
		});
	});
	
	function refreshImage(obj){
		img_src = obj.src;
		obj.src = img_src + "?rand=1"+ Math.random();
		$.get(url+'?mod=contact&task=getcaptcha&ajax=true', function (result){
			$("#hid_keycapcha").val(result);
		});
	}
</script>
{/literal}	

        <div style="clear: both; "></div>

