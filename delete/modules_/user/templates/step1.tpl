{if $smarty.session.user}
<div class="c-content">
	<div class="buttom-20">
		<h3 class="line-title">Đăng ký</h3>
		<p>
			Bạn đã đăng nhập hệ thống, vui lòng chờ giây lát !
			{if $smarty.session.user.utype=='pub'}
                {redirect url='?mod=publisher' time=1}
            {else}
                {redirect url='?mod=advertiser' time=1}
            {/if}
		</p>
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

<link rel="stylesheet" href="{$path}general.css" type="text/css" media="screen">
<script type="text/javascript" src="{$path}validation.js"></script>

<div class="c-content">
<div class="buttom-20">
    <h3 class="line-title">Tạo tài khoản chỉ với vài phút!</h3>
    
    <p class="title_p">Mời bạn chọn loại tài khoản <em>(Có thể thay đổi sau)</em></p>
    <form method="post" id="frmRegister" action="?mod=user&task=register">
        <div class="step1">
        	
            <div class="bao_label">
                <label class="lbl_adv">
                    <input type="radio" name="utype" value="adv" {if $smarty.post.utype=='adv'} checked="checked" {/if}/>ADVERTISER
                </label>
                 Nếu máy tính hoặc mạng của bạn được bảo vệ bởi tường lửa hoặc proxy, hãy chắc rằng Firefox được phép truy cập Web.
            </div>
            
            <div class="bao_label">
                <label class="lbl_pub">
                    <input type="radio" name="utype" value="pub" {if $smarty.post.utype=='pub'} checked="checked" {/if} />PUBLISHER
                </label>
                Nếu máy tính hoặc mạng của bạn được bảo vệ bởi tường lửa hoặc proxy, hãy chắc rằng Firefox được phép truy cập Web.
			</div>
                 
            <div class="bao_label">              
                <label class="lbl_pub_adv">
                    <input type="radio" name="utype" value="pub+adv" {if $smarty.post.utype=='pub+adv'} checked="checked" {/if}/>ADVERTISER + PUBLISHER
                </label>
                Nếu máy tính hoặc mạng của bạn được bảo vệ bởi tường lửa hoặc proxy, hãy chắc rằng Firefox được phép truy cập Web.
            </div>
            
            <div style="clear:both;"></div>
        </div>
        
        <div class="step2" {if $smarty.post.utype==''}style="display:none;"{/if}>
            <p class="title_p">Mời bạn nhập thông tin tài khoản</p>
            {if $error_echo!=''}
                <div class="thongbao loi">
                    &bull;&nbsp;&nbsp;
                    {$error_echo}
                </div>
            {/if}
            <div id="customForm">
                <div>
                    <label for="name">Tên đăng nhập</label>
                    <input id="name" name="username" type="text" value="{$smarty.post.username}">
                    <span id="nameInfo"></span>
                </div>
                <div>
                    <label for="email1">E-mail</label>
                    <input id="email1" name="email" type="text" value="{$smarty.post.email}">
                    <span id="email1Info"></span>
                </div>
                <div>
                    <label for="email2">Nhập lại e-mail</label>
                    <input id="email2" name="email2" type="text" value="{$smarty.post.email2}">
                    <span id="email2Info"></span>
                </div>
                <div>
                    <label for="pass1">Mật khẩu</label>
                    <input id="pass1" name="password" type="password">
                    <span id="pass1Info"></span>
                </div>
                <div>
                    <label for="pass2">Nhập lại mật khẩu</label>
                    <input id="pass2" name="pass2" type="password">
                    <span id="pass2Info"></span>
                </div>
                <div>
                    <label for="phone">Số điện thoại</label>
                    <input id="phone" name="phone" type="text" value="{$smarty.post.phone}">
                    <span id="phoneInfo"></span>
                </div>
                <div>
                    <label for="captcha" style="float:left; margin-top:12px;">Mã bảo mật</label>
                    <img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; height:26px; width:104px; float:left; margin:7px 9px 7px 4px;" id="imgCaptcha">
                   <input type="text" name="captcha" id="captcha" style="width:104px; float:left;" />    
                    <span id="captchaInfo" style="margin-top:9px; float:left;"></span>
                    <div style="clear:both;"></div>
                </div>
                <div style="margin:20px 0 10px;">
                    <label style="font-weight:normal;">
                    <input type="checkbox" name="have_read" value="1"/>
                    Tôi đã đọc và đồng ý với <a href="#" title="">điều khoản</a></label>
                </div>
                <div>
                    <button name="send" type="submit">Tạo tài khoản ngay bây giờ</button>
                </div>
            </div>
            
        </div>
    </form>	
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