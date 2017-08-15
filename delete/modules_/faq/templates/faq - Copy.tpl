
<div class="breakcump">
	<a href="{$url}">{#text_menu_home#} / </a>
    <a href="{$url}{$link_faq}/" class="active">{#text_menu_faq#}</a>
    <div class="clear"></div>
</div>
<div class="content_sub">
    <div class="title_cate">{#text_menu_faq#}</div>
	{foreach from=$faq item=row key=k}    
        <span class="fontclgreen font20 fontbold mar_bottom20">{$row.title}</span>
        {$row.description}
        <br />
    {/foreach}
    <div class="clear"></div>
</div>


