<div class="content">
    <div class="grid960">
        <div class="breakcump fr">
            <a href="{$url}">{$text_home}</a> &#187; 
            <a href="{$url}{$menu_type.link}/">{$menu_type.title}</a> &#187;
            {foreach from=$bread item=bre key=k}
            <a href="{$url}{if $bre.link}{$bre.pre_link}-{$bre.id}{if count($bread)>($k+1)}/{else}.html{/if}{/if}">{$bre.title}</a> {if count($bread)>($k+1)}&#187;{/if}
            {/foreach}
            
        </div>
        <div class="clear"></div>
        {loadModule mod=product task=menu}
        
        <div class="col_right fr">
            <div class="title_right">{$row.title}</div>
                {$row.content}
            <div class="clear"></div>
            <div class="btn_print">
                <a href="" class="pasco_print"><img src="{$url}images/icon_print.jpg"/></a>
                <a href="" class="pasco_to_top"><img src="{$url}images/icon_top.jpg"/></a>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
</div>