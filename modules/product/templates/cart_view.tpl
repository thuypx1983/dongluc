<script type="text/javascript">

$(function(){
    $("form#frmfrm").submit(function() {
        $('#cart_view_ajax').fadeOut(300, function(){
            $.post(url+'?ajax=true&mod=product&task=cart_view', $("form#frmfrm").serialize(), function(result) {
                $('#cart_view_ajax').html(result);
				
            });
			$.get(url+'?ajax=true&mod=product&task=cart_info', function(rs) {
                $('.login_cart').html(rs);
            });	
        });
        $('#cart_view_ajax').fadeIn(300);
    });
});
function cart_del(del_id)
{
    if (confirm("Bạn có chắc không?"))
    {   
        $('#cart_view_ajax').fadeOut(300, function(){
            $.post(url+'?ajax=true&mod=product&task=cart_del', { 'id' : del_id }, function(result) {
                $('#cart_view_ajax').html(result);
            }); 
			$.get(url+'?ajax=true&mod=product&task=cart_info', function(rs) {
                $('.login_cart').html(rs);
            });
        });
        $('#cart_view_ajax').fadeIn(300);
    }
}
</script>

<div class="grid1060">
    <div class="content_cate"> <a href="{$url}gio-hang.html" class="head_title">Giỏ hàng của bạn</a>

     <div class="continue_cart">
        <!-- <a href="{if $smarty.server.HTTP_REFERER!=''}{$smarty.server.HTTP_REFERER}{else}{$url}san-pham/{/if}" class="btn_continue_cart">Tiếp tục chọn hàng</a> -->
        <a href="{$url}san-pham/" class="btn_continue_cart">Tiếp tục chọn hàng</a>
      </div>
    <form id="frmfrm" name="frmfrm" onsubmit="return false;">
      <div id="cart_view_ajax">
            {include file='cart_view_ajax.tpl'}
        </div>
    </form>

    </div>
  </div>