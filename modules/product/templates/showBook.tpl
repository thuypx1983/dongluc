
<script type="text/javascript">

$(function(){
	$('.add_cart').click(function(){
		$.post(url+"?ajax=true&mod=product&task=cart_add", $(this).closest("form").serialize(), function(){
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
        
        
        <div class="paging"> 
        	{$paging}
        </div>
        
    
        <ul class="list_product">
            {foreach from=$rows item=row key=k}
            <li>
                <a href="{$url}{$row.pre_link}-{$row.id}.html" class="fl" style="border:1px solid #eee;"><img src="{$url}upload/product/{$row.photo}" style="width:115px;" alt="{$row.title}"></a>
                <div class="fr info_list_product">
                    <a href="{$url}{$row.pre_link}-{$row.id}.html" class="name_product">{$row.title}</a>
                    <div class="descript">{$row.content|strip_tags|truncate:500}</div>
                    <div class="list_option_buy">
                    	<form action="" method="post" onsubmit="return false;">
                        	<input type="hidden" value="{$url}{$link_product}/{$row.link}-{$row.id}.html" name="link" />
                            <input type="hidden" value="{$row.id}" name="id" />
                            <table width="100%">
                                <tr>
                                <td valign="bottom" width="20%"><a href="{$url}{$row.pre_link}-{$row.id}.html" class=" btn_viewmore" style="font-size:14px;">Chi tiết</a></td>
                                <td  width="35%" align="center">Giá: <label class="price" style="font-size:15px;">{$row.price|number_format:0:',':'.'} VNĐ</label> </td>
                                <td  width="25%" align="center"> <small>Số lượng:</small> <input type="text" class="quality" name="quantity" value="{if $row.in_cart == 1}{$row.quantity}{else}1{/if}" style="width:15px;"/></td>
                                <td  width="20%"><a href="" class="btn_buy add_cart" style="font-size:14px;">Mua hàng</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            {foreachelse}
                <em>Chưa có sản phẩm nào</em>
            {/foreach}
            
            
        </ul>
    	
        <div class="paging"> 
        	{$paging}
        </div>
        <!--<div class="paging ">
            <a href="">Trước</a><a href="" class="active">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">Tiếp</a>
        </div>--> 
    </div>
	<div class="clear"></div>
</div>
