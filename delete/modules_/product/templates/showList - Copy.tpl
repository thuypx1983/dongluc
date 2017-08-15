
<div class="breakcump">
    <a href="{$url}">{#text_menu_home#} / </a>
    <a href="{$url}{$menu_type.link}/">{$menu_type.title} / </a>
    {foreach from=$bread item=bre key=k}
    <a href="{$url}{if $bre.link}{$bre.pre_link}-{$bre.id}/{/if}" {if count($bread)==($k+1)} class="active" {/if}>{$bre.title}{if count($bread)>($k+1)} / {/if}</a>
    {/foreach}
    <div class="clear"></div>
</div>

<div class="content_sub">
    <div class="grid220 fl">
        <ul class="menu_220">
            {foreach from=$type.sub item=menu key=k}    
            <li {if $menu.id==$smarty.get.id}class="active"{/if}><a href="{if $menu.link_to!=''}{$menu.link_to}{else}{$url}{$menu.pre_link}-{$menu.id}/{/if}" title="{$menu.title}"><h2 style="font-size: 16px;font-weight: normal;">{$menu.title}</h2></a></li>
            {/foreach}
        </ul>
    </div>
    <div class="grid620 fr">
        <div class="title_cate"><h1 style="font-size: 25px; font-weight: normal;">{$type.title}</h1></div>
        {$type.content}
        {include file='print_and_email.tpl'}
    </div>
    <div class="clear"></div>
</div>