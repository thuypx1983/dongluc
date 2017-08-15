<ul>
    {foreach from=$rows item=row key=k}			
        <li {if $smarty.get.link==$row.link}class="active"{/if}><a href="{$url}{$row.link}.html" title="{$row.title}">+ {$row.title}</a></li>
    {/foreach}
</ul>