<script type="text/javascript">
$(function(){
	//$('.title_desc').hide();
	$('.title_faq').click(function(){
		$(this).parent().find('.title_desc').slideToggle(300);
	});
});
</script>
<div class="breakcump">
	<a href="{$url}">{#text_menu_home#} / </a>
    {if $smarty.get.id!=''}
        <a href="{$url}{$link_faq}/">{#text_menu_faq#} / </a>
        <a href="{$url}{$cateinfo.pre_link}-{$cateinfo.id}/" class="active">{$cateinfo.title}</a>
    {else}
        <a href="{$url}{$link_faq}/" class="active">{#text_menu_faq#}</a>
    {/if}
    <div class="clear"></div>
</div>

<div class="content_sub">
    <div class="grid220 fl">
    	{loadModule mod=faq task=category}
    </div>
    <div class="grid620 fr">
	    <div class="title_cate">{#text_menu_faq#}{if $cateinfo.title!=''} về {$cateinfo.title}{/if}</div>
        {if $paging}
        <div class="paging"> 
        	{$paging}
        </div>
        {/if}
        
        <div class="block20"></div>
        {foreach from=$faq item=row key=k}
        <div>
            <span class="fontclgreen font20 fontbold mar_bottom20 title_faq" style="cursor:pointer;">{$row.title}</span>
            <div class="title_desc">{$row.description}</div>
        	<br />
        </div>
        {/foreach}
        
        {if $paging}
        <div class="paging"> 
        	{$paging}
        </div>
        {/if}
        
        <div class="clear"></div>
    </div>
	<div class="clear"></div>
</div>