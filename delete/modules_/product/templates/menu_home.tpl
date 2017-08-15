
<div class="breakcump">
	<a href="{$url}">{#text_menu_home#} / </a>
    <a href="{$url}{$row.link}/" class="active">{$row.title}</a>
    <div class="clear"></div>
</div>

<div class="content_sub">
    <div class="grid220 fl">
        <ul class="menu_220">
        	{foreach from=$rows item=menu key=k}	
            <li><a href="{$url}{$menu.pre_link}-{$menu.id}/" title="{$menu.title}"><h2 style="font-size: 16px;font-weight: normal;">{$menu.title}</h2></a></li>
            {/foreach}
        </ul>
    </div>
    <div class="grid620 fr">
        <div class="title_cate"><h1 style="font-size: 25px; font-weight: normal;">{$row.title}</h1></div>
        {$row.content}
        {include file='print_and_email.tpl'}
    </div>
	<div class="clear"></div>
</div>