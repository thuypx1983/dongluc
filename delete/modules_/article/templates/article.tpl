
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
        <div class="title_cate">{$row.title}</div>
        {$row.content}
    </div>
    <div class="clear"></div>
</div>