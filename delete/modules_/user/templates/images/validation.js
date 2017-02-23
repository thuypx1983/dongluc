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