<script type="text/javascript">

$(function(){
	$("form#frmfrm").submit(function() {
		$('#cart_view_ajax').fadeOut(300, function(){
			$.post(url+'?ajax=true&mod=product&task=cart_view', $("form#frmfrm").serialize(), function(result) {
				$('#cart_view_ajax').html(result);
			});	
		});
		$('#cart_view_ajax').fadeIn(300);
	});
});

function cart_clear()
{
	if (confirm("Bạn có chắc không?"))
	{	
		$('#cart_view_ajax').fadeOut(300, function(){
			$.get(url+'?ajax=true&mod=product&task=cart_clear', function(result) {
				$('#cart_view_ajax').html(result);
			});	
		});
		$('#cart_view_ajax').fadeIn(300);
	}
}
function cart_del(del_id)
{
	if (confirm("Bạn có chắc không?"))
	{	
		$('#cart_view_ajax').fadeOut(300, function(){
			$.post(url+'?ajax=true&mod=product&task=cart_del', { 'id' : del_id }, function(result) {
				$('#cart_view_ajax').html(result);
			});	
		});
		$('#cart_view_ajax').fadeIn(300);
	}
}
</script>


<script type="text/javascript">

function validForm() {
	$('.text-error').hide();
	fname = $('#saveForm_fullname');
	address = $('#saveForm_address');
	phone = $('#saveForm_phone');
	email = $('#saveForm_email');
	
	if(
		!validInputText(fname, "fname") ||
		!validInputText(address, "address") ||
		!validInputText(phone, "phone") ||
		!validInputText(email, "email") ) {
		
		$('.text-error').show();
		return false;
	} else {
		//alert('Tạo đơn hàng thành công! Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian ngắn nhất.');
		return true;
	}
}
function validInputText(obj, txt) {
	if(obj.val().length==0) {
		$('.show_'+txt).show();
		return false;
	} else {
		$('.show_'+txt).hide();
		return true;
	}
}
</script>


<div class="breakcump">
	<a href="{$url}">{#text_menu_home#} / </a>
    <a href="{$url}{$link_contact}/">{#text_menu_contact#} / </a>
    <a href="{$url}mua-hang-truc-tuyen/" class="active">Mua hàng trực tuyến</a>
    <div class="clear"></div>
</div>
<div class="content_sub">
    <div class="grid220 fl">
		{include file='../../contact/templates/menu.tpl'}
    </div>
    <div class="grid620 fr">
        {loadModule mod=product task=category}
        <div class="line"></div>
        <div class="block20"></div>
        {if $smarty.post.cart_save}
        	Tạo đơn hàng thành công! Chúng tôi sẽ liên hệ với quý khách hàng trong thời gian ngắn nhất. Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.
        {else}
            <div class="title_cate" align="left" style="font-size:20px">Thông tin đơn hàng</div>
            <div class="line"></div>
            <div class="block15"></div>
            
            <div class="box_bill">
                <form id="frmfrm" name="frmfrm" onsubmit="return false;">
                    <div id="cart_view_ajax">
                        {include file='cart_view_ajax.tpl'}
                    </div>
                </form>
                <div class="block20"></div>
                <div>
                    
                    <a href="{if $smarty.server.HTTP_REFERER!=''}{$smarty.server.HTTP_REFERER}{else}{$url}{$link_product}/{/if}" class="btn_succes hung_padding_button" style="background: #5fc991;">Tiếp tục chọn hàng</a>
                </div>
                <div class="block20"></div>
                <div class="block15"></div>
                <div class="title_cate" align="left" style="font-size:20px">Thông tin liên hệ</div>
                <div class="line"></div><div class="block15"></div>
                <form name="saveForm" action="" method="post" onsubmit="return validForm();">
                    <div class="text-error" style="display:none; color:red; margin-bottom:10px; line-height:18px;">
                        Có lỗi xảy ra:
                        <ul>
                            <li class="show_fname">* Họ tên vui lòng nhập</li>
                            <li class="show_address">* Địa chỉ vui lòng nhập</li>
                            <li class="show_phone">* Điện thoại vui lòng nhập</li>
                            <li class="show_email">* Email vui lòng nhập</li>
                        </ul>
                    </div>
                    <table class="tbl_giohang" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2"> Vui lòng nhập các thông tin giao hàng để chúng tôi tiến hành giao hàng cho Quý khách.</td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Họ Tên :</strong></td>
                                <td><input name="fullname" id="saveForm_fullname" class="input_soluong" type="text"></td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ :</strong></td>
                                <td><input name="address" id="saveForm_address" class="input_soluong" type="text" style="width:250px"></td>
                            </tr>
                            <tr>
                                <td><strong>Điện thoại :</strong></td>
                                <td><input name="phone" id="saveForm_phone" class="input_soluong" type="phone"></td>
                            </tr>
                            <tr>
                                <td><strong>Email :</strong></td>
                                <td><input name="email"  id="saveForm_email" class="input_soluong" type="email"></td>
                            </tr>
                            <tr>
                                <td><strong>Lời nhắn :</strong></td>
                                <td><textarea name="message" cols="45" rows="5" style="border:1px solid #ccc; padding:8px;"></textarea></td>
                            </tr>
                            <!--<tr>
                                <td colspan="2"><span><input type="radio" name="select_thanhtoan"> <strong>Gửi đơn đặt hàng</strong></span></td>
                            </tr>-->
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Đặt hàng" name="cart_save" class="btn_succes">
                                    <input type="reset" value="Điền lại thông tin" class="btn_succes btn_clean" >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        {/if}
    </div>
	<div class="clear"></div>
</div>