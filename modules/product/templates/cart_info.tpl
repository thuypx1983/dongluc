
{if !$smarty.session.user}
<a href="{$url}dang-nhap.html" class="link_login">Đăng nhập</a>
{else}
<a href="{$url}thong-tin-ca-nhan.html" class="link_login">Thông tin cá nhân</a>
<a href="{$url}don-hang.html" class="link_login">Đơn hàng của tôi</a>
<a href="{$url}?mod=user&task=logout" class="link_login">Đăng xuất</a>
{/if}

{if $smarty.session.cart}
<a href="{$url}gio-hang.html" class="">
	<div class="show_cart fr"><span>Giỏ hàng {count($smarty.session.cart)}</span></div>
</a>
{/if}