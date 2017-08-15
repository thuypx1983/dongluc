
<script type="text/javascript">

$(function(){
	$('.add_cart').click(function(){
		$.post(url+"?ajax=true&mod=product&task=cart_add", $('#formAddCart').serialize(), function(){
			window.location.href= url+'gio-hang/';
		});
		return false;
	});
});

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
        
        <div class="title_cate" style="line-height:28px;">{$row.title}</div>
                
        <div class="content_product" style="width:699px;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td valign="top">
                            <div class="img_product">
                            <img src="{$url}upload/product/{$row.photo}" />
                        </div>
                        <div class="price_detail" align="center">
                        	{$row.price|number_format:0:',':'.'} VNĐ
                        </div>
                        <form id="formAddCart" action="" method="post" onsubmit="return false;">
                        <div style="margin-bottom:10px; text-align:center;">
                        	Số lượng: <input type="text" style="border:1px solid #ccc; padding:4px; width:30px;" value="{if $row.in_cart == 1}{$row.quantity}{else}1{/if}" name="quantity" />
                        </div>
                        <div align="center">
                        	<a href="#" class="btn_buy_detail add_cart">Mua hàng</a>
                            <input type="hidden" value="{$url}{$link_product}/{$row.link}-{$row.id}.html" name="link" />
                            <input type="hidden" value="{$row.id}" name="id" />
                            {if $row.in_cart == 1}
                            <div style="font-size:11px; margin-top:10px; color:#999;">Đã có trong giỏ hàng</div>
                            {/if}
                        </div>
                        </form>
                        
                    </td>
                    <td valign="top">
                        <div class="info_product" style="width:490px; margin-left:20px;">
                            {$row.content}
                        </div>
                    </td>
                </tr>
            </table>
            {include file='print_and_email.tpl'}
            <div class="clear"></div> 
            <div class="block20"></div>
            <div class="line"></div>
            <div class="block20"></div>
            <div class="title_cate">Sản phẩm khác</div>
            <div class="block15"></div>
            <ul class="list_sp_other">
            	{foreach from=$rows item=row key=k}
		            <li style="margin-bottom:30px;"><a href="{$url}{$row.pre_link}-{$row.id}.html" class="thumbover thumb200"><span><img src="{$url}upload/product/{$row.photo}"/></span> </a><span class="price_other">{$row.price|number_format:0:',':'.'} VNĐ</span><a href="{$url}{$row.pre_link}-{$row.id}.html" class="title_other" style="line-height:21px;">{$row.title}</a></li>
            	{foreachelse}
                    <li><em>Chưa có sản phẩm nào</em></li>
                {/foreach}
            </ul>
            <div style="clear:both;"></div>
		</div>
    </div>
	<div class="clear"></div>
</div>
