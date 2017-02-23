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
    $.get(url+'?mod=user&task=getcaptcha&ajax=true', function (result){
        //$("#captcha").val(result);
    });
}
function openRegister(obj) {
	if(obj.prop('checked')==true) {
		$('.register_new').show();
		$('[name="password"]')
			.addClass('validate_input_error')
			.addClass('validate_required');
	} else {
		$('.register_new').hide();
		$('[name="password"]')
			.removeClass('validate_input_error')
			.removeClass('validate_required');
	}
	
}
</script>
{/literal}


<style type="text/css">
.controls {
	float:right;
}
.control-label {
	float:left;
	margin-top:6px;
}
.control-group {
	margin:0 auto 10px;
	width:450px;
}
.control-group input[type="text"], .control-group input[type="password"] {
	border:1px solid #ccc;
	border-radius:4px;
	padding:4px;
	width:230px;
}
.control-group textarea {
	width:230px;
	max-width:230px;
	padding:4px;
	height:70px;
	border-radius:4px;
	border:1px solid #ccc;
}
.register_new {
	display:none;
	border-left:5px solid #F47955;
}
</style>

<script type="text/javascript" src="{$url}js/validate.js"></script>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
		
			<div id="rootpath" style="margin:10px 0 20px;">
				<a href="{$url}" class="rt_home" title="Trang chủ"></a>
				<span></span>
				<a href="{$url}thanh-toan-thanh-cong/">Thanh toán thành công</a>
			</div>
			
			<div style="border-bottom:1px solid #E6E6E6; margin-bottom:20px; position:relative; padding-bottom:4px;">
				<h1 style="margin:0; padding:0; font-size:12px;">Thanh toán thành công</h1>
			</div>
            {literal}
            <script type="text/javascript" class="microad_blade_track">
            <!--
            var microad_blade_gl = microad_blade_gl || { 'params' : new Array(), 'complete_map' : new Object() };
            (function() {
            var param = {'co_account_id' : '8125', 'group_id' : 'convtrack23445', 'country_id' : '5', 'ver' : '2.1.0'};
            microad_blade_gl.params.push(param);
            
            var src = (location.protocol == 'https:')
            ? 'https://d-cache.microadinc.com/js/blade_track_gl.js' : 'http://d-cache.microadinc.com/js/blade_track_gl.js';
            
            var bs = document.createElement('script');
            bs.type = 'text/javascript'; bs.async = true;
            bs.charset = 'utf-8'; bs.src = src;
            
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(bs, s);
            })();
            -->
            </script> 
            {/literal}
            
            <div class="input_success">
                Gửi đăng ký mua hàng thành công.
            </div>
            
            <div style="text-align:center; color:red; font-weight:bold; font-size:14px; margin:20px 0; padding-bottom:200px;">
                Chân thành cảm ơn quý khách đã đăng ký mua hàng tại {$alias} <br/>
                Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. <br/>
                <button type="button" class="btn" onclick="location.href=url;" style="margin-top:20px;">Tiếp tục mua hàng</button>
            </div>
			
			
			
			
			{if !$smarty.session.user}
			<div style="font-size:11px; color:#333;">
				(*) Bạn đã có tài khoản tại {$alias}&nbsp;<a href="{$url}dang-nhap/" style="color:#f00; text-decoration:underline;" title="Đăng nhập">Đăng nhập ngay</a>
			</div>
			{/if}
			
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
	
		<div class="box margin-20" style="padding:10px 0;">
			{include file='support.tpl'}
		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>
		  
		  